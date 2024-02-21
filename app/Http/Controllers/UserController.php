<?php

namespace App\Http\Controllers;

use App\Jobs\MailJob;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Notify;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', '!=', 'Student')->orderBy('id', 'DESC')->get();
        return view('users.index')->with('users', $users);
    }
    public function tabulate()
    {
        $users = User::where('role', '!=', 'Student')->orderBy('id', 'DESC')->get();
        return view('users.tabulate')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {

            $user = $request->validate([
                "name" => 'required',
                "email" => 'required',
            ]);
            if ($request->has('photo')) {
                $user['photo'] = $request->file('photo')->store('profilePhotos', 'public');
            }
            if ($request->has('role')) {
                $user['role'] = $request->role;
            }
            $user['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
            $user = User::create($user);
            if ($user->role == 'Instructor') {
                return redirect()->route('instructors.create', ['id' => $user->id]);
            } else {
                Toastr::success('User created successfully', 'success');
                return redirect('users');
            }
        } catch (\Exception $exception) {
            Toastr::error('An error occured while processing', 'error');
            return back();
        }
    }


    function activate($id)
    {
        try {
            $c = User::find($id);
            $c->status = 'Active';
            $c->save();
            MailJob::dispatch($c->email, 'Account Activation', 'Dear ' . $c->name . ' your account has been activated  ');
            Toastr::success('user activated successfully', 'success');
            return redirect('users');
        } catch (\Exception $exception) {
            Toastr::error('An error occured while processing', 'error');
            return back();
        }
    }
    function deactivate($id)
    {
        try {
            $c = User::find($id);
            $c->status = 'Deactivated';
            $c->save();
            MailJob::dispatch($c->email, 'Account Deactivated', 'Dear ' . $c->name . ' your account has been deactivated  ');
            Toastr::success('user deactivated successfully', 'success');
            return redirect('users');
        } catch (\Exception $exception) {
            Toastr::error('An error occured while processing', 'error');
            return back();
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $user = User::find($id);
            //            dd($user);
            $instructor = Instructor::join('branches', 'branches.id', '=', 'instructors.branch_id')
                ->where('instructors.user_id', $id)->select(['branches.name as branch_name', 'branches.id as branch_id', 'instructors.*'])->first();

            return view('users.edit')
                ->with('user', $user)
                ->with('branches', Branch::all())
                ->with('instructor', $instructor)
                ->with('courses', Course::all());
        } catch (\Exception $exception) {
            Toastr::error('An error occured while processing', 'error');
            return back();
        }
    }

    public function profile(string $id)
    {
        try {
            $user = User::find($id);

            return view('users.profile')
                ->with('user', $user);
        } catch (\Exception $exception) {
            Toastr::error('An error occured while processing', 'error');
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        try {
            //        $request->dd();
            $user = $request->validate([
                "name" => 'required',
                "email" => 'required',
            ]);

            if ($request->has('photo')) {
                $user['photo'] = $request->file('photo')->store('profilePhotos', 'public');
            }
            if ($request->has('role')) {
                $user['role'] = $request->role;
            }
            if ($request->has('password')) {
                $user['password'] = Hash::make($request->password);
            }

            $usr = User::find($id);
            $usr->update($user);
            if ($usr->role == 'Instructor') {
                $instructor = $request->validate([
                    "licence_number" => 'required',
                    "branch_id" => 'required',
                    "defensive_number" => 'required',
                    "phone" => 'required',
                    "address" => 'required',
                ]);
                if ($request->has('licence')) {
                    $instructor['licence'] = $request->file('licence')->store('licenceFiles', 'public');
                }
                if ($request->has('defensive')) {
                    $instructor['defensive'] = $request->file('defensive')->store('defensiveFiles', 'public');
                }
                if ($request->has('courses')) {
                    $instructor['courses'] = implode(',', $request->get('courses'));
                }
                Instructor::where('user_id', $id)->update($instructor);
            }
            Toastr::success('User updated successfully', 'success');
            return redirect('users');
        } catch (\Exception $exception) {
            return $exception->getMessage();
            Toastr::error('An error occured while processing', 'error');
            return back();
        }
    }
    public function updateProfile(Request $request,  $id)
    {
        try {
            // $request->dd();
            $user = $request->validate([
                "name" => 'required',
                "email" => 'required',
            ]);
            if ($request->has('photo')) {
                $user['photo'] = $request->file('photo')->store('profilePhotos', 'public');
            }
            if ($request->has('password')) {
                $user['password'] = Hash::make($request->password);
            }
            $usr = User::find($id);
            $usr->update($user);
            Toastr::success('Profile updated successfully', 'success');
            return redirect('home');
        } catch (\Exception $exception) {
            return $exception->getMessage();
            Toastr::error('An error occured while processing', 'error');
            return back();
        }
    }
    public function notify()
    {
        $notifications = Notify::where('user_id', auth()->user()->id)->where('is_open', 0)->get();

        return view('partials.bell')->with('notifications', $notifications);
    }
    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            Toastr::success('user deleted successfully', 'success');
            return redirect('users');
        } catch (\Exception $e) {
            Toastr::error('An error occured while processing', 'error');
            return back();
        }
    }
}

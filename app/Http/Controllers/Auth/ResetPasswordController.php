<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\MailJob;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function sendMail(Request $request){
        $data=$request->validate([
            'email' =>'required',
        ]);
        $token=random_int(999,9999);
        $data['token']=$token;
        DB::table('password_resets')->insert($data);
        MailJob::dispatch($data['email'],'Password Reset',"Your password reset token is \n".$token);
        return view('auth.passwords.reset')->with('email',$data['email']);

    }

    public function update(Request $request){

        $data=DB::table('password_resets')->select('password_resets.*')
            ->where('email','=',$request->email)
            ->where('token','=',$request->token)->get();
        if($data){
            $password=$request->validate([
                'password' =>'required|confirmed',
            ]);
           $user= User::where('email',$request->email)->first();
            $user->update(['password'=>Hash::make($password['password'])]);
        }else{
            return back();
        }
    MailJob::dispatch($request->email,'Password Changed',"Your password has been changed");
return redirect('login');

    }

}

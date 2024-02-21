<x-dashboard>
     <div class="page-body">
     <div class="container-fluid">
          <div class="page-title">
          <div class="row">
               <div class="col-sm-6">
               <h3>Add User</h3>
               </div>
               <div class="col-sm-6">
               <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
               <li class="breadcrumb-item">Users</li>
               <li class="breadcrumb-item active"> Add User</li>
               </ol>
               </div>
          </div>
          </div>
     </div>
     <!-- Container-fluid starts-->
     <div class="container-fluid">
          <div class="edit-profile">
          <div class="row">
               <div class="col-12">
               <div class="card">
               <div class="card-header pb-0">
                    <h4 class="card-title mb-0">Add User</h4>
                    <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
               </div>
               <div class="card-body">
                   <form class="row"  action="{{ route('users') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 col-6">
                         <h6 class="form-label">Name</h6>
                         <input class="form-control" name="name" >
                    </div>
                    <div class="mb-3 col-6">
                         <label class="form-label f-w-500">Email-Address</label>
                         <input class="form-control" name="email" placeholder="your-email@domain.com">
                    </div>
                    <div class="mb-3 col-6">
                         <label class="form-label f-w-500">Role</label>
                         <select name="role"  class="form-control" >
                              <option value="Instructor">Instructor</option>
                              <option value="Branch_Admin">Branch_Admin</option>
                              <option value="Admin">Admin</option>
                         </select>

                    </div>
                    <div class="mb-3 col-6">
                         <label class="form-label f-w-500">Photo</label>
                         <input class="form-control" type="file" name="photo">
                    </div>

                    <center>

                         <div class="form-footer ">
                              <button class="btn btn-primary btn-block col-4">Add User</button>
                         </div>
                    </center>
                    </form>
               </div>
               </div>
               </div>
               {{-- <div class="col-xl-8 col-lg-7">
               <form class="card">
               <div class="card-header pb-0">
                    <h4 class="card-title mb-0">Edit Profile</h4>
                    <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
               </div>
               <div class="card-body">
                    <div class="row">
                    <div class="col-md-5">
                         <div class="mb-3 col-3">
                         <label class="form-label f-w-500">Company</label>
                         <input class="form-control" type="text" placeholder="Company">
                         </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                         <div class="mb-3 col-3">
                         <label class="form-label f-w-500">Username</label>
                         <input class="form-control" type="text" placeholder="Username">
                         </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                         <div class="mb-3 col-3">
                         <label class="form-label f-w-500">Email address</label>
                         <input class="form-control" type="email" placeholder="Email">
                         </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                         <div class="mb-3 col-3">
                         <label class="form-label f-w-500">First Name</label>
                         <input class="form-control" type="text" placeholder="Company">
                         </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                         <div class="mb-3 col-3">
                         <label class="form-label f-w-500">Last Name</label>
                         <input class="form-control" type="text" placeholder="Last Name">
                         </div>
                    </div>
                    <div class="col-md-12">
                         <div class="mb-3 col-3">
                         <label class="form-label f-w-500">Address</label>
                         <input class="form-control" type="text" placeholder="Home Address">
                         </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                         <div class="mb-3 col-3">
                         <label class="form-label f-w-500">City</label>
                         <input class="form-control" type="text" placeholder="City">
                         </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                         <div class="mb-3 col-3">
                         <label class="form-label f-w-500">Postal Code</label>
                         <input class="form-control" type="number" placeholder="ZIP Code">
                         </div>
                    </div>
                    <div class="col-md-5">
                         <div class="mb-3 col-3">
                         <label class="form-label f-w-500">Country</label>
                         <select class="form-control btn-square">
                         <option value="0">India</option>
                         <option value="1">Germany</option>
                         <option value="2">Canada</option>
                         <option value="3">Usa</option>
                         <option value="4">Aus</option>
                         </select>
                         </div>
                    </div>
                    <div class="col-md-12">
                         <div>
                         <label class="form-label f-w-500">About Me</label>
                         <textarea class="form-control" rows="5" placeholder="Enter About your description"></textarea>
                         </div>
                    </div>
                    </div>
               </div>
               <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Update Profile          </button>
               </div>
               </form>
               </div> --}}
          </div>
          </div>
     </div>
     <!-- Container-fluid Ends-->
     </div>
</x-dashboard>

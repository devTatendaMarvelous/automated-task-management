<x-dashboard>
     <div class="page-body">
     <div class="container-fluid">
          <div class="page-title">
          <div class="row">
               <div class="col-sm-6">
               <h3>Update Course </h3>
               </div>
               <div class="col-sm-6">
               <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
               <li class="breadcrumb-item">Coursees</li>
               <li class="breadcrumb-item active"> Update Course </li>
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
                    <h4 class="card-title mb-0">Update Course </h4>
                    <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
               </div>
               <div class="card-body">
                   <form class="row"  action="{{ route('courses.update',[$course->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 col-4">
                         <h6 class="form-label">Course Name</h6>
                         <input class="form-control" name=" name" value="{{ $course->name }}" >
                    </div>
                    <div class="mb-3 col-4">
                         <h6 class="form-label">Course Price</h6>
                         <input class="form-control numbers-only" name="price" value="{{ $course->price }}">
                    </div>


                    <div class="mb-3 col-4">
                         <textarea name="description" id="" cols="30" rows="4" class="form-control" placeholder="description">{{ $course->description }}</textarea>
                    </div>
                       <center class="row">
                           <label class="form-label f-w-500"><h4> Assign Checklist Items</h4></label>
                       </center>
                       <div class="row text-right">
                           @forelse ($course_checklists as $item)
                               <div class="mb-3 col-2">
                                   <input class="form-con trol" id="chk{{ $item->id }}"type="checkbox"
                                          value="{{ $item->id }}" checked name="progress_items[]">
                                   <label for="chk{{ $item->id }}"
                                          class="form-label f-w-500">{{ $item->name }}</label>
                               </div>
                           @empty
                           @endforelse

                           @forelse ($checklists as $item)
                               <div class="mb-3 col-2">
                                   <input class="form-con trol" id="chk{{ $item->id }}"type="checkbox"
                                          value="{{ $item->id }}" name="progress_items[]">
                                   <label for="chk{{ $item->id }}"
                                          class="form-label f-w-500">{{ $item->name }}</label>
                               </div>
                           @empty
                           @endforelse
                       </div>
                    <center>

                         <div class="form-footer ">
                              <button class="btn btn-primary btn-block col-4">Update </button>
                         </div>
                    </center>
                    </form>
               </div>
               </div>
               </div>

          </div>
          </div>
     </div>
     <!-- Container-fluid Ends-->
     </div>
</x-dashboard>

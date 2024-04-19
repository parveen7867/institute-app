@extends('welcome')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Teachers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Teacher List</a></li>
              <li class="breadcrumb-item active">Teacher</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@if(session('success'))
   <div class="alert mx-auto alert-success ">
     <strong>Success!</strong> {{session('success')}}
   </div>
@endif
@if(session('error'))
   <div class="alert alert-danger ">
  <strong>Error!</strong> {{session('error')}}
   </div>
@endif
<div class=" w- mx-auto card card-primary  ">
              <div class="card-header ">
                <h3 class="card-title ">Add Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update.teacher')}}" method="post" enctype="multipart/form-data" class="px-5">
                @csrf
                <div class="card-body">
                <div class="row ">
                <div class="col-sm-6">

                  <div class="form-group ">
                    <label for="exampleInputEmail1">Teacher Name</label>
                    <input type="text" name="name" value="{{$teacher->name}}" class="form-control " id="exampleInputEmail1" placeholder="Enter Teacher Name">
                  </div>
                  <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('name'))
                    {{$errors->first('name')}}
                  @endif
                  </div>
                
                  <div class="form-group ">
                    <label for="exampleInputPassword1">Teacher Email</label>
                    <input type="email" class="form-control " value="{{$teacher->email}}" name="email" placeholder="Enter email" />
                  </div>
                  <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('email'))
                    {{$errors->first('email')}}
                  @endif
                  </div>
                 
                  
                  <div class="form-group ">
                  <label>Password</label>
                  <input type="password" class="form-control" value="{{$teacher->password}}"  id=password name="password" rows="3" placeholder="Enter ...">
                  </div>
                  <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('password'))
                    {{$errors->first('password')}}
                  @endif
                  </div>
                 

                  <div class="form-group ">
                    <label for="exampleInputPassword1">Number</label>
                    <input type="text" class="form-control " value="{{$teacher->number}}" name="number" placeholder="Enter Number" />
                  </div>
                  <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('number'))
                    {{$errors->first('number')}}
                  @endif
                  </div>
                    </div>
                    <div class="col-sm-6">
                 <div class="form-group ">
                 <label for="formFile" class="form-label">Selectcourse</label>
               <select name="course"   value="{{$teacher->course}}" class="form-select" id="category">
                    <option selected disabled>Select Course</option>
                    <option value="Java" {{select}} >Java</option>
                   <option value="Python">Python</option>
                  <option value="C++">C++</option>
                   <option value="PHP">PHP</option>
                  <option value="CyberSecurity">CyberSecrity</option>
                   <option value="SQL">SQL</option>

                    </select>
                     </div>

                  <div class="col-sm-6">
                  <div class="form-group ">
                  <label for="formFile" class="form-label">Teacher Images</label>
                  <input class="form-control" name="pic" value="{{$teacher->pic}}" type="file" id="formFile">
                  </div>
                  <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('pic'))
                    {{$errors->first('pic')}}
                  @endif
                  </div>
                 
                  <div class="form-group ">
                  <label>Teachers Address</label>
                  <textarea class="form-control" name="address"  value="{{$teacher->address}}" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                  <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('address'))
                    {{$errors->first('address')}}
                  @endif
                  </div>

 
                  <!-- <div class="form-group ">
                        <label>Status</label>
                        <select class="form-control" name="status" value="{{old('status')}}">
                          <option value="select">select</option>
                          <option value="active">Active</option>
                          <option value="inactive" >Inactive</option>
                        </select>
                      </div>
                  <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('status'))
                    {{$errors->first('status')}}
                  @endif
                  </div> -->
                         </div>
                       </div>


                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary w-25">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
</div>
</div>
@endsection
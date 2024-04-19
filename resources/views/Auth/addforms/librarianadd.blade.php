@extends('welcome')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Librarians</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Librarians List</a></li>
              <li class="breadcrumb-item active">Librarians</li>
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
              <form  action="{{route('store.librarian')}}"  enctype="multipart/form-data" method="post" class="px-5">
                @csrf
                <div class="card-body">
                <div class="row ">
                <div class="col-sm-6">

                  <div class="form-group ">
                    <label for="exampleInputEmail1">Librarian Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control " id="exampleInputEmail1" placeholder="Enter Librarian Name">
                  </div>
                  <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('name'))
                    {{$errors->first('name')}}
                  @endif
                  </div>
                  <div class="form-group ">
                    <label for="exampleInputPassword1">Librarian Email</label>
                    <input type="email" class="form-control " value="{{old('email')}}" name="email" placeholder="Enter email" />
                  </div>
                  <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('email'))
                    {{$errors->first('email')}}
                  @endif
                  </div>
                  
                  <div class="form-group ">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" rows="3" placeholder="Enter ...">
                  </div>
                  <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('password'))
                    {{$errors->first('password')}}
                  @endif
                  </div>

                  <div class="form-group ">
                    <label for="exampleInputPassword1">Number</label>
                    <input type="text" class="form-control " value="{{old('number')}}" name="number" placeholder="Enter Number" />
                  </div>
                  <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('number'))
                    {{$errors->first('number')}}
                  @endif
                  </div>
                    </div>
                  <div class="col-sm-6">
                  <div class="form-group ">
                  <label for="formFile" class="form-label">Librarian Picture</label>
                  <input class="form-control" name="pic" value="{{old('pic')}}" type="file" id="formFile">
                  </div>
                  <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('pic'))
                    {{$errors->first('pic')}}
                  @endif
                  </div>
                 
                  <div class="form-group ">
                  <label>Librarian Address</label>
                  <textarea class="form-control" name="address" rows="3" placeholder="Enter ..."></textarea>
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
                  <button type="submit" class="btn btn-primary w-25">Add Librarian</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
</div>
</div>
@endsection
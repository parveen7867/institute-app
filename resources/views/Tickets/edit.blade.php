@extends('.welcome')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit ticket</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"> List</a></li>
              <li class="breadcrumb-item active">Tickets</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

@if(session('error'))
   <div class="alert alert-danger ">
  <strong>Error!</strong> {{session('error')}}
   </div>
@endif
<div class=" w-50 mx-auto card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action="{{route('update.tkt')}}" method="post">
               @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ticket Details</label>
                    <input type="text" name="details" value="{{$tickets->details}}" class="form-control" id="exampleInputEmail1" placeholder="Enter The details of the ticket">
                  </div>
                  <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('details'))
                    {{$errors->first('details')}}
                  @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">User</label>
                    <input type="text" name="user" value="{{$tickets->user}}" class="form-control" id="exampleInputEmail1" placeholder="Enter The name of the user">
                  </div>
                  <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('user'))
                    {{$errors->first('user')}}
                  @endif
                  </div>
                  <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" value="{{$tickets->status}}" selected>
                          <option >{{$tickets->status}}</option>
                     
                          <option value="active"> Action</option>
                        
                          <option value="inactive">Inaction</option>
                          
                        </select>
                      </div>
                      <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('status'))
                    {{$errors->first('status')}}
                  @endif
                  </div>

                  <div class="form-group">
                        <label>Assign To</label>
                        <select class="form-control" name="assign" value="{{$tickets->status}}" selected>
                          <option >{{$tickets->assign}}</option>
                     
                          <option value="active"> Assign1</option>
                          <option value="active"> Assign2</option>
                          <option value="active"> Assign3</option>
                          
                        </select>
                      </div>
                      <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('assign'))
                    {{$errors->first('assign')}}
                  @endif
                  </div>
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div> -->
                <!-- /.card-body -->
               <input type="hidden" value="{{$tickets->id}}" name="id"/>
                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary w-100">Update Ticket</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
</div>
</div>
@endsection
@extends('.welcome')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Ticket</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item active">Create Ticket</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if(session('success'))
   <div class="alert mx-auto alert-success w-50">
     <strong>Success!</strong> {{session('success')}}
   </div>
@endif
@if(session('error'))
   <div class="alert alert-danger ">
  <strong>Error!</strong> {{session('error')}}
   </div>
@endif
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('store.tkt')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="email">Email : </label>
                    <input type="text" class="form-control" value="{{old('user')}}" name="user" id="name" placeholder="Enter the email">
                    @if($errors->has('user'))
                    <p style="color:red;">{{$errors->first('user')}}</p>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="text">Subject</label>
                    <textarea name="details" value="{{old('details')}}" class="form-control" id="" cols="30" rows="10"></textarea>
                    <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('details'))
                    {{$errors->first('details')}}
                  @endif
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Status</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <select class="form-control" name="status">
                            <option>Select</option>
                            <option>Action</option>
                            <option>Inaction</option>
                        </select>
                      </div>
                      <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('status'))
                    {{$errors->first('status')}}
                  @endif
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Category</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <select class="form-control" name="assign">
                            <option>Select</option>
                            <option>inventor</option>
                            <option>provident</option>
                            <option>ispa</option>
                        </select>
                      </div>
                      <div class=" mt-n2 mb-3 fw-bold fs-6 text-danger">
                  @if($errors->has('assign'))
                    {{$errors->first('assign')}}
                  @endif
                  </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        
</div>
</div>
</div>
            </section>
@endsection
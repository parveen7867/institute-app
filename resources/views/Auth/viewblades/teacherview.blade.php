@extends('welcome')

@section('content')


<div class="card">
<div class=" w- mx-auto card card-primary  w-100 h-100">
    <div class="form-group">
        <h1>Teacher Details</h1>
        @if ($teacher)
            <p><strong> Name:</strong> {{ $teacher->name}}</p>
            <p><strong>Picture:</strong>  <img src="{{asset('images/teachers/'.$teacher->pic)}}" width="50px" height="50px" />
</p>
            <p><strong>EmailAddress :</strong> {{ $teacher->email}}</p>
            <p><strong>Contactnumber :</strong> {{ $teacher->number}}</p>
            <p><strong>Address :</strong> {{ $teacher->address}}</p>
            <p><strong>Course :</strong> {{ $teacher->corse}}</p>
        @else
            <p>teacher not found.</p>
        @endif
        <a href="{{route('index.teacher')}}">  <button type="submit">back</a></button></h3>

    </div>
</div>
@endsection


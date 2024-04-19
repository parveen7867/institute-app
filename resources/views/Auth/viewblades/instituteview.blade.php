@extends('welcome')

@section('content')


<div class="card">
<div class=" w- mx-auto card card-primary  w-100 h-100">
    <div class="form-group">
        <h1>institute Details</h1>
        @if ($institute)
            <p><strong> Name:</strong> {{ $institute->name}}</p>
            <p><strong>Picture:</strong>  <img src="{{asset('images/institutes/'.$institute->pic)}}" width="50px" height="50px" />
</p>
            <p><strong>EmailAddress :</strong> {{ $institute->email}}</p>
            <p><strong>Contactnumber :</strong> {{ $institute->number}}</p>
            <p><strong>Address :</strong> {{ $institute->address}}</p>
        @else
            <p>institute not found.</p>
        @endif
        <a href="{{route('index.institute')}}">  <button type="submit">back</a></button></h3>

    </div>
</div>
@endsection


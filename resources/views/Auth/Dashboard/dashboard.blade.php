@extends('welcome')
@section('content')

<div class=" w- mx-auto card card-primary w-100 ">

              <div class="card-header  ">
                <h2 class="card-title "></h2>
                <lable>Profile</lable> <a href="javascript:history.back()" class="btn btn-infor" ><i class="fas fa-times"></i>Cancel</a>

    <select class="form-control w-50" id="moduleSelect" onchange="redirectToModule()">
        <option value="demograp">Profile</option>
        <option value="additional">Additional Info</option>
        <option value="emergency">Emergency Contact</option>
        <option value="portal">Patient Portal</option>
        <option value="">Upcoming Appointments</option>
        <option value="">Past Appointments</option>
        
    </select>

@endsection
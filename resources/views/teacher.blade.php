@extends('layouts.app')
@section('title', 'Home')



@section('menu')
<li class="nav-item">
    <a href="{{ url('/')}}" class="nav-link">Home</a>
  </li>
  <li class="nav-item">
  </li>
  <li class="nav-item">
    <a href="{{ route('showappointment') }}" class="nav-link">Appointment</a>
  </li>

@endsection

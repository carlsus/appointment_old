@section('menu')
<li class="nav-item">
    <a href="{{ url('/appointee')}}" class="nav-link">Home</a>
  </li>
  <li class="nav-item">
    {{-- <a href="{{ route('portal.show',Auth::user()->id)}}" class="nav-link">Profile</a> --}}
  </li>
  <li class="nav-item">
    <a href="{{ route('appointments.index') }}" class="nav-link">Appointment</a>
  </li>

@endsection

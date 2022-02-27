@section('menu')
<li class="nav-item">
    <a href="{{ url('/portal')}}" class="nav-link">Home</a>
  </li>
  <li class="nav-item">
    {{-- <a href="{{ route('portal.show',Auth::user()->id)}}" class="nav-link">Profile</a> --}}
  </li>
  <li class="nav-item">
    <a href="#" class="nav-link">Teachers</a>
  </li>
  <li class="nav-item">
    <a href="{{ route('departments.index') }}" class="nav-link">Department</a>
  </li>

@endsection

@section('menu')
<li class="nav-item">
    <a href="{{ url('/home')}}" class="nav-link">Home</a>
  </li>
  <li class="nav-item">
    {{-- <a href="{{ route('portal.show',Auth::user()->id)}}" class="nav-link">Profile</a> --}}
  </li>
  <li class="nav-item">
    <a href="{{ route('teachers.index') }}" class="nav-link">Teachers</a>
  </li>
  <li class="nav-item">
    <a href="{{ route('departments.index') }}" class="nav-link">Department</a>
  </li>
    <li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link">Users</a>
  </li>

@endsection

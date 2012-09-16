@layout('layouts/admin/main')



@section('logged')

Logged in as <a href="#" class="navbar-link">Admin</a> | <a href="{{URL::to('admin/logout')}}" class="navbar-link">Logout</a>
@endsection

@section('subnav')

			  <li class="nav-header">Settings</li>
              <li><a href="{{ URL::to('admin/posts/new') }}">User Settings</a></li>
              <li><a href="{{ URL::to('admin/posts') }}">System Settings</a></li>

               


@endsection


@section('nav')
<li><a href="{{ URL::to('admin') }}">Home</a></li>
              <li><a href="{{ URL::to('admin/posts') }}">Posts</a></li>
              <li><a href="{{ URL::to('admin/pages') }}">Pages</a></li>
              <li><a href="{{ URL::to('admin/gallery') }}">Gallery</a></li>
              <li class="active"><a href="{{ URL::to('admin/settings') }}">Settings</a></li>
@endsection




@section('content')
	<div class="hero-unit">
		<h1>Settings</h1>
	</div>



@endsection 
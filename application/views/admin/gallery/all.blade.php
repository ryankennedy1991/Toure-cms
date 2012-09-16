@layout('layouts/admin/main')



@section('logged')

Logged in as <a href="#" class="navbar-link">Admin</a> | <a href="{{URL::to('admin/logout')}}" class="navbar-link">Logout</a>
@endsection

@section('subnav')

			  <li class="nav-header">Gallery Options</li>
              <li><a href="{{ URL::to('admin/posts/new') }}">Upload New Image</a></li>
              <li><a href="{{ URL::to('admin/posts') }}">View All Images</a></li>

               


@endsection

@section('nav')
<li><a href="{{ URL::to('admin') }}">Home</a></li>
              <li><a href="{{ URL::to('admin/posts') }}">Posts</a></li>
              <li><a href="{{ URL::to('admin/pages') }}">Pages</a></li>
              <li class="active"><a href="{{ URL::to('admin/gallery') }}">Gallery</a></li>
              <li><a href="{{ URL::to('admin/settings') }}">Settings</a></li>
@endsection






@section('content')
	<div class="hero-unit">
		<h1>Gallery</h1>
	</div>



@endsection 
@layout('layouts/admin/main')



@section('logged')

Logged in as <a href="#" class="navbar-link">Admin</a> | <a href="{{URL::to('admin/logout')}}" class="navbar-link">Logout</a>
@endsection

@section('subnav')

			  <li class="nav-header">Gallery Options</li>
              <li><a href="{{ URL::to('admin/gallery/new') }}">Upload New Image</a></li>
              <li><a href="{{ URL::to('admin/gallery') }}">View All Images</a></li>

               


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
		<h1>Upload A New Image</h1>
	</div>

       <div class="row-fluid">
              <legend>New Image</legend>
              {{ Form::open_for_files('admin/gallery/new', 'POST') }}
              {{ Form::label('name', 'Image Name') }}
              {{ Form::text('name') }}
              {{ Form::label('description', 'Image Description') }}
              {{ Form::textarea('description') }}
              <hr>
              {{ Form::label('image', 'Image') }}
              {{ Form::file('image') }}
              {{ Form::submit('Upload Image', array('class' => 'btn btn-success')) }}

              {{ Form::close() }}

       </div>       


@section('scripts')
@endsection


@endsection 
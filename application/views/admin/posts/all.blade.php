@layout('layouts/admin/main')



@section('logged')
Logged in as <a href="#" class="navbar-link">Admin</a> | <a href="{{URL::to('admin/logout')}}" class="navbar-link">Logout</a>
@endsection





@section('nav')
<li><a href="{{ URL::to('admin') }}">Home</a></li>
              <li  class="active"><a href="{{ URL::to('admin/posts') }}">Posts</a></li>
              <li><a href="{{ URL::to('admin/pages') }}">Pages</a></li>
              <li><a href="{{ URL::to('admin/gallery') }}">Gallery</a></li>
              <li><a href="{{ URL::to('admin/settings') }}">Settings</a></li>
@endsection


@section('subnav')
<li class="nav-header">Search Posts</li>
               <li><form class="form-search">
  <input type="text" class="input-medium search-query">
  <button type="submit" class="btn">Search</button>
</form></li>
			  <li class="nav-header">Posts Options</li>
              <li><a href="{{ URL::to('admin/posts/new') }}">Create New Post</a></li>
              <li><a href="{{ URL::to('admin/posts') }}">View All Posts</a></li>
@endsection





@section('content')
	<div class="hero-unit">
		<h1>Posts</h1>
	</div>

  @include('admin.posts.error')
  @include('admin.posts.success')

	<div class="row-fluid">
		<table class="table table-hover">
 			<thead>
 				<tr>
 					<td>Post Title</td>
 					<td>Created On</td>
 				</tr>
 			</thead>
 			<tbody>
 				<?php foreach($posts as $post){ ?>
 				<tr>
 					<td>{{ $post->post_title }}</td>
 					<td>{{ $post->created_at }}</td>
          <form action="{{ URL::to_route('admin.posts.show', $post->id) }}" method="get">
          <td style="width:2px"><button class="btn" type="submit">View</button></td>
        </form>
        <form action="{{ URL::to_route('admin.posts.edit', $post->id) }}" method="get">
          <td style="width:2px"><button class="btn btn-success" type="submit">Edit</button></td>
        </form>
        {{ Form::open( URL::to_route('admin.posts.delete', $post->id), 'DELETE') }}
          <td><button class="btn btn-danger" type="submit">Delete</button></td>
        </form>
 				</tr>
 				<?php } ?>
 			</tbody>		
		</table>



	</div>
@endsection 
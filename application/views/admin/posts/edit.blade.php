@layout('layouts/admin/main')



@section('logged')

Logged in as <a href="#" class="navbar-link">Admin</a> | <a href="{{URL::to('admin/logout')}}" class="navbar-link">Logout</a>
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


@section('nav')
<li><a href="{{ URL::to('admin') }}">Home</a></li>
              <li  class="active"><a href="{{ URL::to('admin/posts') }}">Posts</a></li>
              <li><a href="{{ URL::to('admin/pages') }}">Pages</a></li>
              <li><a href="{{ URL::to('admin/gallery') }}">Gallery</a></li>
              <li><a href="{{ URL::to('admin/settings') }}">Settings</a></li>
@endsection





@section('content')
	<div class="hero-unit">
		<h1>Edit Post</h1>
	</div>

  @include('admin.posts.success')
  @include('admin.posts.error')  

	<div class="row-fluid">
		
  {{ Form::open("admin/posts/$post->id", "PUT") }}
  <legend>Edit Post</legend>
  <label>Post Title</label>
  <input type="text" name="title" value="{{ $post->post_title }}">
  <label>Post Content</label>
  <textarea id="content" name="content" rows="15" cols="80" style="width: 80%" class="tinymce">{{ $post->post_content }}</textarea>
  <hr>
  <button type="submit" class="btn btn-success">Update Post</button>
  <button type="submit" class="btn">Cancel</button>
</form>



	</div>

@endsection 



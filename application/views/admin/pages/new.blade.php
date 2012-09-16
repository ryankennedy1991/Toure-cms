@layout('layouts/admin/main')



@section('logged')

Logged in as <a href="#" class="navbar-link">Admin</a> | <a href="{{URL::to('admin/logout')}}" class="navbar-link">Logout</a>
@endsection

@section('subnav')

        <li class="nav-header">Page Options</li>
              <li><a href="{{ URL::to('admin/pages/new') }}">Create New Page</a></li>
              <li><a href="{{ URL::to('admin/pages') }}">View All Pages</a></li>
              <li><a href="{{ URL::to('admin/pages/order') }}">Change Menu Order</a></li>

               
@endsection


@section('nav')
<li><a href="{{ URL::to('admin') }}">Home</a></li>
              <li><a href="{{ URL::to('admin/posts') }}">Posts</a></li>
              <li class="active"><a href="{{ URL::to('admin/pages') }}">Pages</a></li>
              <li><a href="{{ URL::to('admin/gallery') }}">Gallery</a></li>
              <li><a href="{{ URL::to('admin/settings') }}">Settings</a></li>
@endsection





@section('content')
	<div class="hero-unit">
		<h1>Create New Page</h1>
	</div>



	<div class="row-fluid">
		<form action="/admin/pages/new" method="post">
  <legend>Create New Page</legend>
  <label>Page Title</label>
  <input type="text" name="title" placeholder="Page Title....">
  <label><strong>Use this page to display posts?</strong>  <input type="checkbox" name="postpage" id="postpage" value="yes" /></label>
 <div id="vanish"> <label>Page Content</label>
  <textarea id="content" name="content" rows="15" cols="80" style="width: 80%" class="tinymce"></textarea></div>
  <hr>
  <label><strong>Sub Page?</strong>  <input type="checkbox" name="subpage" id="subpage" value="yes" /></label>



  <div style="display:none" id="vanish2">
  <strong>Of: </strong> 
  <select name="sub">
    @foreach ($pages as $page)
        <option>{{ $page }}</option>
    @endforeach

  </select>

  </div>
  <hr>
  <button type="submit" class="btn btn-success">Create Page</button>
  <button type="reset" class="btn">Cancel</button>
</form>




	</div>

@endsection 

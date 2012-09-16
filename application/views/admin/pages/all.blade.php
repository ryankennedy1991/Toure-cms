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
		<h1>Pages</h1>
	</div>

		<div class="row-fluid">
		<table class="table table-hover">
 			<thead>
 				<tr>
 					<td>Page Order</td>
 					<td>Page Name</td>
 					<td>Parent or Child?</td>
 				</tr>
 			</thead>
 			<tbody>
 				<?php foreach($pages as $page){ ?>
 				<tr>
 					<?php if($page->level == 1){
 						$g = "- ";
 						$s = "";
 						$e = "";

 					} elseif ($page->level == 2){
 						$g = "--";
 						$s = "";
 						$e = "";
 					} elseif ($page->level == 0){
 						$g = "";
 						$s = "<strong>";
 						$e = "</strong>";
 					}
 					?>
 					<td>{{ $page->order }}</td>
 					<td>{{$s}}{{ $g.$page->page_name }}{{$e}}</td>
 					<td><?php echo ($page->level == 0) ? "Parent" : "Child"; ?></td>
 					  <form action="{{ URL::to_route('admin.pages.show', $page->id) }}" method="get">
          <td style="width:2px"><button class="btn" type="submit">View</button></td>
        </form>
        <form action="{{ URL::to_route('admin.pages.edit', $page->id) }}" method="get">
          <td style="width:2px"><button class="btn btn-success" type="submit">Edit</button></td>
        </form>
        {{ Form::open( URL::to_route('admin.pages.delete', $page->id), 'DELETE') }}
          <td><button class="btn btn-danger" type="submit">Delete</button></td>
        </form>
 				</tr>
 				<?php } ?>
 			</tbody>		
		</table>



	</div>



@endsection 
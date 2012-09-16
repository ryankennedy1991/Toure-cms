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
			<div class="span3">
		<ul class="unstyled" id="sortable">
			 		
			<?php foreach($pages as $p){ ?>
					<?php if($p->level == 1){
 						$g = "- ";
 						$e = " (Sub Page)";
 						$s = "";
 						$b = "";
 						$f = "";

 					} elseif ($p->level == 2){
 						$g = "--";
 						$e = " (Sub Page)";
 						$s = "";
 						$b = "";
 						$f = "";
 					} elseif ($p->level == 0){
 						$g = "";
 						$e = "";
 						$s = "";
 						$b = "<strong>";
 						$f = "</strong>";
 					}
 					?>
	<li id="{{ $p->id }}" class="ui-state-default well"><i class="icon-resize-vertical" ></i>     <a style="{{ $s }}" href="" >{{$b}}{{ $g.$p->page_name }}{{$f}}</a></li>
			<?php } ?>
</ul>
</div>
<div class="span9">
	<h2>Change your menu order</h2>
	<hr>
	<p>Drag the pages on the left to be in the order you would like them to appear on the main navigation</p>

	
	<button class="btn btn-success" id="sandy">Save Changes</button>
	<button class="btn">cancel</button>
</div>


	</div>





@endsection 

@section('scripts')
<script>
$(function() {
		$( "#sortable" ).sortable({ 
			cursor: "auto", 
			stop:  function(event, ui) {
            var newOrder = $(this).sortable('toArray');
            $.post('/admin/pages/order', {order:newOrder});
        }

		});
		$( "#sortable" ).disableSelection();
	});
		

	
	</script>

@endsection
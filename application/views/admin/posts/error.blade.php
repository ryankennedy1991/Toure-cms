
<?php if( Session::get('error_create') ) { ?>
 <div class="alert alert-error">
     <a class="close" data-dismiss="alert" href="#">×</a>
  <h4 class="alert-heading">Failed To Create New Post!</h4>
  <p>Please <a href="{{ URL::to_route('admin.posts.create')}}">Try Again</a></p>
</div>
<?php } ?>


<?php if( Session::get('error_delete') ) { ?>
 <div class="alert alert-error">
     <a class="close" data-dismiss="alert" href="#">×</a>
  <h4 class="alert-heading">Could not delete post</h4>
  <p>Please <a href="{{ URL::to_route('admin.posts.all')}}">Try Again</a></p>
</div>
<?php } ?>

<?php if( Session::get('error_update') ) { ?>
 <div class="alert alert-error">
     <a class="close" data-dismiss="alert" href="#">×</a>
  <h4 class="alert-heading">Could not update post</h4>
  <p>Please <a href="{{ URL::to_route('admin.posts.all')}}">Try Again</a></p>
</div>
<?php } ?>
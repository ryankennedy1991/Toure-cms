<?php if( Session::get('status_create') ) { ?>
 <div class="alert alert-success">
     <a class="close" data-dismiss="alert" href="#">×</a>
  <h4 class="alert-heading">New Post Created!</h4>
  <p>View your brand new post <a href="{{ URL::to_route('admin.posts.show', Session::get('id')) }}">here</a></p>
</div>
<?php } ?>

<?php if( Session::get('status_delete') ) { ?>
 <div class="alert alert-success">
     <a class="close" data-dismiss="alert" href="#">×</a>
  <h4 class="alert-heading">Post Deleted</h4>
  <p><strong>Yay</strong> Your post was deleted without a hitch!</p>
</div>
<?php } ?>

<?php if( Session::get('status_update') ) { ?>
 <div class="alert alert-success">
     <a class="close" data-dismiss="alert" href="#">×</a>
  <h4 class="alert-heading">Post Updated</h4>
  <p><strong>Yay</strong> Your post was updated without a hitch!</p>
</div>
<?php } ?>
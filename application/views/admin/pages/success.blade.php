<?php if( Session::get('status_create') ) { ?>
 <div class="alert alert-success">
     <a class="close" data-dismiss="alert" href="#">×</a>
  <h4 class="alert-heading">New Page Created!</h4>
  <p>View your brand new page <a href="{{ URL::to_route('admin.pages.show', Session::get('id')) }}">here</a></p>
</div>
<?php } ?>

<?php if( Session::get('status_delete') ) { ?>
 <div class="alert alert-success">
     <a class="close" data-dismiss="alert" href="#">×</a>
  <h4 class="alert-heading">Page Deleted</h4>
  <p><strong>Yay</strong> Your page was deleted without a hitch!</p>
</div>
<?php } ?>

<?php if( Session::get('status_update') ) { ?>
 <div class="alert alert-success">
     <a class="close" data-dismiss="alert" href="#">×</a>
  <h4 class="alert-heading">Page Updated</h4>
  <p><strong>Yay</strong> Your page was updated without a hitch!</p>
</div>
<?php } ?>
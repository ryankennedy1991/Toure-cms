<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
      <title>Make It Value CIC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="{{ URL::base() }}/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
      }
    </style>
    

    
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="{{ URL::base() }}js/jquery-1.7.2.min.js"></script>
  <script src="{{ URL::base() }}js/jquery.scrollTo-min.js"></script>
  <script src="{{ URL::base() }}js/jquery.localscroll-1.2.7-min.js"></script>
  <script src="{{ URL::to_asset('js/bootstrap.js') }}"></script>
      
  <script>


  $(function(){
    $('#login').modal('show');
  });

  </script>

</head>
<body>






<div class="modal hide" id="login">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Sign In</h3>
  </div>
  <div class="modal-body">
    {{ Form::open('admin') }}
    {{ Form::label('email', 'Email:') }}
    {{ Form::email('email') }}
    {{ Form::label('password', 'Password:') }}
    {{ Form::password('password') }}
    
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Close</a>
    {{ Form::submit('Sign In', array('class' => 'btn-success')) }}
    {{ Form::close() }}
  </div>
</div>


</body>

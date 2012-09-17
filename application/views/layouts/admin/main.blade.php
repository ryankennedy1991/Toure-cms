<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Make It Value CMS | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <style>
    ul.thumbnails li.span4:nth-child(3n + 4) {
  margin-left : 0px;
}

ul.thumbnails li.span3:nth-child(4n + 5) {
  margin-left : 0px;
}

ul.thumbnails li.span12 + li {
  margin-left : 0px;
}</style>
    <link href="{{ URL::to_asset('css/bootstrap.css') }}" rel="stylesheet">
    
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
      ul.thumbnails { margin-left: 0; margin-bottom: 0; }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              @section('logged')
              
              @yield_section
            </p>
            <ul class="nav">
              @section('nav')
   
              @yield_section
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              @section('subnav')

              @yield_section
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          	@section('content')
           
           	
	         @yield('content')
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Make It Value 2012</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   
    <script src="{{ URL::to_asset('js/jquery-1.7.2.min.js') }}"></script>
    <script src="{{ URL::to_asset('js/bootstrap.js') }}"></script>
     <script src="{{ URL::to_asset('js/jquery-ui-1.8.23.custom.min.js') }}"></script>

    
    <script type="text/javascript" src="{{ URL::to_asset('js/tiny_mce/tiny_mce.js') }}"></script>
<script type="text/javascript">

      tinyMCE.init({
        mode : "textareas",
        theme : "advanced"  //(n.b. no trailing comma, this will be critical as you experiment later)
     
      });
$('#postpage').change(function(){
  if($('#postpage').is(':checked')){
    $('#vanish').hide('slow');
  } else {
    $('#vanish').show('slow');
  }
});
$('#subpage').change(function(){
  if($('#subpage').is(':checked')){
    $('#vanish2').show('slow');
  } else {
    $('#vanish2').hide('slow');
  }
});

</script>
@section('scripts')
@yield_section

 

  </body>
</html>
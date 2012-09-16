<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Laravel: A Framework For Web Artisans</title>
	<meta name="viewport" content="width=device-width">
	{{ HTML::style('laravel/css/style.css') }}
</head>
<body>
 <h2> Home </h2>

 <?php $id = 1; ?>

 {{ Form::open("admin/posts/edit/$id", "PUT") }}
 {{ Form::submit('put') }}
 {{ Form::close() }}
 {{ Form::open("admin/posts/edit/$id", "GET") }}
 {{ Form::submit('get') }}
 {{ Form::close() }}
 {{ Form::open("admin/posts/delete/$id", "DELETE") }}
 {{ Form::submit('delete') }}
 {{ Form::close() }}
 {{ Form::open("admin/posts/new/$id", "POST") }}
 {{ Form::submit('post') }}
 {{ Form::close() }}



</body>
</html>

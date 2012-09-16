@layout('layouts/admin/main')

@section('content')
 <h1>{{ $content->post_title }}</h1>
          </div>
          <div class="row-fluid">
	
		<div class="well">
			{{ $content->post_content }}
		</div>

@endsection
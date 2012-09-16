@layout('layouts/page-single')

@section('content')
 <h1>{{ $content->page_name }}</h1>
          </div>
          <div class="row-fluid">
	
		<div class="well">
			{{ $content->page_content }}
		</div>

@endsection
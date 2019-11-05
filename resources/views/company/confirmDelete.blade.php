@extends ('admin_layout')

@section ('head')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
@endsection
  
@section ('content')

<div id="page" class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
	<div class="box-body">
	  Are you sure you want to delete company {{ $company->name }}?
	  <div class="row">
	    <div class="col-md-1">
	      <form action="{{ route('company.destroy', $company) }}" method="POST">
		@csrf
		@method('DELETE')
		<button type="submit" class="btn btn-danger">Delete</button>
	      </form>
	    </div>
	    <div class="col-md-1">
	      <a href="{{ route('company.show', $company) }}" class="btn btn-info">Cancel</a>
	    </div>
	  </div>
	</div>
      </div>
    </div>
  </div>
</div>

@endsection

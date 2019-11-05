@extends ('admin_layout')
  
@section ('content')

<div style="padding-bottom:20px;">
  <a href="{{ route('company.create') }}"><i class="fas fa-plus-circle"></i> Add company</a>
</div>

<div class="row">
  <div class="col-lg-6">
    @foreach ($companies as $company)
      <div class="card">
	<div class="card-header">
	  <a href="{{ $company->path() }}"><h5 class="m-0">{{ $company->name }}</h5></a>
	</div>
	<div class="card-body">
	  <div style="float:right;padding-left:20px;">
	    <img src="{{url('storage/'. $company->logo)}}" style="max-height:100px;max-width:100px;">
	  </div>
          <div>
            <strong>Email:</strong> {{ $company->email }}
          </div>
          <div>
            <strong>Website:</strong> <a href="{{ url('http://'. $company->website) }}">{{ $company->website }}</a>
          </div>
          <div>
            <strong>Employees:</strong> {{ count($company->employees) }}
          </div>
	</div>
      </div>
    @endforeach
  </div>
</div>

{{ $companies->links() }}

@endsection

@extends ('admin_layout')
  
@section ('content')

<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <p class="card-text">
          <div style="float:right;padding-left:20px;">
	    <a href="{{ url($company->website) }}" target="_blank" title="Visit the {{ $company->name }} website"><img src="{{url('storage/'. $company->logo)}}" style="max-height:100px;max-width:100px;"></a>
          </div>
          <div>
            <strong>Email:</strong> {{ $company->email }}
          </div>
          <div>
            <strong>Website:</strong> <a href="{{ url($company->website) }}" target="_blank">{{ $company->website }}</a>
          </div>
        </p>
        <div style="border-top:1px solid silver;">
	  <a href="{{ $company->path() }}/edit" class="card-link"><i class="far fa-edit"></i> Edit</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header">
	<h5 class="m-0">Employees ({{ count($company->employees) }})</h5>
      </div>
      <div class="card-body">
	@foreach ($company->employees as $employee)
          <div>
            <a href="{{ $employee->path() }}">{{ $employee->last_name }}, {{ $employee->first_name }}</a>
          </div>
	@endforeach
      </div>
    </div>
  </div>

</div>

@endsection

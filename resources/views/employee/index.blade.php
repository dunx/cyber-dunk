@extends ('admin_layout')
  
@section ('content')

<div style="padding-bottom:20px;">
  <a href="{{ route('employee.create') }}"><i class="fas fa-plus-circle"></i> Add employee</a>
</div>

<div class="row">
  <div class="col-lg-6">
    @foreach ($employees as $employee)
      <div class="card">
        <div class="card-header">
	  <a href="{{ $employee->path() }}"><h5 class="m-0">{{ $employee->last_name }}, {{ $employee->first_name }}</h5></a>
        </div>
        <div class="card-body">
	  <div>
	    <strong>Company:</strong> <a href="{{ $employee->company->path() }}">{{ $employee->company->name }}</a>
          </div>
	  <div>
	    <strong>Email:</strong> <a href="mailto:{{ $employee->email }}" target="_blank">{{ $employee->email }}</a>
          </div>
	  <div>
	    <strong>Phone:</strong> {{ $employee->phone }}
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

{{ $employees->links() }}

@endsection

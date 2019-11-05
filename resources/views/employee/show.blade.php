@extends ('admin_layout')
  
@section ('content')

<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <p class="card-text">
          <div>
            <strong>First name:</strong> {{ $employee->first_name }}
          </div>
          <div>
            <strong>Last name:</strong> {{ $employee->last_name }}
          </div>
          <div>
            <strong>Company:</strong> <a href="{{ $employee->company->path() }}">{{ $employee->company->name }}</a>
          </div>
          <div>
            <strong>Email:</strong> <a href="mailto:{{ $employee->email }}" target="_blank">{{ $employee->email }}</a>
          </div>
          <div>
            <strong>Phone:</strong> {{ $employee->phone }}
          </div>
        </p>
        <div style="border-top:1px solid silver;">
	  <a href="{{ $employee->path() }}/edit" class="card-link"><i class="far fa-edit"></i> Edit</a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

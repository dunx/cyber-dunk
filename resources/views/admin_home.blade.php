@extends ('admin_layout')

@section ('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
	<div class="card">
	  <div class="card-header">
	    <h5 class="m-0">Welcome</h5>
	  </div>
	  <div class="card-body">
	    <p class="card-text">
	      Welcome to the Cyber-Dunk CRM administration page.
	    </p>
	    <p class="card-text">
	      Use the Admin Pages links on the left to view current companies and employees or
              get started by adding a new company or employee using the Quick Start links.
	    </p>
	  </div>
	</div>
      </div>
      <div class="col-lg-6">
	<div class="card">
	  <div class="card-header">
	    <h5 class="m-0">Quick Start</h5>
	  </div>
	  <div class="card-body">
	    <div style="padding-bottom:20px;">
	      <a href="{{ route('company.create') }}"><i class="fas fa-plus-circle"></i> Add company</a>
	    </div>
	    <div style="padding-bottom:20px;">
	      <a href="{{ route('employee.create') }}"><i class="fas fa-plus-circle"></i> Add employee</a>
	    </div>
	  </div>
	</div>
      </div>
    </div>
  </div>
</div>

@endsection

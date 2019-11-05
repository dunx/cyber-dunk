@extends ('admin_layout')

@section ('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
@endsection
  
@section ('content')

<div class="row">
  <div id="wrapper">
    <div id="page" class="container">

      <form method="POST" action="/admin/employee/{{ $employee->id }}">
        @method('PUT')
        @csrf
        <div class="field">
          <label class="label" for="">First name</label>
          <div class="control">
            <input class="input @error('first_name') is-danger @enderror" type="text" name="first_name" id="" value="{{ $employee->first_name }}" />
            @error('first_name')
	      <p class="help is-danger">{{ $errors->first('first_name') }}</p>
            @enderror
          </div>
        </div>
        <div class="field">
          <label class="label" for="">Last name</label>
          <div class="control">
            <input class="input @error('last_name') is-danger @enderror" type="text" name="last_name" id="" value="{{ $employee->last_name }}" />
            @error('last_name')
	      <p class="help is-danger">{{ $errors->first('last_name') }}</p>
            @enderror
          </div>
        </div>
        <div class="field">
          <label class="label" for="">Company</label>
          <div class="select">
            <select class="@error('company_id') is-danger @enderror" name="company_id" id="">
              <option value="">-- Select --</option>
              @foreach ($companies as $company)
		<option value="{{ $company->id }}" {{ ($company->id == $employee->company_id) ? ' selected=""' : '' }}>{{ $company->name }}</option>
              @endforeach
            </select>
          </div>
          @error('company_id')
            <p class="help is-danger">{{ $errors->first('company_id') }}</p>
          @enderror
        </div>
        <div class="field">
          <label class="label" for="">Email</label>
          <div class="control">
            <input class="input @error('email') is-danger @enderror" type="text" name="email" id="" value="{{ $employee->email }}" />
            @error('email')
	      <p class="help is-danger">{{ $errors->first('email') }}</p>
            @enderror
          </div>
        </div>
        <div class="field">
          <label class="label" for="">Phone</label>
          <div class="control">
            <input class="input @error('phone') is-danger @enderror" type="text" name="phone" id="" value="{{ $employee->phone }}" />
            @error('phone')
	      <p class="help is-danger">{{ $errors->first('phone') }}</p>
            @enderror
          </div>
        </div>
        <div class="field is-grouped">
          <div class="control">
            <button class="button is-link" type="submit">Submit</button>
          </div>
          <div class="control">
            <a href="{{ route('employee.confirmDelete',['employee' => $employee->id]) }}" class="btn btn-danger">Delete</a>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

@endsection

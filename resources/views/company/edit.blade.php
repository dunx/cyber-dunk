@extends ('admin_layout')

@section ('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
@endsection
  
@section ('content')

<div class="row">
  <div id="wrapper">
    <div id="page" class="container">

      <form method="POST" action="/admin/company/{{ $company->id }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="field">
          <label class="label" for="">Name</label>
          <div class="control">
            <input class="input @error('name') is-danger @enderror" type="text" name="name" id="" value="{{ $company->name }}" />
            @error('name')
	      <p class="help is-danger">{{ $errors->first('name') }}</p>
            @enderror
          </div>
        </div>
        <div class="field">
          <label class="label" for="">Email</label>
          <div class="control">
            <input class="input @error('email') is-danger @enderror" type="text" name="email" id="" value="{{ $company->email }}" />
            @error('email')
	      <p class="help is-danger">{{ $errors->first('email') }}</p>
            @enderror
          </div>
        </div>
        <div class="field">
          <label class="label" for="">Website</label>
          <div class="control">
            <input class="input @error('website') is-danger @enderror" type="text" name="website" id="" value="{{ $company->website }}" />
            @error('website')
	      <p class="help is-danger">{{ $errors->first('website') }}</p>
            @enderror
            <p class="help">The website should begin with "http://" or "https://".</p>
          </div>
        </div>
        <div class="field">
          <label class="label" for="">Logo</label>
	  <img src="{{url("storage/".$company->logo)}}" style="max-height:75px;max-width:75px;border:solid 1px silver;margin-bottom:10px;" /><br/>
          <div class="control">
            <input class="input @error('logo') is-danger @enderror" type="file" name="logo" id="" />
            @error('logo')
	      <p class="help is-danger">{{ $errors->first('logo') }}</p>
            @enderror
            <p class="help">Any replacement image should have minimum dimensions of 100 x 100.</p>
          </div>
        </div>
        <div class="field is-grouped">
          <div class="control">
            <button class="button is-link" type="submit">Submit</button>
          </div>
          <div class="control">
	    <a href="{{ route('company.confirmDelete',['company' => $company->id]) }}" class="btn btn-danger">Delete</a>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

@endsection

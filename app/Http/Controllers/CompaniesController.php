<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
  /**
  * Render a list of a resource.
  **/
  public function index()
  {
    return view('company.index', [
      'page_title' => 'Companies',
      'companies' => Company::orderBy('name')->paginate(10),
    ]);

  }

  /**
  * Show a single resource.
  **/
  public function show(Company $company)
  {
    return view('company.show', [
      'page_title' => $company->name,
      'company' => $company,
    ]);
  }

  /**
  * Shows a view to create a new resource.
  **/
  public function create()
  {
    return view('company.create', ['page_title' => 'Add a Company']);
  }

  /**
  * Persist the new resource.
  **/
  public function store()
  {

    // Validation.
    request()->validate([
      'name'    => 'required',
      'email'   => ['required', 'email'],
      'website' => ['required', 'url'],
      'logo'    => ['required', 'image', 'dimensions:min_width=100,min_height=100'],
    ]);

    // Create new resource.
    $company = new Company;
    $company->name = request('name');
    $company->email = request('email');
    $company->website = request('website');
    $company->logo = request('logo');

    // Store the logo file.
    if (request()->file('logo')->isValid()){
      $company->logo = request('logo')->store('','public');
    }

    // Save resource.
    $company->save();

    return redirect(route('company.index'));
    
  }

  /**
  * Shows a view to edit an existing resource.
  **/
  public function edit(Company $company)
  {
    return view('company.edit', [
      'page_title' => 'Edit company, '. $company->name,
      'company' => $company,
    ]);
  }

  /**
  * Persist the edited resource.
  **/
  public function update(Company $company)
  {

    // Validation.
    request()->validate([
      'name'    => 'required',
      'email'   => ['required', 'email'],
      'website' => ['required', 'url'],
      'logo'    => ['nullable', 'image', 'dimensions:min_width=100,min_height=100'],
    ]);

    // Update resource.
    $company->name = request('name');
    $company->email = request('email');
    $company->website = request('website');

    // Replace the logo if a replacement provided.
    if(request()->hasFile('logo') && request()->file('logo')->isValid()){
	Storage::disk('public')->delete($company->logo);
	$company->logo = request()->logo->store('', 'public');
    }

    // Save resource.
    $company->save();

    return redirect(route('company.show', $company));
  }

  /**
  * Delete the resource.
  **/
  public function destroy(Company $company)
  {
    // Delete the stored logo.
    Storage::disk('public')->delete($company->logo);

    // Delete the resource.
    $company->delete();

    return redirect(route('company.index'));
  }

  /**
  * Confirm before delete.
  **/
  public function confirmDelete(Company $company)
  {
    // Confirmation page.
    return view('company.confirmDelete', [
      'company' => $company,
      'page_title' => 'Delete company '. $company->name,
    ]);
  }
}

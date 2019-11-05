<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  protected $fillable = ['first_name', 'last_name', 'company_id', 'email', 'phone'];

  // Get the employee's company.
  public function company()
  {
    return $this->belongsTo('App\Company');
  }

  // Get path for an employee.
  public function path()
  {
    return route('employee.show', $this);
  }
}

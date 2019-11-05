<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  // All employees of a company.
  public function employees()
  {
    return $this->hasMany(Employee::class)->orderBy('last_name')->orderBy('first_name');
  }

  // Path for a company.
  public function path()
  {
    return route('company.show', $this);
  }
}

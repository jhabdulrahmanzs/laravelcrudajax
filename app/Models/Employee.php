<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table='employee'; 
    protected $fillable=['emp_name','emp_email','emp_contact','emp_address','emp_profile','emp_password'];
}

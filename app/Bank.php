<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'ifsc',
        'bank_name',
        'branch_name',
        'address',
        'contact_number',
        'email',
        'manager'
    ]; 
}

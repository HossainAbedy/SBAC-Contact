<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch',
        'branch_code',
        'name',
        'email',
        'empid',
        'designation',
        'mobile_number',
        'telephone_number',
        'department'
    ];
}

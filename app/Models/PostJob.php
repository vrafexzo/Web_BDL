<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostJob extends Model
{
    use HasFactory;
    protected $fillable = [
        'idJob',
        'jobtitle',
        'requirements',
        'salary',
        'dateopened',
        'dateexpired',
    ];
}

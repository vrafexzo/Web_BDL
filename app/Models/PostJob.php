<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostJob extends Model
{
    use HasFactory;
    protected $fillable = [
        'idJob',
        'companyName',
        'jobtitle',
        'requirements',
        'salary',
        'dateopened',
        'dateexpired',
        'status'
    ];
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $latestJob = PostJob::orderBy('created_at', 'DESC')->first();
            $latestId = $latestJob ? intval(substr($latestJob->idJob, 1)) : 0;
            $model->idJob = 'J' . str_pad($latestId + 1, 6, '0', STR_PAD_LEFT);
        });
    }

}

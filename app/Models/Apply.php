<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;
    protected $fillable = [
        'idApply',
        'idJob',
        'idUser',
        'name',
        'address',
        'birthDate',
        'email',
        'noHp',
        'cv'
    ];
    public static function generateIdApply()
    {
        // Get the last idApply
        $lastApply = Apply::orderBy('id', 'desc')->first();

        if (!$lastApply) {
            return 'APL00001';
        }
    
        $lastIdNumber = intval(substr($lastApply->idApply, 3));
        $newIdNumber = str_pad($lastIdNumber + 1, 5, '0', STR_PAD_LEFT);
    
        return 'APL' . $newIdNumber;
    }
}

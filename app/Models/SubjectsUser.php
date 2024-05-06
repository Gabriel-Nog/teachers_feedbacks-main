<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectsUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subjects_id'
    ];

    public $timestamps = false;

    protected $table = 'subjects_user';
}

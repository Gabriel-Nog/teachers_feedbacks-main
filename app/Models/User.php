<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'cpf',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teachers()
    {
        return $this->hasOne('App\Models\Teacher');
    }

    public function students()
    {
        return $this->hasOne('App\Models\Student');
    }

    public function classeAsParticipant()
    {
        return $this->belongsToMany(Classes::class);
    }


    public function subjectAsParticipant()
    {
        return $this->belongsToMany(Subjects::class);
    }

    public function professorAsFeedback()
    {
        return $this->hasMany('App\Models\Feedback');
    }

    public function studentFeedback()
    {
        return $this->hasOne(Feedback::class, 'user_email');
    }
}

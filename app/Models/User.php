<?php
namespace App\Models;
use Laravel\Sanctum\HasApiTokens;
use App\Entities\Admin\Notification;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Transformable , MustVerifyEmail
{
    use TransformableTrait;    use HasApiTokens;    use HasFactory, Notifiable;        use HasRoles;
    protected $fillable = [        'name', 'email', 'password','phone','photo','type'];
    protected $hidden   = [        'password', 'remember_token'    ];
    protected $casts    = [        'email_verified_at' => 'datetime',    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

}

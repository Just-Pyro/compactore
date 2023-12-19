<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Profile;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'role',
        'assignment',
        'status',
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
        'password' => 'hashed',
    ];

    public function profile(){
        return $this->hasOne(Profile::class, 'user_id');
    }

    public function shop(){
        return $this->hasOne(Shop::class,'user_id');
    }

    public function cart(){
        return $this->hasOne(ShopCart::class, 'user_id');
    }

    public function swapPost(){
        return $this->hasMany(SwapPost::class, 'user_id');
    }

    public function surplus(){
        return $this->hasMany(Surplus::class, 'user_id');
    }

    public function gcash(){
        return $this->hasOne(GcashUserDetail::class, 'user_id');
    }

    public function order(){
        return $this->hasMany(Order::class, 'user_id');
    }

    public function address(){
        return $this->hasMany(ShippingAddress::class, 'user_id');
    }

    public function claimVoucher(){
        return $this->hasMany(ClaimVoucher::class, 'claimed_by');
    }
}
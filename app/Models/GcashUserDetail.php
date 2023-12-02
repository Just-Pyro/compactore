<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GcashUserDetail extends Model
{
    use HasFactory;

    protected $table = "gcash_user_details";

    protected $fillable = [
        'user_id',
        'number',
        'fullname',
        'email'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

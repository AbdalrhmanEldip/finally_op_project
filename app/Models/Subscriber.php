<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Subscriber extends Model
{
    use HasFactory , softDeletes;
    
    protected $table = 'subscribers';
     protected $fillable = [
         'name',
         'email',
         'mobile',
         'payment_date',
         'expire_date',
         'price',
         'expire',
         'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}

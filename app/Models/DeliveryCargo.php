<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class DeliveryCargo extends Model
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'register_phone',
        'kpay_phone',
        'register_date',
        'is_active',
    ];
    protected $table = 'delivery_cargo';
    protected $primaryKey = 'id';

}

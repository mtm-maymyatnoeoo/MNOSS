<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_role';
    protected $primaryKey = 'id';
    protected $fillable = ['name','description'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

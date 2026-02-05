<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feature';
    protected $primaryKey = 'id';
}

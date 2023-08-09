<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * @package app/Models
 * 
 * @property $timestamp use timestamp in models, should be false 
 */
class Client extends Model
{
    use HasFactory;
    
    public $timestamps = false;
}

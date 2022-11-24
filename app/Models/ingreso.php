<?php

namespace App\Models;
use App\Http\Controllers\Admin\Database;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ingreso extends Model
{
    use HasFactory;
    function __construct() {
    }
    public $table ='ingreso';
    public $timestamps = false;
    
}



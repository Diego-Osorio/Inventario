<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Helper\Table;

class categoria extends Model
{
    use HasFactory;
	/**
	 */
	function __construct() {
	}
	public $table ='categoria';
}

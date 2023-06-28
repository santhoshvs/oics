<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
	protected $table="task";
	protected $fillable = [
        'name',
        'content',
		'emp_id',
		'status',
		'sta',
    ];
	protected $guarded = array();
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
   protected $primaryKey='id';
	protected $table='blocks';
	protected $fillable=['title','topicid','content','iPath','created_at','updated_at'];
}

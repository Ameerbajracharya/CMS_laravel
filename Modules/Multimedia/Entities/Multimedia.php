<?php

namespace Modules\Multimedia\Entities;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $fillable = ['title','image','tags','keyword','metatag','description'];
    protected $table = 'multimedia';
}

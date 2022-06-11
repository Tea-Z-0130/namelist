<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $primaryKey = 'skill_ID';
    
    public $timestamps = false;

    use HasFactory;
    protected $table = 'skill';

    /*
    public function user()
    {
        return $this->belongsTo(Person::class, 'user_ID');
    }
    */
}

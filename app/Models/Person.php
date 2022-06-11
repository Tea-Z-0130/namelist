<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $primaryKey = 'user_ID';
    
    public $timestamps = false;
    
    use HasFactory;
    protected $table = 'user';

    public function skill()
    {
        /* 
           hasMany
          ・第2引数 skill.user_ID
          ・第3引数 user.user_ID
        */
        return $this->hasMany(Skill::class, 'user_ID', 'user_ID');
    }

    // public function age()
    // {
    //     /* 現在日付を取得 */
    //     $now = date('Ymd');

    //     /* 誕生日を取得し、"-"を除去 */
    //     $birthday = $this->user_Birthday;
    //     $birthday = str_replace("-", "", $birthday);

    //     /* 年齢を計算 */
    //     $age = floor(($now - $birthday) / 10000);

    //     return $age;
    // }
}

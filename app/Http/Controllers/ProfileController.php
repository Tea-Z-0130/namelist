<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use App\Models\Skill;

class ProfileController extends Controller
{
    public function test(Request $request)
    {
        $items = Person::with('skill')->get();

        /* 現在の日付を取得 */
        $now = date('Ymd');
        foreach( $items as $item )
        {    
            /* 誕生日を取得し、"-"を除去 */
            /* 誕生日がNULLだったら処理をスルーする */
            $birthday = $item->user_Birthday;
            if($birthday != NULL){
                $birthday = str_replace("-", "", $birthday);

                /* 年齢を計算 */
                $age = floor(($now - $birthday) / 10000);
            
                /* $itemのageに格納 */
                $item->age = $age;
            } else {
                $item->age = '-';
            }
        }
        
        /*dd($items);*/
        return view('Lesson02.profile', ['items' => $items]);
    }
}

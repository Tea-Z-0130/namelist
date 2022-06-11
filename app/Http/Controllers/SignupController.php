<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use App\Models\Skill;

class SignupController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'msg'  => '登録データを入力してください',
        ]; 

        return view('Lesson03.signup', $data);
    }


    /* バリデーション設定 */

    public function add(Request $request)
    {
        $data = [
            'msg'  => '正しく入力されました',
        ];
 
        $validate_rule = [
            'signup_Name' => 'required|max:10',
            'signup_Birthday' => 'nullable|before_or_equal:' . date('Y-m-d'),
            'signup_Skill' => 'array|max:3', /* これが配列であるという宣言 */
            'signup_Skill.*' => 'max:20', /* 配列の中身のルール */
        ];


        $this->validate($request, $validate_rule);


        $user = new Person();
        $user->user_Name = $request->input('signup_Name'); 
        $user->user_Birthday = $request->input('signup_Birthday');
        $user->save();


        foreach( $request->input('signup_Skill') as $item )
        {
            $skill = new Skill();
            $skill->skill_Name = $item;
            $skill->user_ID = $user->user_ID;
            $skill->save();
        }


        


        return view('Lesson03.signup-OK', $data);
    }
}

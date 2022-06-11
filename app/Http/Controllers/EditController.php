<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use App\Models\Skill;

class EditController extends Controller
{
    public function index($user_ID)
    {

        $user = Person::find($user_ID);

        $data = [
            'msg'  => '編集データを入力してください',
            'user' => $user,
        ]; 

        return view('Lesson04.edit', $data);
    }


    /* バリデーション設定 */

    public function edit(Request $request)
    {
        $data = [
            'msg'  => '正しく入力されました',
        ];
 
        $validate_rule = [
            'edit_Name' => 'required|max:10',
            'edit_Birthday' => 'nullable|before_or_equal:' . date('Y-m-d'),
            'edit_Skill' => 'array|max:3', /* これが配列であるという宣言 */
            'edit_Skill.*' => 'max:20', /* 配列の中身のルール */
        ];


        $this->validate($request, $validate_rule);


        $user = Person::find($request->input('edit_hidden_ID'));
        $user->user_Name = $request->input('edit_Name'); 
        $user->user_Birthday = $request->input('edit_Birthday');
        $user->save();
        
        // ユーザIDをキーに特技を全て取得
        Skill::where('user_ID', '=', $request->input('edit_hidden_ID'))->delete();
        
        foreach( $request->input('edit_Skill') as $item )
        {
            if( $item == '' )
            {
                continue;
            }
            $skill = new Skill();
            $skill->skill_Name = $item;
            $skill->user_ID = $user->user_ID;
            $skill->save();
        }


        return view('Lesson04.edit-OK', $data);
    }
}

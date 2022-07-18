<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use App\Models\Skill;

class DeleteController extends Controller
{
    public function index($user_ID)
    {

        $user = Person::find($user_ID);

        $data = [
            'msg'  => 'ユーザーを削除しますか？',
            'user' => $user,
        ]; 

        return view('Lesson05.delete', $data);
    }



    public function delete(Request $request)
    {
        $data = [
            'msg'  => '削除されました',
        ];
 


        $user = Person::find($request->input('delete_hidden_ID'));
        $user->delete();
        
        // ユーザIDをキーに特技を全て取得
        Skill::where('user_ID', '=', $request->input('delete_hidden_ID'))->delete();
        /*
        foreach( $request->input() as $item )
        {
            if( $item == '' )
            {
                continue;
            }
            $skill = new Skill();
            $skill->delete();
        }
        */

        return view('Lesson05.delete-OK', $data);
    }
}

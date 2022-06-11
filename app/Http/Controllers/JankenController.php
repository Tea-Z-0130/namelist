<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JankenController extends Controller
{
    /* battle関数を作成する */
    public function battle() {
        /* $guu、$choki、$paa、$you、$enemy、$result、$retryに渡す値を指定する */
        $data = [
            'guu'=>'グー！',
            'choki'=>'チョキ！',
            'paa'=>'パー！',
            'you'=>'', 
            'enemy'=>'',
            'result'=>'',
            'retry'=>'',
        ];
        /* views内のLesson01フォルダからjanken.blade.phpを表示する */
        return view('Lesson01.janken',$data);
    }

    /* 
    $youを引数にしたgetData関数
    処理後にguu,choki,paa関数に戻す
    */
    private function getData($you) {
        $data = [
            'guu'=>'',
            'choki'=>'',
            'paa'=>'',
            'you'=>$you,            
            'enemy'=>'[相手の手表示]',
            'result'=>'[勝敗表示]',
            'retry'=>'もう一回',
        ];
        
        /*
        相手の手をランダムで判定
        1行目…$enemyの要素を設定
        2行目…$enemyの要素に数字を割り振り(0からスタート)、$countに配列の総数を格納
        3行目…0～2でランダムに数字を選出($countの格納数は3だが、0スタートなので最大値は2)し、$numberに格納
        4行目…$enemyの値が決定したので、それを$dataの'enemy'に渡す(先に'enemy'に入っていた値は上書きされる)
        */
        $enemy = ['グー！','チョキ！','パー！'];
        $count = count($enemy);
        $number = rand(0, $count-1);
        $data['enemy'] = $enemy[$number];


        /*
        上の$enemy[$number]を利用して$youとの比較をする
        各結果を$resultに格納し、$dataの'result'に渡す
        */
        if ($you == $enemy[$number]){
            $result = 'あいこ';
        } elseif ($you == 'グー！' && $enemy[$number] == 'チョキ！'){
            $result = '勝ち！！';
        } elseif ($you == 'チョキ！' && $enemy[$number] == 'パー！'){
            $result = '勝ち！！';
        } elseif ($you == 'パー！' && $enemy[$number] == 'グー！'){
            $result = '勝ち！！';
        } else {
            $result = '負け・・・';
        }
        $data['result'] = $result;


        return $data;
    }

    /* 
    それぞれの自分の手を引数にしてgetData関数へ移す
    $this->getData　このクラスのgetData関数へ飛ぶ
    */
    public function guu() {
        $data = $this->getData('グー！');
        return view('Lesson01.janken',$data);
    }

    public function choki() {
        $data = $this->getData('チョキ！');
        return view('Lesson01.janken',$data);
    }

    public function paa() {
        $data = $this->getData('パー！');
        return view('Lesson01.janken',$data);  
    }
}

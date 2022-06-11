<html>
  <head>
    <title>Lesson01</title>
  </head>
  <body>
    <h1>じゃんけん</h1>
    <hr>
    <h3>・自分の手</h3>
    <!--
      type ボタンの属性、name 処理用の名前、value ボタンの文字、style ボタンのサイズ
    -->
    <!--
    <input type="submit" name="hand1" value="グー" style="width:60px;height:30px">
    <input type="submit" name="hand2" value="チョキ" style="width:60px;height:30px">
    <input type="submit" name="hand3" value="パー" style="width:60px;height:30px">
    -->

    <!--手ごとにアドレスを設定して処理する方法-->
    <!-- <a href="リンク先のURL">テキスト</a> -->
    <a href="/janken/guu">{{$guu}}</a>
    <a href="/janken/choki">{{$choki}}</a>
    <a href="/janken/paa">{{$paa}}</a>

    <h3>{{$you}}</h3>
    <hr>
    <h3>・相手の手</h3>
    <h3>{{$enemy}}</h3>
    <hr>
    <h2>・結果</h2>
    <h2>{{$result}}</h2>
    <hr>
    <a href="/janken">{{$retry}}</a>
  </body>
</html>
<html>
  <head>
    <title>Lesson02</title>
  </head>
  <body>
    <h1>データベース表示</h1>
    <hr>
<!--
    <td>{{$items[0]->user_ID}}</td>
    <td>{{$items[0]->user_Name}}</td>
    <td>{{$items[0]->user_Birthday}}</td>
    <hr>
-->

<!--回答編-->    
<!--
・tableタグで、データを横に並べることができる。
・trはtable row(行)。1行で表す内容を書く。
・thはtable header。trの中に並べて書く。先頭行の見栄えを変えたいときに使う。
・tdはtable data。trの中に並べて書く。書いた分横に並ぶ。
-->
    <table border="1">
    <tr>
      <th>ID</th>
      <th>名前</th>
      <th>誕生日</th>
      <th>年齢</th>
      <th>特技</th>
    </tr>

<!-- 
＠foreachは覚える!!!!
＠foreach ( <配列の変数> as <各要素が格納される変数> ) {
// ループ処理をここへ記述
}
-->
    @foreach( $items as $user )
    <tr>
      <td>{{ $user->user_ID }}</td>
      <td>{{ $user->user_Name }}</td>
      <td>{{ $user->user_Birthday ?? '-' }}</td>
      <td>{{ $user->age }}</td>
      <td>
      <ul>
      @foreach( $user->skill as $skill )
      <li>{{ $skill->skill_Name }}</li>
      @endforeach
      </ul>
      </td>
      <td><a href="/edit/{{ $user->user_ID }}">編集</a></td>
    </tr>
    @endforeach
    </table>
    <hr>
    <a href="/signup">新規登録</a>
  </body>
</html>


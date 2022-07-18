<html>
  <head>
    <title>Lesson05</title>
  </head>
  <body>
    <h1>ユーザー削除</h1>
    <hr>
    <p>{{ $msg }}</p>

    <!--
      <ul>と<li>
      <ul>で囲んだ<li>を箇条書きにする
    -->
    <!--
    @if (count($errors) > 0)
      <ul>
        @foreach ($errors->all() as $error) 
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif
    -->

    <form action="/delete" method="post">
    @csrf
	  名前：<br>
	  {{ $user->user_Name }}<br>
    <br>
	  生年月日：<br>
	  {{ $user->user_Birthday }}<br>
    <br>
    特技名：<br>
	  {{ isset($user->skill[0]) ? $user->skill[0]->skill_Name : '' }}<br>
    {{ isset($user->skill[1]) ? $user->skill[1]->skill_Name : '' }}<br>
    {{ isset($user->skill[2]) ? $user->skill[2]->skill_Name : '' }}<br>
  	<p><input type="submit" value="決定"></p>
    <input type="hidden" value="{{ $user->user_ID }}" name="delete_hidden_ID">
    </form>
    <hr>
    <a href="/profile">一覧ページ</a>
  </body>
</html>


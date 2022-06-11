<html>
  <head>
    <title>Lesson03</title>
  </head>
  <body>
    <h1>ユーザー新規登録</h1>
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
    @if ($errors->has('signup_Name'))
    <p style="color: red">
      名前は10文字以内で入力してください
    </p>
    @endif

    @if ($errors->has('signup_Skill.*'))
    <p style="color: red">
      特技名は20文字以内で入力してください
    </p>
    @endif

    <form action="/signup" method="post">
    @csrf
	  <p>名前（必須）：<br>
	  <input type="text" maxlength="15" name="signup_Name" required></p>
	  <p>生年月日：<br>
	  <input type="date" max="<?php echo date('Y-m-d'); ?>" name="signup_Birthday"></p>
    <p>特技名（3つまで）：<br>
	  <input type="text" maxlength="25" name="signup_Skill[]"></p>
    <input type="text" maxlength="25" name="signup_Skill[]"></p>
    <input type="text" maxlength="25" name="signup_Skill[]"></p>
  	<p><input type="submit" value="決定"></p>
    </form>
    <hr>
    <a href="/profile">一覧ページ</a>
  </body>
</html>


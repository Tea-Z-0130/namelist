<html>
  <head>
    <title>Lesson04</title>
  </head>
  <body>
    <h1>ユーザー編集</h1>
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
    @if ($errors->has('edit_Name'))
    <p style="color: red">
      名前は10文字以内で入力してください
    </p>
    @endif
    
    @if ($errors->has('edit_Skill.*'))
    <p style="color: red">
      特技名は20文字以内で入力してください
    </p>
    @endif

    <form action="/edit" method="post">
    @csrf
	  名前（必須）：<br>
	  <input type="text" value="{{ $user->user_Name }}" maxlength="15" name="edit_Name" required><br>
    <br>
	  生年月日：<br>
	  <input type="date" value="{{ $user->user_Birthday }}" max="<?php echo date('Y-m-d'); ?>" name="edit_Birthday"><br>
    <br>
    特技名（3つまで）：<br>
	  <input type="text" value="{{ isset($user->skill[0]) ? $user->skill[0]->skill_Name : '' }}" maxlength="25" name="edit_Skill[]"><br>
    <input type="text" value="{{ isset($user->skill[1]) ? $user->skill[1]->skill_Name : '' }}" maxlength="25" name="edit_Skill[]"><br>
    <input type="text" value="{{ isset($user->skill[2]) ? $user->skill[2]->skill_Name : '' }}" maxlength="25" name="edit_Skill[]"><br>
  	<p><input type="submit" value="決定"></p>
    <input type="hidden" value="{{ $user->user_ID }}" name="edit_hidden_ID">
    </form>
    <hr>
    <a href="/profile">一覧ページ</a>
  </body>
</html>


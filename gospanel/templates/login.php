<body class="signin_container">

<form class="form-signin" action="send.php?act=login" method="post">
    <center><img class="mb-4" src="../img/logo.png" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Панель управления</h1></center>
  <label for="inputEmail" class="sr-only">ИНН</label>
  <input type="text" id="inputEmail" class="form-control" name="login" placeholder="ИНН" required autofocus>
  <label for="inputPassword" class="sr-only">Пароль</label>
  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль" required>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
</form>
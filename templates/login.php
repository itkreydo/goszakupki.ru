<form class="form-signin" action="send.php?act=login" style="margin-top:20px;">
      <div class="text-center mb-4">
        <p style="font-size:20px;">
          Авторизация
          
          </p>
      </div>

      <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" placeholder="ИНН" required autofocus>
        <label for="inputEmail">ИНН</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" required>
        <label for="inputPassword">Пароль</label>
      </div>


      <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
        <div class="mt10">
        Нет аккаунта? <a href="?act=reg">Зарегистрироваться</a>
        </div>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
    </form>
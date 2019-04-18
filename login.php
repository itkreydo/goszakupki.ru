<?require('templates/header.php');?>   
<form class="form-signin">
      <div class="text-center mb-4">
        <p>
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

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
    </form>
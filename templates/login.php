<div class="form-signin"  style="margin-top:20px;">
      <div class="text-center mb-4">
        <p style="font-size:20px;">
          Авторизация
          
          </p>
      </div>

      <div class="form-label-group">
        <input type="text" id="inputInn" class="form-control" placeholder="ИНН" required autofocus>
        <label for="inputInn" id="inputInn">ИНН</label>
      </div>

      <div class="form-label-group" style="display:none;" id="password">
        <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" required>
        <label for="inputPassword" >Пароль</label>
      </div>


      <button class="btn btn-lg btn-primary btn-block"  id="prishel" onclick="requestpassword()">Запросить пароль</button>
        <div class="mt10">
        Нет аккаунта? <a href="?act=reg">Зарегистрироваться</a>
        </div>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
    </div>
<script>
    function requestpassword () {
        var inn=$("#inputInn").val();
        var password=$("#inputPassword").val();
        if($("#prishel").html()=="Запросить пароль")
            $.ajax({
                url:'/ajax/inn.php',
                type:'POST',
                cache:false,
                data:{'inn':inn},
                dataType:'html',
                success: function(data) {
                    if (data!="") {                        
                        $("#password").css('display', 'block');
                        $("#prishel").text('Войти');
                    }
                    else
                        alert("Неправильный ИНН");
                }
            });
        else
            $.ajax({
                url:'/ajax/authorization.php',
                type:'POST',
                cache:false,
                data:{'inn':inn, 'password':password},
                dataType:'html',
                success: function(data) {
                    if (data=="1") {
                        
                        window.location.replace("http://goszakupki.ru/adminpanel/");
                    }
                    else{
                        alert("Неправильный ИНН или пароль");
                    }
                }
            });
    }
</script>
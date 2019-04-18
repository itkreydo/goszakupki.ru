<div class="reg_container" style="margin-top:20px;">
      <div class="text-center mb-4">
        <p style="font-size:20px;">
          Регистрация
          
          </p>
      </div>
<div class="card mt-3 tab-card">
        <div class="card-header tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Физ.лицо</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Юр.лицо</a>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
              <form class="form-signin" action="send.php?act=reg" method = "post"style="margin-top:20px;">
                  <input type="hidden" name="user_type" value="fizFace">
            <div class="form-label-group">
                <input type="text" id="inn_f" name="inn" class="form-control" placeholder="ИНН" required autofocus>
                <label for="inn_f">ИНН</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="fio" name="fio" class="form-control" placeholder="ФИО" required>
                <label for="fio">ФИО</label>
            </div>
              
            <div class="form-label-group">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Адрес эл.почты" required>
                <label for="inputEmail">Адрес эл.почты</label>
            </div>
                  <div class="g-recaptcha" data-sitekey="6LcjCp8UAAAAAL1BXJoJXGs9pN2LyIE5QY-TBXcD"></div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
              </form>

          </div>
          <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
              
            <form class="form-signin" action="send.php?act=reg" method="post" >
                <input type="hidden" name="user_type" value="urFace">
            <div class="form-label-group">
                <input type="text" id="full_name" class="form-control" placeholder="Полное наименование организации" required autofocus>
                <label for="full_name">Полное наименование организации</label>
            </div>
              
            <div class="form-label-group">
                <input type="text" id="name" class="form-control" placeholder="Сокращенное наименование организации" required autofocus>
                <label for="name">Сокращенное наименование организации</label>
            </div>  
              
            <div class="form-label-group">
                <input type="text" id="ogrn" class="form-control" placeholder="ОГРН" required autofocus>
                <label for="ogrn">ОГРН</label>
            </div>  
              
            <div class="form-label-group">
                <input type="text" id="inn_ur" class="form-control" placeholder="ИНН" required autofocus>
                <label for="inn_ur">ИНН</label>
            </div>

            <div class="form-label-group">
                <input type="text" id="kpp" class="form-control" placeholder="КПП" required>
                <label for="kpp">КПП</label>
            </div>
              
            <div class="form-label-group">
                <input type="email" id="address" class="form-control" placeholder="Адрес (место нахождения)" required>
                <label for="address">Адрес (место нахождения)</label>
            </div>
              
              <p><b>Контактная информация</b></p>

            <div class="form-label-group">
                <input type="text" id="mail" class="form-control" placeholder="Почтовый адрес" required>
                <label for="mail">Почтовый адрес</label>
            </div>
              
            <div class="form-label-group">
                <input type="text" id="contact" class="form-control" placeholder="Контактное лицо" required>
                <label for="contact">Контактное лицо</label>
            </div>
              
            <div class="form-label-group">
                <input type="text" id="phone" class="form-control" placeholder="Телефон" required>
                <label for="phone">Телефон</label>
            </div>
              
            <div class="form-label-group">
                <input type="text" id="fax" class="form-control" placeholder="Факс" required>
                <label for="fax">Факс</label>
            </div>
                
      <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
          </form>       
          </div>

        </div>
      </div>
    
    
    
    
<!--
      <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" placeholder="ИНН" required autofocus>
        <label for="inputEmail">ИНН</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" required>
        <label for="inputPassword">Пароль</label>
      </div>
    
     <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" required>
        <label for="inputPassword">Пароль</label>
      </div>
-->




        <div class="mt10">
        Есть аккаунт? <a href="?act=reg">Войти</a>
        </div>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
    
    </div>
 
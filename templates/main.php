      <div class="container">
          <div class="inner_container">
          <div class="row search_box" style="margin-left:0px;margin-right:0px;">
              <div class="col-12">
                <form>
                    <div class="input-group ">
                  <input type="text" class="form-control" placeholder="Поиск по номеру закупки/названию/организации" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" tyle="border:1px solid #eee;" type="button" id="button-addon2">Найти</button>
                  </div>
                </div>
                </form>
              </div>
          </div>
              Найдено 102 закупки.
              <hr>
          </div>
          <div class="inner_container">
          <div class="row body_box" >

    <div class="col-12">
            <?for ($i=0;$i<count($orgZakupki);$i++){?>
                <div class="card">
                  <div class="card-header">
                      Закупка мотобайков<div style="float:right;color:#777;">№<?=$orgZakupki[$i]["id"]?></div>
                  </div>
                <div class="row">
                    <div class="col-3">
                      <div class="card-body">
                        <div class="black_bold_title">
                              Электронный аукцион
                          </div>
                          <div class="item_date_block">
                                <div class="gray_title">
                                  Дата размещения
                              </div>
                              <div class="">
                              <?=$orgZakupki[$i]["date_start"]?>
                              </div>
                              <div class="gray_title">
                                  Дата окончания
                              </div>
                              <div class="">
                              <?=$orgZakupki[$i]["date_end"]?>
                              </div>
                          </div>
                          <div class="item_date_block">
                          <div class="gray_title">
                              Начальная цена
                          </div>
                          <div class="cost_value">
                              <?=$orgZakupki[$i]["max_price"]?><span style="font-size:14px;">.00 </span>
                          </div>
                            <div class="gray_title">
                              <?=$orgZakupki[$i]["valuta"]?>
                          </div>
                          </div>

                      </div>
                    </div>
                    <div class="col-9">
                      <div class="card-body">
                              <a class="" href="">
                              №<?=$orgZakupki[$i]["id"]?>
                              </a>
                            <div class="gray_title mt10" >
                                  Заказчик
                              </div>
                              <div class="" style="color:#555;">
                              <?=$_SESSION["gos_title"]?>
                              </div>
                            <div class="gray_title">
                                  Объект закупки
                              </div>
                              <div class="" style="color:#555;">
                              <?=$orgZakupki[$i]["description"]?>
                              </div>
                                <div class="gray_title mt10" >
                                  Идентификационный код закупки(ИКЗ)
                              </div>
                              <div class="" style="color:#555;">
                              <?=$orgZakupki[$i]["id"]?><?=$orgZakupki[$i]["id_org"]?>
                              </div>
                          <div class="item_button_block mt10 row" >
                              <div class="col-6" style="text-align:left;">
                            <div class="gray_title " >
                                  Осталось до конца подачи заявок
                              </div>
                              <div class="" style="color:#555;">
                                <?=date_diff(new DateTime(), new DateTime($orgZakupki[$i]["date_end"]))->days?> деней <?=date_diff(new DateTime(), new DateTime($orgZakupki[$i]["date_end"]))->h?> часов
                              </div>
                              </div>
                              <div class="col-6" style="text-align:right;">
                                   <button type="button" class="btn btn-primary" onclick="modal(<?=$orgZakupki[$i]["id"]?>)" data-toggle="modal" data-target="#myModal">Отправить заявку</button>
                              </div>

                              </div>
                      </div>
                    </div>
                </div>
                </div>
            <?}?>
        </div>
</div>
</div>
<div class="mt10">
              <nav aria-label="Page navigation example ">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Предыдущая</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Следующая</a>
    </li>
  </ul>
</nav>
    </div>
          </div>
<!-- Модальное окно -->  
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Отправить заявку</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div style="margin-top: 10px;" id="zakazchik">ЗАКАЗЧИК: </div>
              <div style="margin-top: 10px;" id="zakaz">ОБЪЕКТ ЗАКАЗА: </div>
              <div style="margin-top: 10px;" id="otpravutel">ОТПРАВИТЕЛЬ: </div>
          
              <div class="row" style="margin-top: 10px">
                  <div class="col">
                      <div>ПРЕДЛОЖЕННАЯ ЦЕНА:</div>
                  </div>
                  <div class="col">
                      <input type="text" class="form-control" id="money" placeholder="Предложенная цена" name = "offer_price">
                  </div>
                  <div class="col">
                      <div>руб.</div>
                  </div>
              </div>
 
      </div>
        
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="sendcontract" onclick="contrd()">Отправить заявку</button>
      </div>
    </div><!-- /.модальное окно-Содержание -->  
  </div><!-- /.модальное окно-диалог --> 
</div>    
       
       
<script>
</script>
<script>
    function contrd() {
        var cost=$("#money").val();
        $.ajax({
                url:'/ajax/contract.php',
                type:'POST',
                cache:false,
                data:{'id':"<?=$_SESSION['id']?>", 'cost':cost, 'id_order':"1"},
                dataType:'html',
                success: function(data) {
                    if (data!="") {
                        $("myModal").css('display':'none');
                        alert("Заявка принята!");
                    }
                    else
                        alert("Введите цену!");
                }
            });
    }
    function modal(id) {
        $.ajax({
                url:'/ajax/order.php',
                type:'POST',
                cache:false,
                data:{'id':id},
                dataType:'json',
                success: function(data) {
                    if (data!="") {
                        $("#otpravutel").text("ОТПРАВИТЕЛЬ: <?=$_SESSION["fio"]?>");
                        $("#zakazchik").text("ЗАКАЗЧИК: "+data.zakazchik);
                        $("#zakaz").text("ОБЪЕКТ ЗАКАЗА: "+data.zakaz);
                    }
                    else
                        alert("Ошибка!");
                }
            });
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" ></script>
<script src="js/bootstrap/bootstrap.min.js"></script>  
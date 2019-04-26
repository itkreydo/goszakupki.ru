

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <div class="main_container">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Гос заказ #<?=$id_order;?> (<?=$orderDetail[0]["title"]?>)</h1>
                                        <div style="float:right;text-align:left;">
                            <div class="gray_title " >
                                  Осталось до конца подачи заявок
                              </div>
                              <div class="" style="color:#555;">
                                <?=date_diff(new DateTime(), new DateTime($orderDetail[0]["date_end"]))->days?> деней <?=date_diff(new DateTime(), new DateTime($orderDetail[0]["date_end"]))->h?> часов
                              </div>
                              </div>
      </div>
<div class="col-12" style="border-bottom:1px #ccc dotted">
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
                              <?=$orderDetail[0]["date_start"]?>
                              </div>
                              <div class="gray_title">
                                  Дата окончания
                              </div>
                              <div class="">
                              <?=$orderDetail[0]["date_end"]?>
                              </div>
                          </div>
                          <div class="item_date_block">
                          <div class="gray_title">
                              Начальная цена
                          </div>
                          <div class="cost_value">
                              <?=$orderDetail[0]["max_price"]?><span style="font-size:14px;">.00 </span>
                          </div>
                            <div class="gray_title">
                              <?=$orderDetail[0]["valuta"]?>
                          </div>
                          </div>

                      </div>
                    </div>
                    <div class="col-9">
                      <div class="card-body">
                              <a class="" href="">
                              №<?=$orderDetail[0]["id"]?>
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
                              <?=$orderDetail[0]["description"]?>
                              </div>
                                <div class="gray_title mt10" >
                                  Идентификационный код закупки(ИКЗ)
                              </div>
                              <div class="" style="color:#555;">
                              <?=$orderDetail[0]["id"]?><?=$orderDetail[0]["id_org"]?>
                              </div>
                      </div>
                    </div>
                </div>
            
 
        </div>
<div class="">
        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">ФИО</th>
      <th scope="col">Дата</th>
      <th scope="col">Цена</th>
    </tr>
  </thead>
  <tbody>
      <?for ($i=0;$i<count($providersList);$i++){?>
    <tr class="<?=($i==0)? "table-success" :"" ?>">
      <th scope="row"><?=$i+1?></th>
      <td><?=$providersList[$i]["fio"]?></td>
      <td><?=$providersList[$i]["date"]?></td>
      <td><?=$providersList[$i]["price"]?></td>
    </tr>
      <?}?>
  </tbody>
</table>
    <center><?=(count($providersList)==0)? "Участников нет.":""?></center>
        </div>
        
    </div>
</main>

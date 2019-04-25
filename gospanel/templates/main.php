

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <div class="main_container">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ваши госзаказы</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
                <div style="padding:10px;float:right;">
                Выводить по: 
                <div class="btn-group" role="group" aria-label="Basic example">

                  <a href="?page=<?=$page?>&limit=1" class="btn btn-secondary <?=(($limit==1) ? "active":"") ?>">1</a>
                    <a href="?page=<?=$page?>&limit=20" class="btn btn-secondary <?=(($limit==20) ? "active":"") ?>">20</a>
                  <a href="?page=<?=$page?>&limit=50" class="btn btn-secondary <?=(($limit==50) ? "active":"") ?>">50</a>
                  <a href="?page=<?=$page?>&limit=100" class="btn btn-secondary <?=(($limit==100) ? "active":"") ?>">100</a>
                </div>
                    </div>
        </div>
      </div>
        <div class="col-12">
            <?for ($i=0;$i<count($orgZakupki);$i++){?>
                <div class="card" style="margin-bottom:20px;">
                  <div class="card-header">
                      <?=$orgZakupki[$i]["title"]?><div style="float:right;color:#777;">№<?=$orgZakupki[$i]["id"]?></div>
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
                                   <a href="?act=orderDetail&id=<?=$orgZakupki[$i]["id"]?>" class="btn btn-primary">Подробнее</a>
                              </div>

                              </div>
                      </div>
                    </div>
                </div>
                </div>
            <?}?>
        </div>
                    <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item <?=(($page==1) ? "disabled":"" )?>">
                  <a class="page-link" href="?page=<?=$page-1?>&limit=<?=$limit?>" tabindex="-1" aria-disabled="true">Предыдущая</a>
                </li>
                  <?  for ($i=0;$i<$orderPagesNum;$i++){?>
                <li class="page-item <?=(($page-1==$i) ? "active":"") ?>"><a class="page-link" href="?page=<?=($i+1)?>&limit=<?=$limit?>"><?=$i+1?></a></li>
                  <?}?>
                <li class="page-item <?=(($page==$orderPagesNum) ? "disabled":"") ?>">
                  <a class="page-link " href="?page=<?=$page+1?>&limit=<?=$limit?>">Следующая</a>
                </li>
              </ul>
            </nav>
        
    </div>
</main>

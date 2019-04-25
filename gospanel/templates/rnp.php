

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div>
            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
    <div class="main_container">

        <div class="col-12">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h3">Добавление участника в список РНП</h3>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
          </div>
        <div class="row" style="margin-top: 30px;" >
            <div class="col-4">
            
                <form action="send.php?act=addUserToRNP" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ФИО поставщика</label>
                    <input type="text" class="form-control smartfinder" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ФИО ">
                        <ul class="search_result"></ul>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">ИНН</label>
                    <input type="text" class="form-control" name="inn" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ИНН">
                   
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Причина для внесения в РНП</label>
                    <input type="text" class="form-control" name="reason" id="exampleInputPassword1" placeholder="Причина">
                  </div>
                  <div class="row" style="margin-top: 10px">
                      <div class="col-6">
                          <label for="exampleInputPassword1">Дата включения</label>
                          <input type="date" class="form-control"  placeholder="Дата включения" name="date_start">
                      </div>
                      <div class="col-6">
                          <label for="exampleInputPassword1">Дата исключения</label>
                          <input type="date" class="form-control"  placeholder="Дата исключения" name="date_end">
                      </div>
                  </div>
                 
                  <button type="submit" class="btn btn-primary" style="margin-top:20px;">Добавить</button>
                </form>
            </div> 
            <div class="col-8">
                <div style="padding:10px;float:left;">
                                <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item <?=(($page==1) ? "disabled":"" )?>">
                  <a class="page-link" href="?page=<?=$page-1?>&limit=<?=$limit?>" tabindex="-1" aria-disabled="true">Предыдущая</a>
                </li>
                  <?  for ($i=0;$i<$rnpPagesNum;$i++){?>
                <li class="page-item <?=(($page-1==$i) ? "active":"") ?>"><a class="page-link" href="?page=<?=($i+1)?>&limit=<?=$limit?>"><?=$i+1?></a></li>
                  <?}?>
                <li class="page-item <?=(($page==$rnpPagesNum) ? "disabled":"") ?>">
                  <a class="page-link " href="?page=<?=$page+1?>&limit=<?=$limit?>">Следующая</a>
                </li>
              </ul>
            </nav>
                </div>
                <div style="padding:10px;float:right;">
                                    Выводить по: 
                <div class="btn-group" role="group" aria-label="Basic example">

                  <a href="?act=rnp&page=<?=$page?>&limit=1" class="btn btn-secondary <?=(($limit==1) ? "active":"") ?>">1</a>
                    <a href="?act=rnp&page=<?=$page?>&limit=20" class="btn btn-secondary <?=(($limit==20) ? "active":"") ?>">20</a>
                  <a href="?act=rnp&page=<?=$page?>&limit=50" class="btn btn-secondary <?=(($limit==50) ? "active":"") ?>">50</a>
                  <a href="?act=rnp&page=<?=$page?>&limit=100" class="btn btn-secondary <?=(($limit==100) ? "active":"") ?>">100</a>
                </div>
                    </div>
                <div class="table_block ">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col">#</th> 
                              <th scope="col">Наименование/ФИО</th> 
                              <th scope="col">ИНН</th>
                              <th scope="col">Причина</th>
                              <th scope="col">Дата включения</th>
                              <th scope="col">Дата исключения</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?for ($i=0;$i<count($rnpData);$i++){?>
                            <tr>
                              <th scope="row"><?=($i+1)?></th>
                              <td><?=$rnpData[$i]['fio']?></td>  
                              <td><?=$rnpData[$i]['inn']?></td>
                              <td><?=$rnpData[$i]['reason']?></td>
                              <td><?=$rnpData[$i]['date_start']?></td>
                              <td><?=$rnpData[$i]['date_end']?></td>
                            </tr>
                              <?}?>
                            </tbody>
                    </table>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item <?=(($page==1) ? "disabled":"" )?>">
                  <a class="page-link" href="?act=rnp&page=<?=$page-1?>&limit=<?=$limit?>" tabindex="-1" aria-disabled="true">Предыдущая</a>
                </li>
                  <?  for ($i=0;$i<$rnpPagesNum;$i++){?>
                <li class="page-item <?=(($page-1==$i) ? "active":"") ?>"><a class="page-link" href="?act=rnp&page=<?=($i+1)?>&limit=<?=$limit?>"><?=$i+1?></a></li>
                  <?}?>
                <li class="page-item <?=(($page==$rnpPagesNum) ? "disabled":"") ?>">
                  <a class="page-link " href="?act=rnp&page=<?=$page+1?>&limit=<?=$limit?>">Следующая</a>
                </li>
              </ul>
            </nav>
        </div>
    </div>
        
    </main>

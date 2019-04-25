

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <div class="main_container">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Диалоги</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            Месяц
          </button>
        </div>
      </div>
        <div class="col-12">
            <?for ($i=0;$i<count($supportDialodsData);$i++){?>
            <div class="card">
              <div class="card-header">
                 <?=$supportDialodsData[$i]['reason']?>
                <div style="float:right;color:#777;">#<?=$supportDialodsData[$i]['id']?></div>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-3">
                      <div class="">
                        <div class="black_bold_title">
                            <b> <?=$supportDialodsData[$i]['fio']?></b>
                          </div>
                          <div class="item_date_block">
                            <div class="gray_title">
                                  <?=$supportDialodsData[$i]['date_created']?>
                            </div>
                          </div>
                      </div>
                      </div>
                    <div class="col-9">
                      <div class="">
                          <div class="" style="color:#555;">
                          <?=$supportDialodsData[$i]['text']?>
                          </div>

                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <?}?>
        </div>
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

                  <a href="?page=<?=$page?>&limit=1" class="btn btn-secondary <?=(($limit==1) ? "active":"") ?>">1</a>
                    <a href="?page=<?=$page?>&limit=20" class="btn btn-secondary <?=(($limit==20) ? "active":"") ?>">20</a>
                  <a href="?page=<?=$page?>&limit=50" class="btn btn-secondary <?=(($limit==50) ? "active":"") ?>">50</a>
                  <a href="?page=<?=$page?>&limit=100" class="btn btn-secondary <?=(($limit==1) ? "active":"") ?>">100</a>
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
    </div>
        </div>
    </main>

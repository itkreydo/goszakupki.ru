

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <div class="main_container">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Диалоги с тех поддержкой</h1>
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

        </div>
    </main>



    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <div class="main_container">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?=$title?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <button  type="button" class="btn btn-sm btn-primary " data-toggle="modal" data-target="#exampleModal">
            Новый чат
          </button>
        </div>
      </div>
        <div class="col-12">
            <?for ($i=0;$i<count($supportDialodsData);$i++){?>
            <a href="?act=dialogDetail&support=<?=$supportDialodsData[$i]['id']?>" style="text-decoration:none; color:black;">
            <div class="card" style="margin-bottom:20px;">
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
            </a>
            <?}?>
        </div>

        </div>
    </main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Обращение в тех поддержку</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                <form action="send.php?act=newSupport" method="POST">
      <div class="modal-body">

            Причина обращения:
            <input type="text" name="reason" class="form-control">
            Описание проблемы:
            <textarea type="text" name="text" class="form-control">
            </textarea>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Отправить</button>
      </div>
                              </form>
    </div>
  </div>
</div>

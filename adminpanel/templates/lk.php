<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="main_container">

        <div class="col-12">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h3">Создание госзаказа</h3>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
          </div>
        <div class="row" style="margin-top: 30px;" >
            <div class="col-4">
                <form action="send.php?act=addUserToRNP" method="post">
                    <div class="form-group">
                        <label>Объект закупки</label>
                        <input type="text" class="form-control smartfinder" name="object" placeholder="Объект закупки">
                    </div>
                    <div class="form-group">
                        <label >Описание закупки</label>
                        <input type="text" class="form-control smartfinder" name="description" placeholder="Описание закупки">
                    </div>
                  <div class="form-group">
                       <label >Начальная цена</label>
                        <input type="text" class="form-control smartfinder" name="start_price" placeholder="Начальная цена">
                  </div>
                  <div class="row" style="margin-top: 10px">
                      <div class="col-6">
                          <label>Дата размещения</label>
                          <input type="date" class="form-control"  placeholder="Дата размещения" name="date_start">
                      </div>
                      <div class="col-6">
                          <label>Дата окончания</label>
                          <input type="date" class="form-control"  placeholder="Дата окончания" name="date_end">
                      </div>
                  </div>
                 
                  <button type="submit" class="btn btn-primary" style="margin-top:20px;">Добавить</button>
                </form>
            </div> 
            <div class="col-8">
               
               
               
           
        </div>
    </div>
    </div>
    </main>

</main>

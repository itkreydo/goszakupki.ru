<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"> 
<div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"> 
<div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"> 
<div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div> 
<div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div> 
<div class="main_container"> 
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"> 
<h1 class="h2"><?=$result[0]["reason"]?></h1> 
<div class="btn-toolbar mb-2 mb-md-0"> 
<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle"> 
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 
Месяц 
</button> 
</div> 
</div> 
<div id="allChat"> 

<?for ($i=0;$i<count($result);$i++){
    $isAdmin=($result[$i]['sender']=="0")?TRUE:FALSE;
    ?>
<div class="row"> 
    <?=($isAdmin)?"<div class='col-3'></div> ": "";?>
    
    <div class="col-9"> 
        <div class="card" style="margin: 10px;<?=($isAdmin)?"background: #eff1ec;": "";?>"> 
            <div class="card-body" style="float:right;color:#777; "> 
                <div class="row"> 
                    <div class="col-3"> 
                    <div class=""> 
                    <div class="black_bold_title"> 
                    <b><?=($isAdmin)?"Техподдержка": $result[$i]['fio'];?></b> 
                    </div> 
                    <div class="item_date_block"> 
                    <div class="gray_title"> 
                    <?=$result[$i]['date']?> 
                    </div> 
                    </div> 
                    </div> 
                    </div> 
                    <div class="col-6"> 
                    <div class=""> 
                    <div class="" style="color:#555;"> 
                    <?=$result[$i]['text']?> 
                    </div> 

                    </div> 
                    </div> 
                </div> 
        </div> 
        </div> 
    </div> 
</div> 
<?}?>
</div> 
<div class="row" style="margin-top: 20px;padding-top:20px;border-top:1px dotted #ccc"> 
<div class="col-8"> 
<textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="2" placeholder="Write something here..."></textarea> 
</div> 
<div class="col-4"> 
<button type="submit" class="btn btn-primary" style="margin-top:20px; margin-left: 20px;" id="sendmess" onclick="sendMessage()">Отправить</button> 
</div> 
</div> 
</div> 

</main>
<script>
    var params = window
    .location
    .search
    .replace('?','')
    .split('&')
    .reduce(
        function(p,e){
            var a = e.split('=');
            p[ decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
            return p;
        },
        {}
    );
    function sendMessage() {
        var text=$("#exampleFormControlTextarea6").val();
        $.ajax({
                url:'ajax/sendMessageSupport.php',
                type:'POST',
                cache:false,
                data:{'text':text, support:params["support"]},
                dataType:'html',
                success: function(data) {
                    if (data!="") {
                        $("#allChat").append("<div class='row'><div class='col-3'></div><div class='col-9'> <div class='card' style='margin: 10px; background: #eff1ec;'> <div class='card-body' style='float:right;color:#777;'><div class='row'><div class='col-3'><div class=''><div class='black_bold_title'><b>Техподдержка</b></div><div class='item_date_block'><div class='gray_title'>Сейчас</div></div></div></div><div class='col-6'><div class=''> <div class='' style='color:#555;'>"+text+"</div></div></div></div></div></div></div></div>");
                        $("#exampleFormControlTextarea6").val("");
                    }
                    else
                        alert("Пустое сообщение!");
                }
            });
    }
</script>
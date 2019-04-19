<?php 

    include('libs/phpqrcode/qrlib.php'); 
     
    // outputs image directly into browser, as PNG stream 
    QRcode::png('7y8y8y');
?>

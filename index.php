<center>
<?php
include('QR_BarCode.php');
$qr = new QR_BarCode();
$qr->url("menu.html");
$qr->qrCode(400, 'qr-hotel.png');
?>
<img src="qr-hotel.png" alt="qr-hotel"/>
</center>

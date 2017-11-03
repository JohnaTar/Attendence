<?php 


$now = time(); // or your date as well
$your_date = strtotime("2017-10-01");
$datediff = $now - $your_date;

echo floor($datediff / (60 * 60 * 24));



?>
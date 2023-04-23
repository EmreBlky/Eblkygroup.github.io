<?php


require_once('class.crud.php');


$date = date('Y-m-d H:i:s');
$imei = $_POST['imei'];
$premium = 'n';
$transection_id = '';
$status = 'n';

if($crud->create($date,$imei,$premium,$transection_id,$status))
	{ return '1' ; 	}
	else
	{ return '0' ; 	}



?>
<?php


require_once('class.crud.php');


//$date = date('Y-m-d H:i:s');
 $imei = $_POST['imei'];


//if($_SERVER['HTTP_REFERER'] == 'index.php'){

  extract($crud->getIMEI($imei));
  
 // echo $comment; 
  
  
  if($premium=='y'){$premium ='Yes';} else {$premium = 'No';}
  if($status=='n'){$status="New"; } elseif($status=='p') { $status="Processing"; } elseif($status=='c'){ $status="Complete"; } else { $status="Denied" ; }

                   echo '<div class="form-group">
						<label class="control-label col-sm-2" for="email" style="color:#337ab7; font-size:16px; padding-top:0px "> Data and time:</label>
						<div class="col-sm-10" style="color:#337ab7; font-size:16px;">'.$date_time.'
						</div>
						</div>				
						
						<div class="form-group">
						<label class="control-label col-sm-2" for="email" style="color:#337ab7; font-size:16px; padding-top:0px">Imei</label>
						<div class="col-sm-10" style="color:#337ab7; font-size:16px;">
						'.$imei.'
						</div>
						</div>				
						
						<div class="form-group">
						<label class="control-label col-sm-2" for="email" style="color:#337ab7; font-size:16px; padding-top:0px"> Premium:</label>
						<div class="col-sm-10" style="color:#337ab7; font-size:16px;">
						'.$premium.'
						</div>
						</div>	
						
						<div class="form-group">
						<label class="control-label col-sm-2" for="email" style="color:#337ab7; font-size:16px; padding-top:0px">Transaction ID :</label>
						<div class="col-sm-10" style="color:#337ab7; font-size:16px;">
						'.$transection_id.'
						</div>
						</div>					
						<div class="form-group">
						<label class="control-label col-sm-2" for="email" style="color:#337ab7; font-size:16px; padding-top:0px">Status:</label>
						<div class="col-sm-10" style="color:#337ab7; font-size:16px;">
						'.$status.'
						</div>
						</div>
						<div class="form-group">
						<label class="control-label col-sm-2" for="email" style="color:#337ab7; font-size:16px; padding-top:0px">Comments:</label>
						<div class="col-sm-10" style="color:#337ab7; font-size:16px;">
						'.$comment.'
						</div>
						</div>';
	

//}

?>
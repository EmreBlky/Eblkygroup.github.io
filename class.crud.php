<?php

require_once('admin/dbconfig.php');

class crud
{
	private $db;
	
	function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->db = $db;
	}
	
	public function create($date_time,$imei,$premium,$transection_id,$status)
	{    //echo $date_time;  echo '<br>'; echo $imei; echo '<br>';  echo $premium;  echo '<br>'; echo $transection_id ; echo '<br>';  echo $status; 
	          
		$stmt = $this->db->prepare("SELECT * FROM imei WHERE imei=:imei");
		$stmt->execute(array(":imei"=>$imei));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		
		//echo $editRow['order_no'];		
		
		if($editRow['order_no'] > '0'){ echo '0'; return false;  }		
	
		try
		{
			$stmt = $this->db->prepare("INSERT INTO imei(date_time,imei,premium,transection_id,status) VALUES( :date_time, :imei, :premium,:transection_id,:status)");
			//$stmt->bindparam(":order_no",$order_no);
			$stmt->bindparam(":date_time",$date_time);
			$stmt->bindparam(":imei",$imei);
			$stmt->bindparam(":premium",$premium);
			$stmt->bindparam(":transection_id",$transection_id);
			$stmt->bindparam(":status",$status);
			$stmt->execute();
			echo '1'; 
			return true;
			
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
						echo '0'; // exit;
			return false;
		
		}   
	
		
	}
	
	public function getID($id)
	{  // echo $id; exit;
		$stmt = $this->db->prepare("SELECT * FROM imei WHERE order_no=:order_no");
		$stmt->execute(array(":order_no"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	
	public function getIMEI($imei)
	{  // echo $id; exit;
		$stmt = $this->db->prepare("SELECT * FROM imei WHERE imei=:imei");
		$stmt->execute(array(":imei"=>$imei));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	public function update($order_no,$date_time,$imei,$premium,$transection_id,$status)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE imei SET date_time=:date_time, 
		                                               	imei=:imei, 
													   premium=:premium, 
													   transection_id=:transection_id,
													   status=:status
													WHERE order_no=:order_no ");
			$stmt->bindparam(":date_time",$date_time);
			$stmt->bindparam(":imei",$imei);
			$stmt->bindparam(":premium",$premium);
			$stmt->bindparam(":transection_id",$transection_id);
			$stmt->bindparam(":status",$status);
			$stmt->bindparam(":order_no",$order_no);
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function delete($order_no)
	{   // echo "asdf";   echo $order_no;
		$stmt = $this->db->prepare("DELETE FROM imei WHERE order_no=:order_no");
		$stmt->bindparam(":order_no",$order_no);
		$stmt->execute();
		return true;
	}
	
	/* paging */
	
	public function dataview($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php print($row['order_no']); ?></td>
                <td><?php print($row['date_time']); ?></td>
                <td><?php print($row['imei']); ?></td>
                <td><?php print($row['premium']); ?></td>
                <td><?php print($row['transection_id']); ?></td>
				<td><?php print($row['status']); ?></td>
                <td align="center">
                <a href="edit-data.php?edit_id=<?php print($row['order_no']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                <a href="delete.php?delete_id=<?php print($row['order_no']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{	?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}		
	}
	
	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_POST["page_no"]))
		{
			$starting_position=($_POST["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];		
		$stmt = $this->db->prepare($query);
		$stmt->execute();		
		$total_no_of_records = $stmt->rowCount();		
		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_POST["page_no"]))
			{
				$current_page=$_POST["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<li><a href='".$self."?page_no=1'>First</a></li>";
				echo "<li><a href='".$self."?page_no=".$previous."'>Previous</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."?page_no=".$next."'>Next</a></li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Last</a></li>";
			}
			?></ul><?php
		}
	}
	
	
}

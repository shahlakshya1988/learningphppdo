<?php 
require_once "db.php";
/***
 *  we will be selecting two persons from our
 *  database, any person one will be sender and other one will be receiver
 */
 $sender_id = 1; // have taken any two id from db
 $receiver_id = 2; // have taken any two id from db
 
 $emp_record_details_sql = "SELECT * FROM `emp_record` where `id` = :emp_id ";
 $emp_record_details_stmt = $connection->prepare($emp_record_details_sql);
 $emp_record_details_stmt->execute([":emp_id"=>$sender_id]);
 $sender_details = $emp_record_details_stmt->fetch(PDO::FETCH_OBJ);

 
 $emp_record_details_stmt->execute([":emp_id"=>$receiver_id]);
 $receiver_details = $emp_record_details_stmt->fetch(PDO::FETCH_OBJ);
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Transaction Details</title>
</head>
<body>
	<table style="width:100%;max-width:100%;">
		<caption><h3>Before Transaction</h3></caption>
		<thead>
			<tr>
				<th>Role</th>
				<th>Name</th>
				<th>Salary</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Sender</th>
				<th><?=$sender_details->ename;?></th>
				<th><?=$sender_details->salary;?></th>
			</tr>
			<tr>
				<th>Receiver</th>
				<th><?=$receiver_details->ename;?></th>
				<th><?=$receiver_details->salary;?></th>
			</tr>
		</tbody>
	</table>
	<?php
     /******* transaction begines *****/
     $amount = 1000;
	 $debit = "UPDATE `emp_record` SET `salary` = `salary`- :amount where `id` = :sender_id ";
	 $debit_stmt = $connection->prepare($debit);
	 $credit = "UPDATE `emp_record` SET `salary` = `salary` + :amount where `id` = :receiver_id";
	 $credit_stmt = $connection->prepare($credit);
	 $connection->beginTransaction();
	 $debit_stmt->execute([":amount"=>$amount,":sender_id" => $sender_id]);
	 if(!$debit_stmt->rowCount()){
		 $connection->rollBack();
		 $error[]="Can't Update Sender Salary";
	 }else{
		 //$receiver_id=500000;
		 $credit_stmt->execute([":amount"=>$amount,":receiver_id" => $receiver_id]); 
		 
		 if(!$credit_stmt->rowCount()){
			//$connection->rollBack();
			//var_dump();
			$connection->rollBack()
			$error[]="Can't Update Receiver Salary";
			//var_dump($error);
		 }else{
			 var_dump("Hello");
			 $connection->commit();
		 }
	 }
	 
     /******* transaction begines *****/	
	?>
	<?php
	 $emp_record_details_stmt->execute([":emp_id"=>$sender_id]);
	 $sender_details = $emp_record_details_stmt->fetch(PDO::FETCH_OBJ);

	 
	 $emp_record_details_stmt->execute([":emp_id"=>$receiver_id]);
	 $receiver_details = $emp_record_details_stmt->fetch(PDO::FETCH_OBJ);	
	?>
	<table style="width:100%;max-width:100%;">
		<caption><h3>After Transaction</h3></caption>
		<thead>
			<tr>
				<th>Role</th>
				<th>Name</th>
				<th>Salary</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Sender</th>
				<th><?=$sender_details->ename;?></th>
				<th><?=$sender_details->salary;?></th>
			</tr>
			<tr>
				<th>Receiver</th>
				<th><?=$receiver_details->ename;?></th>
				<th><?=$receiver_details->salary;?></th>
			</tr>
		</tbody>
	</table>
</body>
</html>
 
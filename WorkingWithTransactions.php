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
 var_dump($sender_details);
 
  $emp_record_details_stmt->execute([":emp_id"=>$receiver_id]);
 $receiver_details = $emp_record_details_stmt->fetch(PDO::FETCH_OBJ);
 var_dump($receiver_details);
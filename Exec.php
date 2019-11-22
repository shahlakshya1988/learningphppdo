<?php 
/**
 * exec()-> this is used for insert update and delete
 * 
 */
require_once "db.php";
try{
    //$insert = "INSERT INTO `emp_record` (`id`,`ename`,`ssn`,`dept`,`salary`,`homeaddress`) values (NULL,'Snow Man','125478','Software','875412','Some Toronto Address')";
    $insert = "INSERT INTO `emp_record` (`id`,`ename`,`ssn`,`dept`,`salary`,`homeaddress`) values (NULL,'Snow Man','125478','Software','875412','Some Toronto Address'),(NULL,'Snow Man 1','125478','Software','875412','Some Toronto Address'),(NULL,'Snow Man 2','125478','Software','875412','Some Toronto Address'),(NULL,'Snow Man 3','125478','Software','875412','Some Toronto Address'),(NULL,'Snow Man 4','125478','Software','875412','Some Toronto Address')";
   // $insertUsingQueryMethod = $connection->query($insert);
    $insertUsingExec = $connection->exec($insert);
    echo "<br>insertUsingQueryMethod<br>";
    //var_dump($insertUsingQueryMethod);
    echo "<br>insertUsingExec<br>";
    var_dump($insertUsingExec); // number of rows inserted, affected rows
    var_dump($connection->lastInsertId()); // Id of the last inserted row, for mulitple values don't use this

    $delete = "DELETE FROM `emp_record` where `id` > 996";
    $deleteQuery = $connection->query($delete);
    var_dump($deleteQuery);
    $delete = "DELETE FROM `emp_record` where `id` > 995";
    $deleteQuery = $connection->exec($delete);
    var_dump($deleteQuery);
}catch(Exception $e){
    echo $e->getMessage();
    die();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exec</title>
</head>
<body>
    
</body>
</html>
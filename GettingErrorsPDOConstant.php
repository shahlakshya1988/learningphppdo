<?php
/**
 * PDO::ERRMODE_EXCEPTION -> THIS WILL RAISE AN EXCEPTION,
 * THIS WILL BE CATCHED INTO CATCH BLOCK
 */
require_once "db.php";
try{
    $sql = "SELECT * FROM `emp_recorsd` ";
    $resultSet = $connection->query($sql);
    $result = $resultSet->fetch(PDO::FETCH_OBJ);
    var_dump($result);
}catch(Exception $e){
    echo $e->getMessage();
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Getting SQL Error</title>
</head>
<body>

</body>
</html>

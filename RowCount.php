<?php
/**
 * Calculate the number of rows of data
 */
require_once "db.php";
try{
        $sql = "SELECT * FROM `emp_record`";
        $resultSet = $connection->query($sql);
        $rowCount = $resultSet->rowCount();

        $sql = "SELECT * FROM `emp_record` where `dept` = 'Human Resources'";
        $resultSetHR = $connection->query($sql);
        $rowCountHR = $resultSetHR->rowCount();


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
    <title>Row Count</title>
</head>
<body>
    <p>There are total <strong><?=$rowCount; ?></strong>, employees out of which <strong><?=$rowCountHR;?></strong>, are of Human Resources Department</p>
</body>
</html>

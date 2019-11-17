<?php
/**
 * This will demostrate the use of $connection->query();
 * this will return result set and on result set we can use
 * fetch,fetchAll,fetchColumn,rowCount etc methods
 */

// requiring our connection file
require_once "db.php";
$sql = "SELECT * FROM `emp_record`";
try{
    $result = $connection->query($sql);
    $rowCount = $result->rowCount();
    $resultArray = $result->fetchAll(PDO::FETCH_OBJ);
}catch(Exception $e){

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Executing Simple Query</title>
</head>
<body>
    <table width="100%">
        <caption><?="There are <strong>{$rowCount}</strong>, Employees In Organization";?></caption>
        <thead>
            <tr style="font-weight:bolder;">
                <td>Sr No</td>
                <td>Employee Name</td>
                <td>SSN Number</td>
                <td>Department</td>
                <td>Salary</td>
                <td>Address</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($resultArray as $employee){ ?>
                <tr>
                    <td><?=$employee->id;?></td>
                    <td><?=$employee->ename;?></td>
                    <td><?=$employee->ssn;?></td>
                    <td><?=$employee->dept;?></td>
                    <td><?=$employee->salary;?></td>
                    <td><?=$employee->homeaddress;?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

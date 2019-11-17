<?php
/**
 *fetch();
 *everything will be same;
 *for fetching the row we have to use it on result set
 *it will return single row at a time
 *we have to use while($row = $resultSet->fetch()){ }
 */
require_once "db.php";
try{
    $sql="SELECT * FROM `emp_record`";
    $resultSet = $connection->query($sql);
}catch(Exception $e){
    echo "<br>";
    echo $e->getMessage();
    echo "<br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fetch Method</title>
</head>
<body>
    <?php
    // this will fetch the first row
    $employee = $resultSet->fetch(PDO::FETCH_ASSOC);
    var_dump($employee);
    echo "<br>";

    // this will fetch the second row
    $employee = $resultSet->fetch(PDO::FETCH_NUM);
    var_dump($employee);
    echo "<br>";


        // this will fetch the third row
        $employee = $resultSet->fetch();
        var_dump($employee);
        echo "<br>";
    ?>
    <table width="100%">
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
            <?php while($employee = $resultSet->fetch(PDO::FETCH_OBJ)){ ?>
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

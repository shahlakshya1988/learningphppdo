<?php
/**
 *
 */
require_once "db.php";
try{



    $sql="SELECT * FROM `emp_record` ";
    $resultSet = $connection->query($sql);
    $resultArray = $resultSet->fetchAll(PDO::FETCH_OBJ);

}catch(Exception $e){

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fetch All</title>
</head>
<body>
    <br>
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
    <br>
    <br>
    <table style="width:100%;max-width:100%;">
        <tr>
            <td>Default</td>
            <td>FETCH_OBJ</td>
            <td>FETCH_ASSOC</td>
            <td>Fetch Num</td>
            <td>Fetch Key Pair</td>
        </tr>
        <tr>
            <td valign="top">
                <?php
                    $sql="SELECT * FROM `emp_record` LIMIT 10";
                    $resultSet = $connection->query($sql);
                    $result = $resultSet->fetchAll();
                    echo "<pre>",print_r($result),"</pre><br>";
                ?>
            </td>
            <td valign="top">
                <?php
                $sql="SELECT * FROM `emp_record` LIMIT 10,10";
                $resultSet = $connection->query($sql);
                $result = $resultSet->fetchAll(PDO::FETCH_OBJ);
                echo "<pre>",print_r($result),"</pre><br>";
                ?>
            </td>
            <td valign="top">
                <?php
                $sql="SELECT * FROM `emp_record` LIMIT 20,10";
                $resultSet = $connection->query($sql);
                $result = $resultSet->fetchAll(PDO::FETCH_ASSOC);
                echo "<pre>",print_r($result),"</pre><br>";
                ?>
            </td>
            <td valign="top">
                <?php
                $sql="SELECT * FROM `emp_record` LIMIT 30,10";
                $resultSet = $connection->query($sql);
                $result = $resultSet->fetchAll(PDO::FETCH_NUM);
                echo "<pre>",print_r($result),"</pre><br>";
                ?>
            </td>
            <td valign="top">
                <?php
                $sql="SELECT `id`,`ename` FROM `emp_record` LIMIT 30,10";
                $resultSet = $connection->query($sql);
                $result = $resultSet->fetchAll(PDO::FETCH_KEY_PAIR);
                echo "<pre>",print_r($result),"</pre><br>";
                ?>
                <br>
                <hr>
                <br>
                <?php
                $sql="SELECT `ename`,`salary` FROM `emp_record` LIMIT 40,10";
                $resultSet = $connection->query($sql);
                $result = $resultSet->fetchAll(PDO::FETCH_KEY_PAIR);
                echo "<pre>",print_r($result),"</pre><br>";
                ?>
            </td>
        </tr>
    </table>
</body>
</html>

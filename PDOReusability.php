
<?php 
/**
 * 
 */
require_once "db.php";
try{
    $sql = "SELECT * FROM `emp_record` LIMIT 10";
    $result = $connection->query($sql);
    var_dump($result);
}catch(Exception $e){
    var_dump($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDO Reusability</title>
</head>
<body>
    <table width="100%">
        <caption>Fetching The Result</caption>
        <tr>
            <th>Id</th>
            <th>Employee Name</th>
            <th>SSN</th>
            <th>Department</th>
            <th>Salary</th>
            <th>Home Address</th>
        </tr>
        <?php foreach($result as $emp){ ?>
            <tr>
                <td><?=$emp["id"];?></td>
                <td><?=$emp["ename"]?></td>
                <td><?=$emp["ssn"]?></td>
                <td><?=$emp["dept"]?></td>
                <td><?=$emp["salary"]?></td>
                <td><?=$emp["homeaddress"]?></td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <br>
    <br>
    <?php $result = $connection->query($sql); ?>
    <table width="100%">
        <caption>Fetching For Another Time</caption>
        <tr>
            <th>Id</th>
            <th>Employee Name</th>
            <th>SSN</th>
            <th>Department</th>
            <th>Salary</th>
            <th>Home Address</th>
        </tr>
        <?php foreach($result as $emp){ ?>
            <tr>
                <td><?=$emp["id"];?></td>
                <td><?=$emp["ename"]?></td>
                <td><?=$emp["ssn"]?></td>
                <td><?=$emp["dept"]?></td>
                <td><?=$emp["salary"]?></td>
                <td><?=$emp["homeaddress"]?></td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <br>
    <br>
    <?php
        $result = $connection->query($sql);
        $resultSet = $result->fetchAll(); 
    ?>
    <table width="100%">
        <caption>Using Fetch All</caption>
        <tr>
            <th>Id</th>
            <th>Employee Name</th>
            <th>SSN</th>
            <th>Department</th>
            <th>Salary</th>
            <th>Home Address</th>
        </tr>
        <?php foreach($resultSet as $emp){ ?>
            <tr>
                <td><?=$emp["id"];?></td>
                <td><?=$emp["ename"]?></td>
                <td><?=$emp["ssn"]?></td>
                <td><?=$emp["dept"]?></td>
                <td><?=$emp["salary"]?></td>
                <td><?=$emp["homeaddress"]?></td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <br>
    <br>
    <?php reset($resultSet); ?>
    <table width="100%">
        <caption>Using Reset</caption>
        <tr>
            <th>Id</th>
            <th>Employee Name</th>
            <th>SSN</th>
            <th>Department</th>
            <th>Salary</th>
            <th>Home Address</th>
        </tr>
        <?php foreach($resultSet as $emp){ ?>
            <tr>
                <td><?=$emp["id"];?></td>
                <td><?=$emp["ename"]?></td>
                <td><?=$emp["ssn"]?></td>
                <td><?=$emp["dept"]?></td>
                <td><?=$emp["salary"]?></td>
                <td><?=$emp["homeaddress"]?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
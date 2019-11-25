<?php
require_once "db.php";
$sql = "SELECT * FROM `emp_record`";
$stmt = $connection->prepare($sql);
if(isset($_GET["search"])){
    $ename = "%".trim($_GET["ename"])."%";
    $salary = trim($_GET["salary"]);
    //$ename = $connection->quote($ename);
    //$salary = $connection->quote($salary);
    $sql = "SELECT * FROM `emp_record` where `ename` like :employee_name and `salary` >= :employee_salary";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(":employee_name",$ename,PDO::PARAM_STR);
    $stmt->bindParam(":employee_salary",$salary,PDO::PARAM_INT);

}
try{


    $stmt->execute();
    var_dump($stmt->errorInfo());
    $Execute = $stmt->fetchAll();
    //var_dump($Execute);
    $numberofrows = count($Execute);

}catch(Exception $e){
    echo $e->getMessage();
    die();
}
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SQLInjection</title>
</head>
<body>
<div>
    <form action="" method="GET">
        <fieldset>
            <legend>Search For Employee</legend>
            <div>
                <lable for="name">
                    Name
                </lable>
                <input type="text" name="ename" id="name" placeholder="Name">
            </div>
            <div>
                <lable for="name">
                    Salary Greater Than
                </lable>
                <select name="salary" id="salary">
                    <option value="5000">5000</option>
                    <option value="10000">10000</option>
                    <option value="50000">50000</option>
                </select>
            </div>
            <div>
                <input type="submit" value="search" name="search">
            </div>
        </fieldset>
    </form>
</div>
<div>
    <?php if(isset($Execute)){ ?>
        <table style="width:100%;">
            <thead>
            <tr>
                <th>Id</th>
                <th>Employee Name</th>
                <th>SSN</th>
                <th>Department</th>
                <th>Salary</th>
                <th>Home Address</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($Execute as $employee){ ?>
                <tr>
                    <td><?=$employee["id"]; ?></td>
                    <td><?=$employee["ename"]; ?></td>
                    <td><?=$employee["ssn"]; ?></td>
                    <td><?=$employee["dept"]; ?></td>
                    <td><?=$employee["salary"]; ?></td>
                    <td><?=$employee["homeaddress"]; ?></td>
                </tr>
            <?php } ?>
            <?php if($numberofrows<=0){?>
                <tr>
                    <td colspan="6">Please Search With Other Name Or Salary</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</div>
</body>
</html>
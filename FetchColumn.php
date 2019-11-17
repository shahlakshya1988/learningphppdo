<?php
/**
 * PDO provides the ability to fetch only one column at a time
 * this avoides using additional memory
 */
require_once "db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fetch Column</title>
</head>
<body>
    <table>
        <tr>
            <td>Id</td>
            <td>Ename</td>
            <td>Salary</td>
            <td>Address</td>
        </tr>
        <tr>
            <td>
                <?php
                    try{
                        $sql="SELECT * FROM `emp_record` LIMIT 10";
                        $resultSet = $connection->query($sql);
                        $resultArray=$resultSet->fetchColumn(0);
                        echo "<pre>",print_r($resultArray),"</pre>";
                        $resultArray=$resultSet->fetchColumn(0);
                        echo "<pre>",print_r($resultArray),"</pre>";
                    }catch(Exception $e){

                    }
                ?>
            </td>
            <td>
                <?php
                    try{
                        $sql="SELECT * FROM `emp_record` LIMIT 10";
                        $resultSet = $connection->query($sql);
                        $resultArray=$resultSet->fetchColumn(1);
                        echo "<pre>",print_r($resultArray),"</pre>";
                        $resultArray=$resultSet->fetchColumn(1);
                        echo "<pre>",print_r($resultArray),"</pre>";
                    }catch(Exception $e){

                    }
                ?>
            </td>
            <td>
                <?php
                    try{
                        $sql="SELECT * FROM `emp_record` LIMIT 10";
                        $resultSet = $connection->query($sql);
                        $resultArray=$resultSet->fetchColumn(4);
                        echo "<pre>",print_r($resultArray),"</pre>";
                        $resultArray=$resultSet->fetchColumn(4);
                        echo "<pre>",print_r($resultArray),"</pre>";
                    }catch(Exception $e){

                    }
                ?>
            </td>
            <td>
                <?php
                    try{
                        $sql="SELECT * FROM `emp_record` LIMIT 10";
                        $resultSet = $connection->query($sql);
                        $resultArray=$resultSet->fetchColumn(5);
                        echo "<pre>",print_r($resultArray),"</pre>";
                        $resultArray=$resultSet->fetchColumn(5);
                        echo "<pre>",print_r($resultArray),"</pre>";
                    }catch(Exception $e){

                    }
                ?>
            </td>
        </tr>
    </table>
</body>
</html>

<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectEZ/View/login.php");
    }

    define("t", "../Model/student.json");
    $handle_t = fopen(t, "r");
    $fr1 = fread($handle_t, filesize(t));
    $arr1 = json_decode($fr1);
    $fc1 = fclose($handle_t);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student</title>
    </head>
    <body>
    <?php include($root . '/View/Adminbar.php') ?>
    <fieldset style="width: 50%; height: 450px; overflow: scroll;">
        <legend><b>Students</b></legend>
        <h3 align="center">Students Information</h3>
        <table border="1" align="center">
            <tbody>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Religion</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
                <?php 
                    if ($arr1 === NULL) {
                        echo "<tr>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>"; 
                        echo "</tr>";
                    }
                    else {
                        for ($i = 0; $i < count($arr1); $i++) {
                            echo "<tr>";
                            echo "<td> 10-" . $arr1[$i]->sl . "</td>";
                            echo "<td>" . $arr1[$i]->fname . " " . $arr1[$i]->lname . "</td>";
                            echo "<td>" . $arr1[$i]->gender . "</td>";
                            echo "<td>" . $arr1[$i]->religion . "</td>";
                            echo "<td>" . $arr1[$i]->email . "</td>";
                            echo "<td>" . $arr1[$i]->phone . "</td>";
                            echo "<td>" . $arr1[$i]->username . "</td>";
                            echo "<td>" . "<a href='/ProjectEZ/Controller/DeleteActionStudent.php?sl=" . $arr1[$i]->sl . "'>Delete</a></td></tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
        <a href="/ProjectEZ/View/Registration.php"><p style="text-align: center;">Add a Student</p></a>
    </fieldset>
    <br>
    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>
    </body>
</html>
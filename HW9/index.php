<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Payroll</title>
        <link href="employeeStyle.css" rel="stylesheet" type="text/css" />
    </head>
    <body>







<?php
/**
 * Created by PhpStorm.
 * User: scowley
 * Date: 10/21/2014
 * Time: 5:16 PM
 */

require_once('Employee.php');

$employees = array();

$employees[] = new Employee("Harold Wilson",28.50,6);

$employees[] = new Employee("Carl Walters",42.95);

$employees[] = new Employee("Walter Scott",7.25,2);

$employees[] = new Employee("Carol Knighton",42.95);

$employees[] = new Employee("Andrew Sawyer",28.75,8);

$employees[] = new Employee("Caroline Johnson");

$employees[] = new Employee("Anthony Meyer",2.75,8);

$employees[] = new Employee("Drew Carlson",23,12);

$employees[] = new Employee("Mary Johnson",31.5,-2);

//foreach($employees as $curEmp)jhlkjlkjh

?>

    <form action="index.php" method="post">
        <fieldset>


            <?php
                for($i=0; $i<count($employees); $i++){
                    $empNum = "emp$i";
                    $labNum = "empLab$i";
                    $hrsNum = "hrs$i";
                    $hrsInNum = "hrsIn$i";

                    echo "<div><label for=$$labNum>$employees[$i]</label><input type=text id=$$labNum name=$$hrsNum value=$$hrsInNum></div>";
                }
            ?>
            <div><label for="submitButton"></label><input type="submit" id="submitButton" name="submission" value="Calculate"></div>

            <?php
            if(isset($_POST['submission']))
            for($i=0; $i<count($employees); $i++){
                $empNum = "emp$i";
                $labNum = "empLab$i";
                $hrsNum = "hrs$i";
                $hrsInNum = "hrsIn$i";

                echo "<div>$employees[$i] $hrsInNum computePay($$hrsInNum)</div>";
            }
            ?>

        </fieldset>
    </form>

    </body>
</html>
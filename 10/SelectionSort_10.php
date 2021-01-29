<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>selctionsort</title>
</head>
<body>
<style>
    table,td,<th>{
        border:1px solid black;
        width:33%;
        text-align:center;
    border-collapse:collapse;
    background-color:lightblue;
    }
    table{
        margin:auto;
    }
</style>

<?php
    $servername="localhost";
    $username="root";
    $password="root";
    $dbname="weblab";
    $a=[];

    $con=mysqli_connect($servername,$username,$password,$dbname);

    if($con->connect_error)
        die("CONNECTION FAILED :".$con->connect_error);
    $sql="SELECT * FROM student";

    $result=$con->query($sql);

    echo"<br>";
    echo"<center>BEFORE SORTING</center>";
    echo"<table border='2'>";
    echo"<tr>";
    echo"<th>USN</th><th>NAME</th><th>ADDRESS</th></tr>";
    
    if($result->num_rows>0)
    {
        while($row =$result->fetch_assoc()){
            echo"<tr>";
            echo"<td>".$row["usn"]."</td>";
            echo"<td>".$row["name"]."</td>";
            echo"<td>".$row["address"]."</td></tr>";
            array_push($a,$row["usn"]);
        }
    }
    else
        echo"TABLE IS EMPTY";
    echo"</table>";

    $n=count($a);
    $b=$a;

    for($i=0;$i<($n-1);$i++)
    {
        $pos=$i;
        for($j=$i+1;$j<$n;$j++){
            if($a[$pos]>$a[$j])
                $pos=$j;
        }

        if($pos!=$i){
            $temp=$a[$i];
            $a[$i]=$a[$pos];
            $a[$pos]=$temp;
        }
    }

    $c=[];
    $d=[];
    $result=$con->query($sql);

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            for($i=0;$i<$n;$i++){
                if($row["usn"]==$a[$i]){
                    $c[$i]=$row["name"];
                    $d[$i]=$row["address"];
                }
            }
        }
    }

    echo"<br>";
    echo"<center>AFTER SORTING</center>";
    echo"<table border='2'>";
    echo"<tr>";
    echo"<th>USN</th><th>NAME</th><th>ADDRESS</th></tr>";

    for($i=0;$i<$n;$i++){
        echo"<tr>";
        echo"<td>".$a[$i]."</td>";
        echo"<td>".$c[$i]."</td>";
        echo"<td>".$d[$i]."</td></tr>";

    }
    
    echo"</table>";

    $con->close();

    ?>

</body>
</html>
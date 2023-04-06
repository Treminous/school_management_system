<?php
session_start();



$adm=$_SESSION['adm'];
$query1="SELECT * FROM student WHERE  student_id LIKE '$adm'";

$query2=mysqli_query(connect_to_db(),$query1);

if($query2){

$data=mysqli_fetch_assoc($query2);
print_r("Hi, " .($data['student_fname']));


}


function connect_to_db()
{
 return (mysqli_connect('localhost','root','','academic'));
    
}


?>
<?php

$hostName = "database-2.c5bakqy9pelr.us-east-1.rds.amazonaws.com";
$userName = "root";
$password = "23792009";
// Create connection
$db = mysqli_connect($hostName, $userName, $password,"aws_db_355");
// $link = mysqli_connect("ec2-44-193-79-79.compute-1.amazonaws.com:3306","phpmyadmin","23792009");
// mysqli_select_db($link, "my_db_355");
// Check connection
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$login = $_POST['login'];
$password = $_POST['password'] ;


$errors = array() ;

if( empty($first_name))
{
    array_push($errors , "First name is required" ) ;
}
if( empty($last_name))
{
    array_push($errors , "Last name is required" ) ;
}
if( empty($login))
{
    array_push($errors , "Login is required" ) ;
}
if( empty($password))
{
    array_push($errors , "Password is required" ) ;
}


// Create connection
$query = "Select * from users" ;
$results = mysqli_query($db , $query) ;
if( mysqli_num_rows($results) )
{
    echo "You connected to database and found user:" .$results ;
}
else
{
    echo "Connection to database failed !!!" .$results ;
}
mysqli_close($db);
?>

<?php

//Login users
$hostName = "database-2.c5bakqy9pelr.us-east-1.rds.amazonaws.com";
$userName = "root";
$password = "23792009";
$db =mysqli_connect($hostName, $userName, $password,"aws_db_355") or die("could not connect to database" ) ;


$url_long = $_POST['url_long'];
$url_short = $_POST['url_short'];


$errors = array() ;

if( empty($url_long))
{
    array_push($errors , "Long url does not exist" ) ;
}
if( empty($url_short))
{
    array_push($errors , "Short url has not been generated yet" ) ;
}


if( count($errors) == 0 ) {
    // $password = md5($password);
    $query = "Select * from url where url_long = '$url_long'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results)) {
        echo 'this url already exist';
    } else {
        $query = "Insert into url (url_long,url_short) values ( '$url_long','$url_short' )";
        mysqli_query($db, $query);
        $query = "Select * from url where url_long = '$url_long' ";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results)) {
            $_SESSION['url_id'] = mysqli_fetch_array($results)['url_id'];
            $_SESSION['url_long'] = mysqli_fetch_array($results)['url_long'];
            header("Location: navbar.php");
            echo 'you are now registered and logged in';
            header("Location: navbar.php");
        }

    }
    mysqli_close($db);
}
else{

    mysqli_close($db);
    echo '<div>';
    foreach($errors as $error){
        echo '<p>' . $error . '</p>';
    }
    //   <?php header("Refresh:2; url= index.php");
    echo '</div>';
}

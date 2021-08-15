<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color : grey;
        }
        table{
            border : solid;
        }
    </style>
</head>
<body>
    new page
    <?php

    
    //   $db = mysqli_connect("database-2.c5bakqy9pelr.us-east-1.rds.amazonaws.com","root","23792009","aws_db_355")
    //   if ($db-> connect_error) {
    //     die("Connection Failed:" . $d_b-> connect_error)
    //   }
    //   $sql = "SELECT url_id, url_long, url_short from url";
    //   $result = $db-> query($sql);

    //   if($result-> num_rows > 0) {
        #if atleast one row
    //     while ($row = $result-> fetch_assoc()) {
    //       echo "<tr><td>" . $row["url_id"] ."</td><td>". $row["url_long"] ."</td><td>". $row["url_short"] ."</td></tr>" ;
    //     }
    //     echo "</table>";
    //   }
    //   else{
    //     echo "0 url data found ..."
    //   }
    //   $db-> close();
      //////////////////////////////////////
        
    //Login users
    echo " hi workimg";
    $hostName = "database-2.c5bakqy9pelr.us-east-1.rds.amazonaws.com";
    $userName = "root";
    $password = "23792009";
    $db =mysqli_connect($hostName, $userName, $password,"aws_db_355") or die("could not connect to database" ) ;
    echo " hi workimg2";
    if( count($errors) == 0 ) {
        // $password = md5($password);
        // $query = "Select * from url where url_long = '$url_long'";
        echo " hi workimg3";
        $query = "SELECT url_id, url_long, url_short from url";
        $results = mysqli_query($db, $query);

        ////////////////////
        if($results-> num_rows > 0) {
            echo"<table>";
            echo"
            <tr>
              <th>Id</th>
              <th>LONG URl</th>
              <th>SHORTENED URL</th>
            </tr>";
            #if atleast one row
            while ($row = mysqli_fetch_assoc($results)) {
              echo "<tr><td>" . $row["url_id"] ."</td><td>". $row["url_long"] ."</td><td>". $row["url_short"] ."</td></tr>" ;
            }
            echo "</table>";
          }
    }else{
        echo "error fetching data";
    }
    mysqli_close($db);
      /////////////////////////////////////
    ?> 
    </table>
</body>
</html>

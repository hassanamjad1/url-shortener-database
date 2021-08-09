
<!DOCTYPE html>
<html>
<head>
<title>Page PHP</title>
</head>
<body>

<h1>HI, PHP page</h1>
<p>This is a paragraph.</p>

</body>
</html>

<?php
//Login users

$db = mysqli_connect('mars.cs.qc.cuny.edu' , 'amha2009' , '23792009' , 'amha2009') or die("could not connect to database" ) ;


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

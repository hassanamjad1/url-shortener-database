</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CS 355 Home Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme2.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <style>
     h1{
        padding-top: 20%;
        color: #f9f9f9;
        text-align: center;
     }
     p{
        color: #f9f9f9;
     }
     .space{
       height : 400px;
     }
     .table{
       background-color : lightgrey ;
     }
  </style>
	<link href="https://fonts.googleapis.com/css?family=Allerta Stencil" rel="stylesheet">
</head>
<body>
   <!-- NAVBAR BEGINS HERE-->
   <nav id="navbar">
     <ul>
       <li class="dropdown">
         <a href="navbar.html" class="dropbtn">Home</a>
         <div class ="dropdown-content">
         </div>
       </li>
       <li class="dropdown">
         <a href="#" class="dropbtn">Course</a>
         <div class="dropdown-content">
<!--           <a href="https://www.zybooks.com/" target="_blank">ZyBooks</a>-->
           <a href="https://tophat.com/" target="_blank">TopHat</a>
           <a href="https://tinyurl.com/CSCI355-Summer2021" target="_blank">355 Course Drive</a>
			 <a href="https://tinyurl.com/CSCI323-Summer2021" target="_blank">323 Course Drive</a>
           <a href="https://www.w3schools.com/" target="_blank">W3Schools</a>
         </div>
       </li>
       <li class="dropdown">
         <a href="#" class="dropbtn">About</a>
         <div class="dropdown-content">
           <a href="dev.html">About The Developer</a>
           <a href="contact.html">Contact</a>
         </div>
       </li>
       <li class="dropdown"> <a href="#" class="dropbtn">Search</a>
         <div class="dropdown-content"> 
			 <a href="fromFile.html">From File</a> 
			 <a href="googleAPI.html">Google API</a> 
		 </div>
       </li>
      </ul>
   </nav>
	<br><br><br>
	<div class="h"> TEENY&nbsp TINY &nbsp URL &nbsp SHORTENER </div>
   <!--NAVBAR ENDS HERE-->
   
<!--
   <input type="text" id = "mytext" value="default value">
   <button onclick= document.getElementById("mytext").value="" >clear</button>
   <button onclick= document.getElementById("mytext").value=Math.random() >random</button>
-->
	<div class="main_div">


        <!-- //////////////////////   -->
        <form action = "url_work.php" method = "POST" name = "register" >

            <!-- <input class="form-control" type="text" name="url_long" placeholder="Long url" required> -->
            <!-- <input class="form-control" type="text" name="url_short" placeholder="Short url" required> -->
<!-- ////////////////////////////////new///////////////////////////////////////// -->
            <div class="inner_div" >
                <p class= "samerow">  <i>Enter Url</i> &nbsp&nbsp  </p>
                <input class= "samerow" type="text" name="url_long" id = "urlInput" placeholder="Long url" >
                <!-- <input class="form-control" type="text" name="url_long" placeholder="Long url" required> -->
            </div>
            <br>
            <div style="text-align:center;">
                <button onClick="outputUrl()">Convert </button>
                &nbsp
                <button onClick="clearUrl()">New Url</button>
            </div>
        
            <div class="inner_div">
                <p class= "samerow"> <strong>Output</strong>  &nbsp&nbsp&nbsp&nbsp  </p>
                <input class= "samerow" type="text" name="url_short" id="output_URL" placeholder="Short url"   >
                <button  id="submit" type="submit" name = "signup" onClick="outputUrl()">Validate</button>
                <!-- <input class="form-control" type="text" name="url_short" placeholder="Short url" required> -->
            </div>
<!-- //////////////////////////////////new///////////////////////////////////// -->


            <!-- <input class="form-control" type="text" name="login" placeholder="Login " required>
            <input class="form-control" type="password" name="pwd" id = "password" placeholder="Password" required>
            <input class="form-control" type="password" name="confirmpassword" id = "confirmpassword" placeholder="Confirm Password" onChange = "checkPasswordMatch();" required > -->
            <!-- <div id = "divCheckPasswordMatch" style = "color: white;" ></div> -->
            <div class="form-button">
                <!-- <button id="submit" type="submit" name = "signup" class="ibtn">Register</button> -->
            </div>
        </form>
		<!-- //////////////////////   -->
	
	</div>
  
  <div class = "space" >
  </div>
  <!-- <form action="https://www.google.com/search">
    <input type="text" name = "q" placeholder = "Search">
    <button>Search</button>
  </form> -->
  <div>
  <h1>URL Fetched Data</h1>
  <?php
    $hostName = "database-2.c5bakqy9pelr.us-east-1.rds.amazonaws.com";
    $userName = "root";
    $password = "23792009";
    $db =mysqli_connect($hostName, $userName, $password,"aws_db_355") or die("could not connect to database" ) ;
    if( count($errors) == 0 ) {
        // $password = md5($password);
        // $query = "Select * from url where url_long = '$url_long'";
        
        $query = "SELECT url_id, url_long, url_short from url";
        $results = mysqli_query($db, $query);

        ////////////////////
        if($results-> num_rows > 0) {
            echo"<table border='1' width='1000' cellspacing='0'  >";
            echo"
            <tr>
              <th bgcolor='#fcba03'>Id</th>
              <th bgcolor='#ca03fc'>LONG URl</th>
              <th bgcolor='#8d05e8'>SHORTENED URL</th>
            </tr>";
            #if atleast one row
            while ($row = mysqli_fetch_assoc($results)) {
              echo 
              "<tr>
              <td bgcolor='#fcba03'>" . $row["url_id"] ."</td>
              <td bgcolor='#ca03fc'>". $row["url_long"] ."</td>
              <td bgcolor='#8d05e8'>". $row["url_short"] ."</td>
              </tr>" ;
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
  </div>

	
	<script>
		function getRandomAscii(){
		  var randNum;
		  var valid = true;
		  while(valid){
			randNum = Math.floor(Math.random()*128)
			if( inRange(randNum)){
			  return String.fromCharCode(randNum);
			  valid = false;

			}

		  }
		}
		
		function inRange(num){
		  if((num>=48&&num<=57)||(num>=65&&num<=90)||(num>=97&&num<=122)){
			return true;
		  }else{
				  return false ;
		  }
		}
		
		function outputUrl(){
			var n = 8;
			var outputStr = [];
			var output = document.getElementById("output_URL")
			for(var i = 1; i <= n ; i++){
				outputStr.push(getRandomAscii()) ;
			}
			// output.value = "tiny.com/"+outputStr.join("");
      output.value = "tiny.com";
		}



		function clearUrl(){
			var input = document.getElementById("output_URL")
			input.value = "";
		}
	
	</script>
  
</body>
</html>
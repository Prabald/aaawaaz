<?php
session_start();
 // database connection
      include("config.php");

  if( isset( $_SESSION['email'] ) && isset($_SESSION['id']) ) {
 
                       $Session_id = $_SESSION['id'];
                       
                       $email = $_SESSION['email'];

                       $first_query =  mysqli_query($connect, "SELECT first_name FROM users WHERE email='$email' LIMIT 1");
                       $second_query =  mysqli_query($connect, "SELECT last_name FROM users WHERE email='$email' LIMIT 1");
                      
                      while ($row = mysqli_fetch_array($first_query)) {
                 $firstname = $row['first_name'];
                                                }

                                                   while ($row = mysqli_fetch_array($second_query)) {
                 $lastname = $row['last_name'];
                                                }

                       
                /* $url = "http://postalpincode.in/api/pincode";
                 $pincode =  mysqli_query($connect, "SELECT pin FROM users WHERE email='$email' LIMIT 1");
                 
                  while ($row = mysqli_fetch_array($pincode)) {
                 $pincode = $row['pin'];
                                                }
                $url = $url."/".$pincode;
                 $location = file_get_contents($url);
                  $location = json_decode($location,true);
                  $location = json_encode($location, true);
                print_r($location);
                       */

                   if (@$_GET['AlreadyLogged'] == 'yes') {
                      
                     

                     echo "<center><p class='alert alert-info' id='notice'>You are already logged In.  <a href='logout.php'>Logout First</a></p></center>";
                    
                   	
   }




  }


 
  



else {
                
             header("location: login.php?knowst=loginfirst&submit=Submit+Query");



}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome || Dashboard</title>

	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <!-- Bootstrap & other CSS files -->

   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/animate.css">
   <link rel="stylesheet" type="text/css" href="css/aos.css">
   <link rel="stylesheet" type="text/css" href="css/jquery.css">
   <link rel="stylesheet" type="text/css" href="css/custom.css">

</head>
<body>
<!-- this is header -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img src="images/navMonk.png" style="width: 60px; height: 60px;">
 
 <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" style="padding-right: 200px;" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  <div class="collapse navbar-collapse" style="padding-left:160px;" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-right" style="font-size:18px;" href="App_main.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="font-size:18px;" href="faq.php">FAQ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="font-size:18px;" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" style="font-size:18px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <img src="images/user.svg">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" style="font-size:13px;" href="#"><?php echo   $firstname." ".$lastname; ?></a>
          <a class="dropdown-item" style="font-size:13px;" href="#">session id <?php echo $Session_id; ?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" style="font-size:13px;" href="logout.php">  Logout</a>
        </div>
      </li>  
    </ul>
   
  </div>
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2"> 
    </div>
    <div class="col-md-8">
      <!-- Faq start -->
      <h1>About Aawaaj</h1> <br>
     
    <h6> In this progressive world we need to align up ourselves with ideas full of innovation and creativity.But what actually happens is while sharing our ideas with the Authorities the communication system,is somewhat weak for letting us to convey those precisely.People often share their problems on social media platforms but between that clumpsy information, the relevance of genuine information gets compromised .What then happens is that neither the authority gets to know about the problems nor we do get to know what their contributions are.This miscommunication often leads to drastic misconceptions between the Authority and the people they serve.This causes rumors and enstrangement among the community.
      <br><br>

    Aawaaz is a Social platform for defining the genuine aspects of the society which normally do not get highlighted to the community.Here everyone will be free to raise a concern about a particular problem and it will be made sure that every problem is genuinely sorted, to let the Authorities know the relevant problems.And to let know what problems are correctly solved the people will be free to rate and review their works.What this will provide is that, people will get to know about,how frequently,and with,how much proficiency,an authority plays it's role, in accordance with the words they promise.This will highlight, the best results on the portal, where nothing will be HIDDEN, nothing will be FAKE, and people will let know,the TRUEST ASPECTS of the society.
<br><br>
Aawaaz offers complete transparency,which will help in decreasing Corruption, avoiding unnecessary waste of Economical Finance and truly decoratinge the prestige of The Incredible INDIA!
</h6>
      <!-- Faq end -->
    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>



 <!-- Required Javascript Files -->

 <script type="text/javascript" src="js/aos.js"></script>
 <script type="text/javascript" src="js/jquery.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>

   
<script>
//This script is a extra of AOS 
      AOS.init({
        easing: 'ease-out-back',
        duration: 1000
      });
    </script>
</html>
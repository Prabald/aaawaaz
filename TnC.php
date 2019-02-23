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
          <a class="dropdown-item" style="font-size:10px;" href="tnc.php">Terms And Conditions</a>
          <a class="dropdown-item" style="font-size:10px;" href="privacypolicy.php">Privacy Policy</a>
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
      <h1>TERMS AND CONDITIONS</h1> <br>
      <h6>
     
   <b>  1. Your Access to the Services</b>
<br><br>
Children under the age of 13 are not allowed to create an account or otherwise use the Services. On the Contrary with Parental Guidance they can approach us.
<br>In addition, certain of our Services or portions of our Services require you to be older than 13 years of age, so please read all notices and any Additional Terms carefully when you access the Services. 
<br><br>
<b>2. Your Use of the Services</b>
<br><br>
Aawaz grants you a personal and non-transferable limited license to use and access the Services solely as permitted by these Terms. We reserve all rights not expressly granted to you by these Terms.
<br>
Except as permitted through the Services or as otherwise permitted by us in writing, your license does not include the right to:
<br><br>
• license, sell, transfer, assign, distribute, host, or otherwise   commercially exploit the Services or Content.
<br>
• modify, prepare derivative works of, disassemble, any part of the   Services or Content.
<br><br>
We reserve the right to modify, suspend, or discontinue the Services (in whole or in part) at any time, with or without notice to you. Any future release, update, or other addition to functionality of the Services will be subject to these Terms, which may be updated from time to time. You agree that we will not be liable to you or to any third party for any modification, suspension, or discontinuation of the Services or any part thereof.
<br><br>
<b>3. Your Aawaz Account and Account Security</b>
<br><br>
To use certain features of our Services, you may be required to create an Aawaz account and provide us with a username, password, and certain other information about yourself.
<br>
You are solely responsible for the information associated with Your Account and anything that happens related to Your Account. You must maintain the security of your Account. We recommend that you use a strong password that is used only with the Services.
You will not license, sell, or transfer your Account without our prior written approval.
<br><br>
<b>4. Your Content</b>
<br><br>
The Services may contain information, text, links, graphics, photos, videos, or other materials including Content created with or submitted to the Services by you or through your Account. We will have every right to declare your Query as redundant if any information is found Incomplete ,False or unwanted.
<br>
Any ideas, suggestions, and feedback about Aawaz or our Services that you provide to us are entirely voluntary, and you agree that Aawaz may use such ideas, suggestions, and feedback without compensation or obligation to you.
<br><br>
<b>5. Fake, Viral but unverified and Redundancy of Issues</b>
<br><br>
Aawaz respects the intellectual property of others and requires that users of our Services do the same. We have a policy that includes the removal of any Fake or Redundant materials from the Services and for the termination, in appropriate circumstances, of users of our Services who are repeat offenders. If you believe that anything on our Services is abnormal, you may notify Aawaz by contacting us.

</h6>
      <!-- Faq end -->
    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>


 <center> <p class="mt-5 mb-3 text-muted">&copy; ProxyChains</p></center>

   
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
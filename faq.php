<?php
session_start();
 // database connection
      include("config.php");

  if( isset( $_SESSION['email'] ) && isset($_SESSION['id']) ) {
 
                       $Session_id = $_SESSION['id'];
                       @$Isadmin = $_SESSION['admin'];
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
        <a class="nav-link" style="font-size:18px;" href="App_main.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" style="font-size:18px;" href="faq.php">FAQ</a>
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
      <h1>Frequently Asked Questions : </h1> <br>
     <h5><p><b> 1.Why would any Authority peek into for looking up any content in Aawaz which is not so prerequisite platform?</h5></b><br>

In this speedy world everyone is craving to be a bigger Public figure and no one will ever lose even a single chance to show up their contributions to the world.What Aawaz does is that after posting a concern on a particular topic ,when someone comes out with a solution with it and claims to solve that problem, People are free to review that approach to bring  awareness to everyone about what actually is happening around them.And to achieve a highlighted designation anyone will make a stand for it.<br><br>

<h5><b>2.What defines that a particular query is genuine or not?<br></b></h5><br>

Aawaz ,our Title itself defines that it is Sound of The People,so everyone is free to raise up a query.But whenever a concern is raised at Aawaz, it initialy comes to highlights for the locales from the location of where the concern was raised.People will then review the relevancy and genuinity of the problem and the problem which will be reviewed most severe and genuine by the locales will come to the highlights to make sure that the relevancy is maintained.To be more transparent as well as secure Aawaz, punishes every fake individual.
<br>

</p>
      <!-- Faq end -->
    </div>
    <div class="col-md-2">
    </div>
  </div>
</div>




   
<script>
//This script is a extra of AOS 
      AOS.init({
        easing: 'ease-out-back',
        duration: 1000
      });
    </script>
</html>
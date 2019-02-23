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
      <h2>AAWAZ PRIVACY POLICY </h2> <br>
    
<h6>
We want you to understand how and why Aawaz collects, uses, and shares information about you when you use our services or when you otherwise interact with us or receive a communication from us.</h6><br> 
<h3>We collect the following:</h3>
<br>
<h6>
<b>INFORMATION YOU PROVIDE US</b>
<br><br>
We collect information you provide to us directly when you use the Services. This includes:
<br><br>
Account information :  To create an account, you must provide a username and password. Your username is public, and it doesn’t have to be related to your real name. You must also provide an email address. We also store your user account preferences and settings.
<br><br>
Content you submit :  We collect the content you submit to the Services. This includes your posts , reviews, comments , reports and other communications with moderators and with us. Your content may include text, links, images, gifs, and videos.
<br><br>
Actions you take :  We collect information about the actions you take when using the Services. This includes your interactions with content, like voting, saving, hiding, and reporting. We collect your interactions with communities, like your subscriptions.
<br><br>
<b>HOW WE USE INFORMATION ABOUT YOU</b>
<br><br>
We use information about you to:
• Provide, maintain, and improve the Services;
• Research and develop new services;
• Help protect the safety of Aawaz and our users, which includes blocking suspected spammers, addressing   abuse, and enforcing the Aawaz user agreement and our other policies;
• Send you technical notices, updates, security alerts, invoices and other support and administrative   messages;
• Provide customer service;
<br><br>
<b>HOW INFORMATION ABOUT YOU IS SHARED</b>
<br><br>
When you use the Services, certain information may be shared with other users and the public. For example:
• When you submit content (such as a post or comment or public chat) to the Services, any visitors to and users of our Services will be able to see that content, the username associated with the content, and the date and time you originally submitted the content. 
<br>
• When other users view your profile, they will be able to see information about your activities on the Services, such as your username, prior posts and comments, Your Contributions, Rating, and how long you have been a member of the Services. 
Please note that, even when you delete your account, the posts, comments and messages you submit through the Services may still be viewable or available on our servers. 
<br>
Otherwise, we do not share, sell, or give away your personal information to third parties unless one of the following circumstances applies:
<br>
• To comply with the law.  We may share information in response to a request for information if we believe disclosure is in accordance with, or required by, any applicable law, regulation, legal process or governmental request, including, but not limited to, meeting national security or law enforcement requirements. To the extent the law allows it, we will attempt to provide you with prior notice before disclosing your information in response to such a request. 
<br>
• In an emergency.  We may share information if we believe it's necessary to prevent imminent and serious bodily harm to a person.
<br>
• To enforce our policies and rights.  We may share information if we believe your actions are inconsistent with our user agreements, rules, or other Aawaz policies, or to protect the rights, property, and safety of ourselves and others.
<br>
• With our affiliates.  We may share information between and among Aawaz, and any of our parents, affiliates, subsidiaries, and other companies under common control and ownership.
<br>
• With your consent.  We may share information about you with your consent or at your direction.
<br><br>
<b>YOUR CHOICES</b>
<br><br>
As an Aawaz user, you have choices about how to protect and limit the collection, use, and disclosure of information about you.
Accessing and Changing Your Information
You can access and change certain information through the Services. 
<br><br>
<b>CONTACT US</b>
<br><br>
If you have any questions about this Privacy Policy, please contact us at contact@Aawaz.com 
</h6>
<br>

</p>
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
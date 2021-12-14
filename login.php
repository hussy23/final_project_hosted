<!-
Code Initiator - Hussain Moulana
Begin Date - Sept 21 - 2021
>

<?php include('database.php') ?>

<!DOCTYPE php>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width =device-width, initial-scale=1">
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title> DC vs MARVEL - Login </title>
<style>
  body{
	margin: 0 auto;
	background-image: url("images/PAGE 1.jpg");
	background-repeat: no-repeat;
	background-size: 100% 890px;
      }
</style>

</head>
<body>
 
    <div class="header">
    <a class="logo" href="index.php"> <img src="images/logo.jpg">  </a>  
            <nav class="header-left">
                <a  href="index.php" >Home</a>
                
                <div class="dropdown">
                    <a href="comics.php"> comics </a> <button class="dropbtn"> 
                        <i class="fa fa-caret-down"></i></button>
                
                    <div class="dropdown-options">
                      <a href="MARVEL.php" > MARVEL </a>
                      <a href="DC.php" > DC</a>
                      <a href="comicsoffer.php" > Offers</a>
                    </div> 
                    </div>
               
               <a href="contact.php">Contact</a>
               <a href="aboutus.php" > About us </a>
               <a href="feedback.php" >Feedback</a> 
                   
             </nav>
             <div class="search-right">
                <form class="search" method="POST" action="search.php" style=" margin:auto">
                    <input type="text" placeholder="Whats on your mind?? " name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                
                </form>
                 
             </div>
             
        <div class="cart-right">
            <a href="cart.php" >
             <span class="fa fa-shopping-cart"></span> Your Cart
            </a>
        </div>
        <nav class="header-right">
            <a href="reg.php" > Sign Up </a>
            <a class="active" href="login.php" > Login </a>             
            </nav>
    </div>

<style>
h1{
     color: mediumvioletred;  
      font-family: cursive;
    font-size: 30px;
    text-align:center;
  }
      
.login{
       padding-left: 100px;
       padding-right:100px;
       width: 450px;
       height: 500px;
       text-align:left;
       margin: 0 auto;
       background-color: grey ;
       margin-top: 40px;
}

.login img{
	width: 100px;
	height: 100px;
	margin-top:40px;
       display: block;
        margin-left: auto;
        margin-right: auto;
}

.loginbtn {
  background-color: white;
  color: black;
  padding: 5px 5px;
  margin: 10px 0;
  border-radius: 4px;
  cursor: pointer;
  width: 40%;
  font-size:15px;
}

.loginbtn:hover{
    background-color:lightsalmon ;
    
}

  input[type=text], input[type=password], input[type=email] {
  width: 110%;
  padding: 10px;
  opacity :0.7;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
}

input[type=text]:focus, input[type=password]:focus, input [type=email]:focus {
  background-color: lightgray;
  outline: none;
}


</style>
</head>
    <body>
      
       <div class="login">
           <img src="images/LOGIN.png"> 
           <h1> LOGIN </h1>
           <p style="text-align:center; font-weight:bold"><em>Don't have an account?<br> Click <a href="reg.php"> SignUp </a> </em> </p>
            <form action="login.php" method="POST">
                <?php include('errors.php'); ?>
                <div class="logdetail">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <b>Username </b> <input type="text" name="username" placeholder="Enter username" required >
                    <b>Password </b> <input type="password" name="password" placeholder="Enter password" required>
           
                     <button type="submit" class="loginbtn" value ="login" name="login_user">  Login </button> 
                     <i class="fa fa-question-circle" aria-hidden="true">  <a href="fp.php" > Forgot Username/Password </a></i>
                
                 </div>
            </form>
       </div>

  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/614a223925797d7a890022a1/1fg4pbckd';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
    
          
</php>
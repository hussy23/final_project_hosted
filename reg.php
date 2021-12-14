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
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="incdec.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title> DC vs MARVEL - SignUp </title>
<style>
    
body {
  background-image: url("images/SIGNUP.jpg");
  background-size: 100% 1300px;
}

h1{
    text-align:center;
    font-family: cursive;
    font-size: 35px;
    margin-bottom:4px;
}

.register {
  padding-left: 100px;
  padding-right:100px;
  background-color: WHITE;
  width: 670px;
  height: 1000px;
  text-align:left;
  margin: 0 auto;
 margin-top: 40px;
 margin-bottom:40px;

  
}

input[type=text], input[type=password], input[type=email] {
  width: 100%;
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
hr {
  border: 2px solid #f1f1f1;
  margin-bottom: 15px;
}

.registerbtn {
  background-color: royalblue;
  color: white;
  padding: 10px 5px;
  margin: 10px 0;
  border: none;
  cursor: pointer;
  width: 40%;
  font-size:15px;
}

.registerbtn:hover{
    background-color:darkslateblue;
    color:black;
}

a {
  color: darkblue;
}

.signup {
  background-color: #f1f1f1;
  text-align: center;
  opacity:0.7;
  padding-top:5px;
  padding-bottom:5px;
  font-weight:bold;
}

 @media screen and (max-width: 700px) {
  .padding{   
     float: none;
    display: block;
    text-align: left;
  }
</style>
</head>
<body>
    <div class="header">
    <a class="logo" href="index.php"> <img src="images/logo.jpg">  </a>
  
            <nav class="header-left">
                <a href="index.php" >Home</a>
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
  
             <nav class="header-right">
            <a class="active" href="reg.php" > Sign Up </a>
            <a href="login.php" > Login </a>             
            </nav>
    </div>
   
        
    <form name="form" action="reg.php" method="POST" onsubmit="return validate()">
      <div class="padding">
          <div class="register" >
               <?php include('errors.php'); ?>
             <h1><u>Sign Up</u> </h1>
             <p style="text-align:center; font-weight:bold">Please fill in this form to register your DC vs MARVEL account.
                 <div class="signup">
                     <em>Already have an account? Click <a href="login.php"> Login </a> </em>
                 </div>
        <hr>
        <b>Create Username </b>
        <input type="text" name="username" value="<?php echo $username; ?>" required>
        
            <b>First Name</b>
            <input type="text" name="fname" value="<?php echo $fname; ?>" required>
            
             <b>Last Name</b>
            <input type="text" name="lname" value="<?php echo $lname; ?>" required>
            
            <b>Email</b>
           <input type="email" name="email" value="<?php echo $email; ?>" required>
            

            <b>Password</b>
            <input type="password" placeholder="Enter Password" name="password_1" id="psw" required>

            <b>Re-Enter Password</b>
            <input type="password" placeholder="Confirm Password" name="password_2" id="cpsw" required>
            
        <hr>
               

            <button type="submit" class="registerbtn" value ="submit" name="reg_user">Register</button>
        
         
  </div>
  </div>
</form>
     <script>
     var password = document.getElementById("psw")
  , confirm_password = document.getElementById("cpsw");

        function validatePassword(){
             if(password.value !== confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
        </script>
</body>    
</php>

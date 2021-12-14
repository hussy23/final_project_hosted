<!-
Code Initiator - Hussain Moulana
Begin Date - Sept 29 - 2021
>

<?php
 include('database.php'); 
 ?>
<php>
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>DC vs MARVEL-Update Profile</title>
    </head>
    <style>
    
body {
 
  background-image: url("images/editprof.jpg");
  
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
  background-color: #WHITE;
  width: 670px;
  height: 770px;
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
</style>

</head>
<body>  
    
     <div class="padding">
       <form name="form" action="updateprofile.php" method="POST" onsubmit="return validate()">
         <div class="register" >
            <h1><u>UPDATE PROFILE</u> </h1>
                 <hr>
                          <?php $_SESSION['username']; 
                                if (isset($_POST['update'])) {
                                 $username = ($_SESSION['username']);
                                 $query = "UPDATE * from customers SET fname='$fname', lname='$lname' WHERE username=$username";

                            if ($db->query($query) === TRUE) {
                               echo '<script> alert ("YOUR ACCOUNT IS UPDATED"); window.location="index.php"; </script>';
                               } 
                               else
                           { echo "Error UPDATING record: " . $db->error;
                            }
                        }    
                        ?>
           
            <b>Username</b>
            <input type="text" name="username" value="<?php echo $_SESSION['username'];?>">
                                
            <b>First Name</b>
            <input type="text" name="fname">
      
            <b>Last Name</b>
            <input type="text" name="lname" >

            <b>Password</b>
            <input type="password" placeholder="Enter Password" name="oldpassword" id="opsw" >
             
            <b> New Password</b>
            <input type="password" placeholder="Enter New Password" name="password" id="psw" >


            <b>Re-Enter New Password</b>
            <input type="password" placeholder="Confirm Password" name="pswrd-confirm" id="cpsw">
            
        <hr>
             <p>ARE YOU SURE YOU WANT TO UPDATE??  </p>

            <button type="submit" class="registerbtn" value ="update" name="update" >UPDATE</button>
        </div>
            
</form>
       
           
     </div>
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

</php>


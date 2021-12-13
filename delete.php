<!-
Code Initiator - Hussain Moulana
Begin Date - Sept 29 - 2021
>

<?php include('database.php')

 ?>
<!DOCTYPE html>

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
	background-image: url("images/updateprofile.jpg");
	background-repeat: no-repeat;
	background-size: 100% 1000px;
      }
      
h1{
     color: red;  
     font-family: cursive;
    font-size: 30px;
    text-align:center;
  }
      
.delete{
       padding-left: 100px;
       padding-right:100px;
       width: 500px;
       height: 400px;
       text-align:center;
       margin: 0 auto;
       background-color: hsla(0, 9%, 96%, 0.74);
       margin-top: 110px;
       border-radius:40px;
       font-family: monospace;
       font-size:20px;
}

.delete img{
	width: 100px;
	height: 100px;
	margin-top:20px;
       display: block;
        margin-left: auto;
        margin-right: auto;
}

.delbtn {
  background-color: white;
  color: black;
  padding: 5px 5px;
  margin: 10px 0;
  border-radius: 4px;
  cursor: pointer;
  width: 40%;
  font-size:15px;
  font-family: monospace;
}
.cancelbtn {
  background-color: white;
  color: black;
  padding: 5px 5px;
  margin: 10px 0;
  border-radius: 4px;
  cursor: pointer;
  width: 40%;
  font-size:15px;
  font-family: monospace;
}
.cancelbtn:hover{
    background-color:red ;
    
}
.delbtn:hover{
    background-color:red ;
    
}



</style>
</head>
    <body>
      
       <div class="delete">
           <br>
           <img src="images/LOGIN.png"> 
           <h1> DELETE ACCOUNT </h1>
          
            <form action="delete.php" method="POST">
               
                    <div class="logdetail">
                       <?php  if (isset($_SESSION['username'])) : ?>
                           <strong><?php echo $_SESSION['username']; 
                                if (isset($_POST['del_user'])) {
                                 $username = ($_SESSION['username']);
                                 $query = "DELETE from customers WHERE username='$username'";

                            if ($db->query($query) === TRUE) {
                               echo '<script> alert ("YOUR ACCOUNT IS DELETED"); window.location="index.php"; </script>';
                               } 
                               else
                           { echo "Error deleting record: " . $db->error;
                            }
                        }    
                        ?><br> Do You Wish To Delete Your Account?? </strong> <br><br>
              
                     <button type="submit" class="delbtn" value ="delete" name="del_user">  YES </button> 
                     <button type="submit" class="cancelbtn" value ="cancel" > <a href='account.php'> NO </a> </button> 
                
                 </div>
            </form>
            <?php endif ?>
       </div>
    </body>
    
          
</html>
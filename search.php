<!-
Code Initiator - Hussain Moulana
Begin Date - Sept 28 - 2021
>

<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
?>
<?php

if(isset($_POST['search']))
{
    $search = $_POST['search'];
    $query = "SELECT * FROM `comics` WHERE CONCAT( `name`, `description`) LIKE '%".$search."%'";
    $search_result = filter($query);   
}
else {
    $query = "SELECT * FROM `comics`";
    $search_result = filter($query);
}

function filter($query)
{
    $connect = mysqli_connect("us-cdbr-east-04.cleardb.com", "b8f5fe66220704", "5b7f8b7c", "heroku_611d7b294f31a80");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<php>
<HEAD>
    <meta charset="UTF-8">
    <meta name="viewport" content="width =device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<TITLE>Search Products</TITLE>

</HEAD>
<BODY>
    <div class="header">
    <a class="logo" href="index.php"> <img src="images/logo.jpg">  </a>
  
            <nav class="header-left">
                <a  href="index.php">Home</a>
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
                    <a href="aboutus.php"> About us </a>
                    <a href="feedback.php">Feedback</a>  
                   
             </nav>
        <div class="search-right">
                <form class="search" method="POST" action="search.php" style=" margin:auto">
                    <input type="text" placeholder="Whats on your mind??" name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                 
        </div>
            
             
        <div class="cart-right">
            <a href="cart.php" >
          <span class="fa fa-shopping-cart"></span> Cart
           </a>
       </div>
       <nav class="header-right">
            <a href="reg.php"> Sign Up </a>
            <a href="login.php"> Login </a>             
            </nav>
    </div>

<div class="comics">YOUR SEARCH REVEALED THE FOLLOWING COMICS! </div>

 <div id="product-grid">
     
  <?php while($row = mysqli_fetch_array($search_result)):?>
     
        <div class="comics-item">
			<form method="post" action="cart.php?action=add&code=<?php echo $row["code"]; ?>">
                        <form method="post" action="account.php?action=add&code=<?php echo $row["code"]; ?>">
			<div class="product-image"><img src="<?php echo  $row["image"]; ?>"></div>
			<div class="product-tile-footer">
                        
			<div class="product-title"><?php echo  $row["name"]; ?></div>
                        
			<div class="product-price"><?php echo "LKR ". $row["price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                        <input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
        </div>
                 <?php endwhile;?>  
      </div>                
    

   <div class="footer">
        <div class="footer-left">
                
        <a href="https://www.google.com/maps/d/edit?mid=1HqXfCxWrmokna6IfjvKOA2PTFogndeJ1&usp=sharing" target="_blank"><i class="fa fa-map-marker" style=" font-size:15px"> </i> No. 7 Ridgewayplace, Colombo 04 <br> </a>
            <i class="fa fa-phone-square" style=" font-size:15px"> </i> 011-123-1234 <br> 
            <i class="fa fa-mobile" style="font-size:20px"></i> 0771234567 <br>
            <i class="fa fa-envelope" style=" font-size:15px"> </i> dc.vs.marvel000@gmail.com
        </div>
        
        <div class="footer-center">
           <a href="https://www.facebook.com/TheMarvelvsDc/" target="_blank"><i class="fa fa-facebook-official" style="color:blue; font-size:40px"></i></a> 
           <a href="https://www.instagram.com/themarvelvsdc/?hl=en" target="_blank"> <i class="fa fa-instagram" style="color:magenta; font-size:40px"></i> </a> 
           <a href="https://twitter.com/TheMarvelvsDC?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank"><i class="fa fa-twitter-square" style="color:#00acee; font-size:40px" ></i> </a>  
                <br>
             </a>  <br>
             &copy;2021-2025 copyright by DC vs MARVEL<br>
             all rights reserved.<br>
                Designed by Hussain Moulana!  
        </div>
        
        <div class="footer-right">
            
            <H6> PAYMENT METHODS </H6>
            <a href="https://www.visa.com.lk/pay-with-visa/contactless-payments/contactless-payments.html" target="_blank"> <i class="fa fa-cc-visa" style=" font-size:50px; color:navy;"></i></a>
            <a href="https://src.mastercard.com/profile/enroll" target="_blank"><i class="fa fa-cc-mastercard"  style=" font-size:50px; color:red"></i></a>
            <a href="https://www.paypal.com/lk/webapps/mpp/pay-online" target="_blank"> <i class="fa fa-cc-paypal"  style=" font-size:50px; color:darkslateblue"></i></a> <br> <br>
            <i class="fa fa-motorcycle" style=" font-size:20px"> Free Delivery Island-wide!</i> <br>
           
        </div>
        
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

</BODY>
</php>
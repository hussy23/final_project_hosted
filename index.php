<!-
Code Initiator - Hussain Moulana
Begin Date - Sept 21 - 2021
>


<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
?>
<!DOCTYPE php>
<php>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width =device-width, initial-scale=1">
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="incdec.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title> DC vs MARVEL </title>
<link href="images/favicon.ico" rel="icon" type="image/x-icon"/>
<style>
     body {
         background-image: url("images/MAIN PAGE.jpg");
	     background-size: 100% 1400px;
         
        } 
        h4 {
            text-align:center;
            font-size:30px;
            font-weight:bold; 
            background-color: BLACK;
            opacity:0.9;
            background-size:cover;
            color:white;
        }
        
        .fade img {
            width: 100%;
            height: 325px;
       }
       
      
       .FP {
            text-align:center;
            font-size:30px;
            font-weight:bold; 
             background-color: hsla(0, 9%, 96%, 0.74);
            overflow: hidden;
            border-style: solid;
            opacity:0.9;
            background-size:cover;
            margin:5px;
            margin-bottom:8px;
       }
             
</style>


</head>
<body>
 
    <div class="header">
        <a class="logo" href="index.php"> <img src="images/logo.jpg">  </a>
  
            <nav class="header-left">
                <a class="active" href="index.php">Home</a>
                
                    <div class="dropdown">
                         <button class="dropbtn"> comics
                                <i class="fa fa-caret-down"></i>
                         </button>
                
                    <div class="dropdown-options">
                      <a href="MARVEL.php"> MARVEL </a>
                      <a href="DC.php"> DC</a>
                      <a href="comicsoffer.php"> Offers</a>
                    </div> 
                    </div>
               
               <a href="contact.php">Contact</a>
               <a href="aboutus.php" > About us </a>
               <a href="feedback.php">Feedback</a>  
                   
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
        <a href="reg.php"> Sign Up </a>
        <a href="login.php"> Login</a>
        </nav>
             
    </div>

  
  
<div class="slideshow">
    <h4>Special Offers and Discounts!</h4>
        <div class="fade">
            <img src="images/DISCOUNTS.jpg">
        </div> 
        
        <div class="fade">
            <img src="images/SLIDESHOW1.PNG" >
        </div>
    
        <div class="fade">
            <img src="images/SLIDESHOW2.PNG">
        </div>
    
        <div class="fade">
            <img src="images/SLIDESHOW3.PNG" >
        </div>
    
        <div class="fade">
            <img src="images/FREE DELIVERY.jpg" >
        </div>
    
         


<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a> 

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
</div>

</div>
<br>



<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("fade");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

<h3 class="FP">FEATURED COMICS</h3>
    
 
<div id="product-grid">
	
            <?php
            $product_array = $db_handle->runQuery("SELECT * FROM featurecomics ORDER BY id ASC");
            if (!empty($product_array)) { 
                    foreach($product_array as $key=>$value){
            ?>
		<div class="product-item">
			<form method="post" action="cart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>" >
                        <form method="post" action="account.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div> 
                        <div class="product-desc"><?php echo $product_array[$key]["description"]; ?></div> 
			<div class="product-price"><?php echo "LKR ".$product_array[$key]["price"]; ?></div>
			<div class="cart-action">
                             <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value"></div>
                             <input type="number" class="product-quantity" name="quantity" value="1" size="2" />
                             <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value"></div>
<script>      
function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number').value = value;
}
function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number').value = value;
}
</script>
                        </div>
                          <input type="submit" value="Add to Cart" class="btnAddAction" />
			</div>
			</form>

		</div>
	<?php
		}
	}
	?>
</div>

  
    <div class="footer">
        <div class="footer-left">
                
            <a href="https://www.google.com/maps/d/edit?mid=1HqXfCxWrmokna6IfjvKOA2PTFogndeJ1&usp=sharing" target="_blank"><i class="fa fa-map-marker" style=" font-size:15px"> </i> No. 7 Ridgewayplace, Colombo 04 <br> </a>
            <i class="fa fa-phone-square" style=" font-size:15px"> </i> 011-123-1234 <br>
            <i class="fa fa-mobile" style="font-size:20px"></i> 0771234567 <br>
            <a href="mailto:dc.vs.marvel000@gmail.com" target="_blank">  <i class="fa fa-envelope" style=" font-size:15px"></i> dc.vs.marvel000@gmail.com  </a> 
        </div>
        
        <div class="footer-center">
            <a href="https://www.facebook.com/TheMarvelvsDc/" target="_blank"><i class="fa fa-facebook-official" style="color:blue; font-size:40px"></i></a> 
            <a href="https://www.instagram.com/themarvelvsdc/?hl=en" target="_blank"> <i class="fa fa-instagram" style="color:magenta; font-size:40px"></i> </a> 
            <a href="https://twitter.com/TheMarvelvsDC?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank"><i class="fa fa-twitter-square" style="color:#00acee; font-size:40px" ></i> </a>  
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

</body>
</php>
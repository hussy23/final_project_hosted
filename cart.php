<!-
Code Initiator - Hussain Moulana
Begin Date - Sept 22 - 2021
>

<?php
session_start();

require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM comics WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
     <meta charset="UTF-8">
    <meta name="viewport" content="width =device-width, initial-scale=1">
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="main.css">
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<TITLE> Shopping Cart</TITLE>

</HEAD>
<BODY>
    <div class="header">
        <a class="logo" href="index.php"> <img src="images/logo.jpg">  </a>
  
            <nav class="header-left">
                <a  href="index.php">Home</a>
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
               <a class="active" href="feedback.php" >Feedback</a>  
                   
             </nav>
             
        <div class="cart-right">
            <a class="active" href="cart.php" >
          <span class="fa fa-shopping-cart"></span> Your Cart
        </a>
             </div>

             <nav class="header-right">
            <a href="reg.php" > Sign Up </a>
            <a href="login.php" > Login </a>             
            </nav>
    </div>

<div id="shopping-cart">
<div class="heading">Welcome To Your Shopping Cart!! </div>

<a id="btnEmpty" href="cart.php?action=empty">Empty Cart??</a>
<?php

if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tablecart" cellpadding="8" cellspacing="2">
<tbody>
<tr>

<th style="text-align:Center;">Type</th>
<th style="text-align:Center;">Code</th>
<th style="text-align:Center;" width="5%">Quantity</th>
<th style="text-align:Center;" width="10%">Unit Price</th>
<th style="text-align:center;" width="10%">Price</th>
<th style="text-align:center;" width="10%">Remove</th>
</tr>	
<?php	
         
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
                                
				<td style="text-align:center;"><?php echo $item["name"]; ?></td>
				<td style="text-align:center;"><?php echo $item["code"]; ?></td>
                                <td style="text-align:center;" class="value-button" >
                                <div class="cart-action"> 
                                <input type="number" class="product-quantity" name="quantity" value="<?php echo $item["quantity"]; ?>" size="2" /> 
                                </div></td>
                                
				<td  style="text-align:center;"><?php echo $item["price"]; ?></td>
				<td  style="text-align:center;"><?php echo number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="images/icon-delete.png" alt="Remove Item" /></a></td>
				
                                

                                 </tr>  
				<?php
                               
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
    <td colspan="2" align="right"><strong>Total:</strong></td>
    <td align="center"><strong><?php echo $total_quantity; ?></strong></td>
<td align="right" colspan="2"><strong><?php echo "Rs. ".number_format($total_price, 2); ?></strong></td>
<td></td>

</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="emptycart"> <i class="fa fa-exclamation" style="color:red"> Your Cart is Empty </i> </div>

<?php 
}
?>
</div>
    
<div class="checkout">
    <a href="login.php">
    <i class="fa fa-arrow-circle-right"> Proceed To Checkout  </i></a> 
</div>

<div class="continue">
    <a href="index.php">
    <i class="fa fa-arrow-circle-left"> Continue Shopping  </i></a> 
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
</HTML>
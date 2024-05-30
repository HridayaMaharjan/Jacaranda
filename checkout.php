<?php 

include('includes/header.php');
include('includes/navbar.php');

?>
 
 
<div class="heading">
    <h3>checkout</h3>
    <p><a href="index.php">home</a><span> / checkout</span></p>
</div>

<section class="checkout">
    <h1 class="title">order summary</h1>
<form action="" method="post">

    <div class="cart-items">
        <h3>cart items</h3>
        <p><span class="name">pizza 01</span><span class="price">Rs.750</span></p>
        <p><span class="name">momo 02</span><span class="price">Rs.180</span></p>
        <p><span class="name">soup 03</span><span class="price">Rs.200</span></p>
        <p class="grand-total"><span class="name">grand total :</span><span class="price">Rs.1130</span></p>
        <a href="cart.html" class="btn">view cart</a>
    </div>

    <div class="user-profile">
        <h3>your info</h3>
        <p><i class="fas fa-user"></i><span>hitee mhz</span></p>
        <p><i class="fas fa-phone"></i><span>9876543210</span></p>
        <p><i class="fas fa-envelope"></i><span>mhzhitee@gmail.com</span></p>
        <a href="update_profile.html" class="btn">update info</a>
        <h3>delivery address</h3>
        <p><i class="fas fa-map-marker-alt"></i><span>kohity-20, kathmandu</span></p>
        <a href="update_address.html" class="btn">update address</a>
        <select name="method" class="box" required>
            <option value="" disabled selected>select payment method --</option>
            <option value="cash on delivery">cash on delivery</option>
            <option value="credit card">credit card</option>
            <option value="e-sewa">e-sewa</option>
            <option value="khalti">khalti</option>
        </select>
        <input type="submit" value="place order" class="btn" style="width:100%; background:red; color:white;">

    </div>
</form>
</section>


<?php
include('includes/footer.php');
?>
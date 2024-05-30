<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<section class="search-form">
    <form action="" method="post">
        <input type="text" name="search_box" placeholder="search here.." required maxlength="100" class="box">
        <button type="submit" name="search_btn" class="fas fa-search"></button>
    </form>
</section>

<section class="products" style="min-height: 80vh; padding-top: 0;">
<?php
if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){

}
?>
<?php include ('includes/index_menu.php'); ?>
</section>

<?php
include('includes/footer.php');
?>
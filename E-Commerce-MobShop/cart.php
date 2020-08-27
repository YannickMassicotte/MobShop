<?php
    ob_start();
    //Include header.php file
    include('header.php');
?>

    <?php  
    /* Include _shopping-cart.php if not empty */
    count($product->getData('cart')) ? include('Template/_shopping-cart.php'): include('Template/not-found/_cart_notFound.php');
    /* Include _shopping-cart.php if not empty */

    /* Include _shopping-cart.php if not empty */
    count($product->getData('wishlist')) ? include('Template/_wishlist.php'): include('Template/not-found/_wishlist_notFound.php');
    /* Include _shopping-cart.php if not empty */
    
    /* Include _new-phones.php file */
    include('Template/_new-phones.php');
    /* Include _new-phones.php file */
    ?>

<?php
    //Include footer.php file
    include('footer.php');
?>
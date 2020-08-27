<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['delete-cart-submit'])){
            $deleterecord = $Cart->deleteCart($_POST['item_id'], 'wishlist');
        }
        //Add to cart from wishlist using the saveForLater() method
        if(isset($_POST['add-to-cart-submit'])){
            $addtocart = $Cart->saveForLater($_POST['item_id'], 'cart', 'wishlist');   
        }
    }
?>

<!-- Shopping Cart -->
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-80 px-5">
        <h5 class="font-rubik font-size-20">Whislist</h5>
        <!-- Shooping Cart Items -->
        <div class="row">

            <!-- Cart Items -->
            <div class="col-sm-9">
                <?php 
                    foreach($product->getData('wishlist') as $item):
                        $cart = $product->getProduct($item['item_id']); 
                        $subTotal[] = array_map(function($item){
                ?>
                <!-- Cart Item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $item['item_image'] ?? "./assets/products.1.png";?>" alt="cart1" class="img-fluid" style="height:120px">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-rubik font-size-20"><?php echo $item['item_name'] ?? "Unknown";?></h5>
                        <small>by <?php echo $item['item_brand'] ?? "Brand";?></small>
                        <!-- product rating -->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                        </div>
                        <!-- !product rating -->
                        <!-- product qty -->
                        <div class="qty d-flex pt-2">
                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0;?>" name="item_id">
                                <button type="submit" name="delete-cart-submit" class="btn font-rubik text-danger pl-0 pr-3 border-right">Delete</button>
                            </form>
                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0;?>" name="item_id">
                                <button type="submit" name="add-to-cart-submit" class="btn font-rubik text-danger">Add to Cart</button>
                            </form>
                        </div>
                        <!-- !product qty -->
                    </div>
                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-rubik">
                            $<span class="product_price" data-id="<?php echo $item['item_id'] ?? 0;?>"><?php echo $item['item_price'] ?? 0;?></span>
                        </div>
                    </div>
                </div>
                <!-- !Cart Item -->
                <?php
                        return $item['item_price'];
                    }, $cart);
                    endforeach;
                    
                ?>
            </div>
            <!-- !Cart Items -->
        </div>
        <!-- !Shooping Cart Items -->
    </div>
</section>
<!-- !Shopping Cart -->
<?php
    //Request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['product-submit'])){
            // Call Add to Cart
            $Cart->addToCart($_POST['user_id'],$_POST['item_id']);
        }
    }

    $item_id = $_GET['item-id'] ?? 1;
    foreach($product->getData() as $item):
    if($item['item_id'] == $item_id):
?>
<!-- Product -->
<section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="<?php echo $item['item_image'] ?? './assets/products/1.png'?>" alt="product" class="img-fluid">
                        <div class="form-row pt-4 font-size-16 font-rubik">
                            <div class="col">
                                <button type="submit" class="btn btn-danger form-control">Proceed to Buy</button>
                            </div>
                            <div class="col">
                            <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                    <?php if(in_array($item['item_id'],
                                            $Cart->getCartId($product->getData('cart')) ?? [])){?>
                                            <button type="submit" name="product-submit" class="btn btn-success form-control" disabled>In Cart</button>
                                    <?php }else { ?>
                                            <button type="submit" name="product-submit" class="btn btn-warning form-control">Add to Cart</button>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 py-5">
                        <h5 class="font-rubik font-size-20"><?php echo $item['item_name'] ?? 'Unknown'?></h5>
                        <small>by <?php echo $item['item_brand'] ?? 'Brand'?></small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">20,534 ratings | 100+ answered</a>
                        </div>
                        <hr class="m-0">
                        <!-- Product Price -->
                        <table class="my-3">
                            <tr class="font-rale font-size-14">
                                <td>M.R.P</td>
                                <td><strike>$162.00</strike></td>
                            </tr>
                            <tr class="font-rale font-size-14">
                                <td>Deal Price</td>
                                <td class="font-size-20 text-danger">$<span><?php echo $item['item_price'] ?? '0'?></span><small class="text-dark font-size-12">&nbsp;&nbsp;inclusive of all taxes</small></td>
                            </tr>
                            <tr class="font-rale font-size-14">
                                <td>You Save</td>
                                <td>$<span class="font-size-16 text-danger">10.00</span></td>
                            </tr>
                        </table>
                        <!-- !Product Price -->

                        <!-- Policy -->
                        <div id="policy">
                            <div class="d-flex">
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">10 Days <br> Replacement</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-truck border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">Daily Tuition <br> Delivered</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">1 Year <br> Warranty</a>
                                </div>
                            </div>
                        </div>
                        <!-- !Policy -->
                        <hr>
                        <!-- Order-Details -->
                        <div id="order-details" class="font-rale d-flex flex-column text-dark">
                            <small>Delivery by: Mar 29 - Apr 1</small>
                            <small>Sold by : <a href="#">Daily Electronics</a>(4.5 our of 5)</small>
                            <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 424201</small>
                        </div>
                        <!-- !Order-Details -->
                        
                        <!-- Color & Qty -->
                        <div class="row">
                            <div class="col-6">
                                <!-- color -->
                                <div class="color my-3">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="font-rubik">Color:</h6>
                                        <div class="p-2 color-yellow-bg rounded-circle">
                                            <button class="btn font-size-14"></button>
                                        </div>
                                        <div class="p-2 color-primary-bg rounded-circle">
                                            <button class="btn font-size-14"></button>
                                        </div>
                                        <div class="p-2 color-second-bg rounded-circle">
                                            <button class="btn font-size-14"></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- !color -->
                            </div>
                            <!-- Qty -->
                            <div class="col-6">
                                <div class="qty d-flex">
                                    <h6 class="font-rubik">Qty:</h6>
                                    <div class="px-4 d-flex font-rale">
                                        <button class="qty-up border bg-light"><i class="fas fa-angle-up"></i></button>
                                        <input type="text" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                        <button class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- !Qty -->
                        </div>
                        <!-- !Color & Qty -->

                        <!-- Size -->
                        <div class="size my-3">
                            <h6 class="font-rubik">Size:</h6>
                            <div class="d-flex justify-content-between w-75">
                                <div class="font-rubik border p-2">
                                    <button class="btn p-0 font-size-14">4GB RAM</button>
                                </div>
                                <div class="font-rubik border p-2">
                                    <button class="btn p-0 font-size-14">6GB RAM</button>
                                </div>
                                <div class="font-rubik border p-2">
                                    <button class="btn p-0 font-size-14">8GB RAM</button>
                                </div>
                            </div>
                        </div>
                        <!-- !Size -->
                    </div>
                    <div class="col-12">
                        <h6 class="font-rubik">Product Description</h6>
                        <hr>
                        <p class="font-rale font-size-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta repellendus qui at tempora quisquam officiis odit et tenetur illo, libero saepe doloremque ipsa expedita ex vel placeat hic cum nulla.</p>
                        <p class="font-rale font-size-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta repellendus qui at tempora quisquam officiis odit et tenetur illo, libero saepe doloremque ipsa expedita ex vel placeat hic cum nulla.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- !Product -->




<?php
    endif;
    endforeach;
?>
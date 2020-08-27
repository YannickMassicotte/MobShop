$(document).ready(function(){

    //Banner Owl Carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1
    });

    //Top Sale Owl carousel
    $("#top-sale .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

    //New Phones Owl carousel
    $("#new-phones .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

    //Blogs owl-carousel
    $("#blogs .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0:{
                items:1
            },
            600:{
                items:3
            },
        }
    });

    //Isotope Filter
    var $grid = $(".grid").isotope({
        itemSelectorL:'.grid-item',
        layoutMode:'fitRows'
    });

    //Filter items on button click
    $(".button-group").on("click","button", function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({filter:filterValue});
    });

    // Product QTY Section
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");
    let $deal_price = $("#deal-price");
    // let $input = $(".qty_input");

    //Click Event on Qty-UP
    $qty_up.click(function(e){
        
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}'`);

        //Change product price using ajax call
        $.ajax({url:"template/ajax.php", type:'post', data:{itemid:$(this).data("id")} , success:function(result){
            let obj = JSON.parse(result);
            let item_price = obj[0]['item_price'];

            if($input.val() >= 1 && $input.val() <= 9){
                $input.val(function(i, oldval){
                    return ++oldval;
                });
            //increase price of product
            $price.text(parseInt(item_price*$input.val()).toFixed(2));

            //set subtotal price
            let subTotal = parseInt($deal_price.text()) + parseInt(item_price);
            $deal_price.text(subTotal.toFixed(2));
            }
        } }); // closing ajax request
    });
    //Click Event on Qty-Down
    $qty_down.click(function(e){

        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}'`);

        //Change product price using ajax call
        $.ajax({url:"template/ajax.php", type:'post', data:{itemid:$(this).data("id")} , success:function(result){
            let obj = JSON.parse(result);
            let item_price = obj[0]['item_price'];

            if($input.val() > 1 && $input.val() <= 10){
                $input.val(function(i, oldval){
                    return --oldval;
                });

            //increase price of product
            $price.text(parseInt(item_price*$input.val()).toFixed(2));

            //set subtotal price
            let subTotal = parseInt($deal_price.text()) - parseInt(item_price);
            $deal_price.text(subTotal.toFixed(2));
            }
        } }); // closing ajax request
    });
});


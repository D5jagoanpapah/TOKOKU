$(document).ready(function () {

    loadCart();
    loadWishlist();

    $.ajaxSetup({
     headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
        });

    function loadCart()
     {
        $.ajax({
            method: "GET",
            url: "/load-cart-data",
            
            success: function (response) {  
                $('.cart-count').html('');
                $('.cart-count').html(response.count);

                // console.log(response.count);
            }
        });
     }

    function loadWishlist()
     {
        $.ajax({
            method: "GET",
            url: "/load-wishlist-data",
            
            success: function (response) {  
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);

                // console.log(response.count);
            }
        });
     }



    $('.addToCartBtn').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
         headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
            });
            
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success: function (response) {  
                alert(response.status);
                loadCart();
            }
        });

    });

    $('.addToWishlist').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
               });

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'product_id': product_id,
            },
            success: function (response) {  
                alert(response.status);
                loadWishlist();
            }
        });

    });

    $('.tambah').click(function (e){
        e.preventDefault();

        var n_tambah = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(n_tambah, 10)
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);

        }
    })

    $('.kurang').click(function (e){
        e.preventDefault();

        var n_kurang = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(n_kurang, 10)
        value = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    })

    $('.delete-cart-item').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
               });

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                'prod_id':prod_id,
            },
            success: function (response){
                window.location.reload();
                alert(response.status);
            }
        });

    });

    $('.remove-wishlist-item').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
               });

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: "POST",
            url: "delete-wishlist-item",
            data: {
                'prod_id':prod_id,
            },
            success: function (response){
                window.location.reload();
                alert(response.status);
            }
        });

    });

    $('.ubahqty').click( function (e){
        e.preventDefault;

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
               });
                
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty =  $(this).closest('.product_data').find('.qty-input').val();
        data = {
            'prod_id' : prod_id,
            'prod_qty' : qty,
        }
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function (response){
                window.location.reload();   
            }
        });

    });
    
});



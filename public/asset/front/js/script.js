$(function () {
    // view product modal-------------------------------------------
    $(document).on("click", "#productModal", function (event) {
        event.preventDefault();
        let url = $(this).attr("href");

        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: data => {
                $("#ViewProductModal").modal("show");
                $("#viewId").val(data.id);
                $("#viewQuantity").val(1);
                $("#viewImage").attr("src", data.photo);
                $("#viewName").text(data.name);
                if (data.Offer_price > 0) {
                    $("#viewPrice").text("৳ " + data.Offer_price);
                } else {
                    $("#viewPrice").text("৳ " + data.price);
                }
                $("#viewImage").attr("src", data.photo);
                $("#viewOverview").text(data.short_description);
            }
        });
    });

    // Add to cart-------------------------------------------
    $(document).on("submit", "#addToCartForm", function (event) {
        event.preventDefault();
        let url = $(this).attr("action");
        let method = $(this).attr("method");
        let data = $(this).serialize();
        $.ajax({
            url: url,
            type: method,
            data: data,
            dataType: "JSON",
            success: data => {
                Swal.fire({
                    position: "top-end",
                    type: "success",
                    title: "This is added to card",
                    showConfirmButton: false,
                    timer: 1500
                });
                $(".my-cart-badge").text(data);
            }
        });
    });

    // Cart Product--------------------------------------------------------
    const getCastProduct = () => {
        let url = window.location.origin + "/carts";
        $.ajax({
            url: url,
            type: "GET",
            dataType: "HTML",
            success: (data) => {
                $("#cartProducts").html(data);
            }
        });
    };

    // Cart Product--------------------------------------------------------
    $(document).on("click", "#cart-product", function () {
        $("#ViewCartModal").modal("show");
        getCastProduct();
    });

    // remove Cart Product--------------------------------------------------------
    $(document).on("click", "#cartRemove", function (event) {
        event.preventDefault();
        let url = $(this).attr("href");
        let token = $(this).data("token");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _method: "DELETE",
                        _token: token
                    },
                    dataType: "JSON",
                    success: function (data) {
                        getCastProduct();
                        $(".my-cart-badge").text(data);

                        if ($("#checkout-active").text() == "1") {
                            cartPriceCount()
                        }
                    }
                });
                Swal.fire(
                    "Deleted!",
                    "Your product has been removed.",
                    "success"
                );
            }
        });
    });

    $(document).on("click", "#cartRemoveAll", function (event) {
        event.preventDefault();
        let url = $(this).attr("href");
        let token = $(this).data("token");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        // _method: 'DELETE',
                        _token: token
                    },
                    dataType: "JSON",
                    success: function (data) {
                        getCastProduct();
                        $(".my-cart-badge").text(data);

                        if ($("#checkout-active").text() == "1") {
                            cartPriceCount()
                        }
                    }
                });
                Swal.fire(
                    "Deleted!",
                    "Your product has been removed.",
                    "success"
                );
            }
        });
    });

    // Update--------------------------------------------------------
    $(document).on("change", "#quantity", function (event) {
        event.preventDefault();
        let url = $(this).data("url");
        let token = $(this).data("token");
        let quantity = parseInt($(this).val());
        $.ajax({
            url: url,
            type: "POST",
            data: {
                quantity: quantity,
                _token: token
            },
            dataType: "JSON",
            success: (data) => {
                getCastProduct();
                $(".my-cart-badge").text(data);

                if ($("#checkout-active").text() == "1") {
                    cartPriceCount()
                }
            }
        });
    });

    // Total Price-------------------------------------------------------
    $(document).on("change", "input[type = 'radio'][name = 'location']", function () {
        let location = parseInt($("input[type = 'radio'][name = 'location']:checked").val());
        cartPriceCount();
    });

    const currencyFormat = (price) => {
        return price.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    };

    const cartPriceCount = () => {
        let url = window.location.origin + "/cartPriceCount"

        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: (data) => {
                $("#subtotal").text(data.cart_price);
                let subtotal = Number(data.cart_price.replace(/[^0-9\.-]+/g, ""));

                let location = parseInt($("input[type = 'radio'][name = 'location']:checked").val());
                let dCharge = location * data.cart_count;
                let tPrice = subtotal + dCharge;

                $("#dCharge").text(currencyFormat(dCharge));
                $("#tPrice").text(currencyFormat(tPrice));
            }
        })
    }


    // Order Details------------------------------
    $(document).on("click", "#orderView", function(event){
        event.preventDefault();

        let url = $(this).attr("href");
        let id = $(this).data("id");
        $.ajax({
            url: url,
            type: "GET",
            dataType: "HTML",
            success: (data) => {
                $("#orderProducts").html(data);
                $("#orderID").text(id);
            }
        });
    })
});

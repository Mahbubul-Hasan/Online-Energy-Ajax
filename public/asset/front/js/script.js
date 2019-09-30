$(function () {

    // view product modal-------------------------------------------
    $(document).on("click", "#productModal", function (event) {
        event.preventDefault();
        let url = $(this).attr("href");

        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: (data) => {
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
        })
    });

    // Add to cart-------------------------------------------
    $(document).on("submit", "#addToCartForm", function (event) {
        event.preventDefault();
        let url = $(this).attr("action");
        let method = $(this).attr("method");
        let data = $(this).serialize();
        console.log(data);
        $.ajax({
            url: url,
            type: method,
            data: data,
            dataType: "JSON",
            success: (data) => {
                if (data == "success") {
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'This is added to card',
                        showConfirmButton: false,
                        timer: 1500
                      })
                }
            },
        });
    })
});

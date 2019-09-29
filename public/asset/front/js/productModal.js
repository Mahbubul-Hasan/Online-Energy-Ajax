$(function () {
    $(document).on("click", "#productModal", function (event) {
        event.preventDefault();
        let url = $(this).attr("href");

        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: (data) => {
                $("#ViewProductModal").modal("show");
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
    })
});

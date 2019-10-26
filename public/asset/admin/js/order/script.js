$(function() {
    $(document).on("click", "#addCategoryModal", function() {
        $(".errorName").css("display", "none");
    });

    // All Category------------------------------------------------------------
    const getAllcategory = () => {
        let url = $("#getAllcategory").data("url");
        $.ajax({
            url: url,
            type: "GET",
            dataType: "html",
            success: data => {
                $("#showAllcategory").html(data);
            }
        });
    };

    // View------------------------------------------------------------
    $(document).on("click", "#view", function(event) {
        event.preventDefault();
        let url = $(this).attr("href");
        $.ajax({
            url: url,
            typr: "GET",
            dataType: "JSON",
            success: data => {
                if (!$.isEmptyObject(data)) {
                    $("#viewCategoryModal").modal("show");
                    $("#viewCategoryModalLabel").text(data.name + "'s Data");

                    $("#cName").text(data.name);
                    $("#cDescription").text(data.description);
                    $("#cActive").text(data.active === 1 ? "Yes" : "No");
                    $("#cDate").text(data.created_at);
                }
            }
        });
    });
    // Delete------------------------------------------------------------
    $(document).on("click", "#delete", function(event) {
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
                        _method: "delete",
                        _token: token
                    },
                    dataType: "JSON",
                    success: function(data) {
                        if (data === "delete") return getAllcategory();
                    }
                });
                console.log("Delete");
                Swal.fire("Deleted!", "Your file has been deleted.", "success");
            }
        });
    });

    // Edit------------------------------------------------------------
    $(document).on("click", "#edit", function(event) {
        event.preventDefault();

        $(".errorOName").css("display", "none")
        $(".errorOPhone").css("display", "none")
        $(".errorOEmail").css("display", "none")
        $(".errorOAddress").css("display", "none")
        $(".errorOTotalPrice").css("display", "none")

        let url = $(this).attr("href") + "/edit";

        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: data => {
                $("#editOrderModal").modal("show");

                $("#eOId").val(data.id);
                $("#eOUserId").val(data.user_id);
                $("#eOName").val(data.name);
                $("#eOPhone").val(data.phone);
                $("#eOEmail").val(data.email);
                $("#eOAddress").val(data.address);
                $("#eOTotalPrice").val(data.totalPrice);
                $("#eOTotalPrice").val(data.totalPrice);
                $("#location-" + data.location).prop("checked", true);
                $("#status-" + data.status).prop("checked", true);
            }
        });
    });

    // Update------------------------------------------------------------
    $(document).on("submit", "#updateOrderForm", function(event) {
        event.preventDefault();

        let id = $("#eOId").val();
        let url = $(this).attr("action") + "/" + id;
        let method = $(this).attr("method");
        let data = $(this).serialize();

        $.ajax({
            url: url,
            type: method,
            data: data,
            dataType: "JSON",
            success: (data) => {
                if (data.name) {
                    $(".errorOName").css("display", "block");
                    $(".errorOName").html(data.name);
                } else if (data.phone) {
                    $(".errorOPhone").css("display", "block");
                    $(".errorOPhone").html(data.phone);
                } else if (data.email) {
                    $(".errorOEmail").css("display", "block");
                    $(".errorOEmail").html(data.email);
                } else if (data.address) {
                    $(".errorOAddress").css("display", "block");
                    $(".errorOAddress").html(data.address);
                } else if (data.totalPrice) {
                    $(".errorOTotalPrice").css("display", "block");
                    $(".errorOTotalPrice").html(data.totalPrice);
                } else if (data = "seccess") {
                    Swal.fire({
                        position: "top-end",
                        type: "success",
                        title: "Order successfully updated",
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $("#editOrderModal").modal("hide");
                    // return getAllcategory();
                }
            },
        });
    });

    // pagination---------------------------------------------------------
    $(document).on("click", ".pagination li a", function(event) {
        event.preventDefault();

        let url = $(this).attr("href");
        let pageNumber = url.split("?page=")[1];

        let newUrl =
            $("#getAllcategoryByPagination").data("url") +
            "?page=" +
            pageNumber;

        $.ajax({
            url: newUrl,
            type: "GET",
            dataType: "HTML",
            success: data => {
                $("#showAllcategory").html(data);
            }
        });
    });

    // Search---------------------------------------------------------
    $(document).on("keyup", ".admin-search", function() {
        setTimeout(() => {
            let key = $(".admin-search").val();
            let url = $("#category-search").data("url") + "?key=" + key;

            $.ajax({
                url: url,
                type: "GET",
                dataType: "HTML",
                success: data => {
                    console.log(data);
                    $("#showAllcategory").html(data);
                }
            });
        }, 1000);
    });
});
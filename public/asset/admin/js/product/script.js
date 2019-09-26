$(function () {

    let active = 0;

    // All product-----------------------------------------
    const getAllProduct = () => {
        let url = $("#getAllProduct").data("url");

        $.ajax({
            url: url,
            type: "GET",
            dataType: "HTML",
            success: (data) => {
                $("#showAllProduct").html(data);
            }
        });
    };

    // View-----------------------------------------
    $(document).on("click", "#view", function (event) {
        event.preventDefault();
        let url = $(this).attr("href");

        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: (data) => {
                if (!$.isEmptyObject(data)) {
                    $("#viewProductModal").modal("show");

                    $("#viewProductModalLabel").text(data.name + "'s Data");
                    $("#pPhoto").attr("src", window.location.origin + '/' + data.photo);
                    $("#pName").text(data.name);
                    $("#pCategory").text(data.category.name);
                    $("#pCode").text(data.code);
                    $("#pPrice").text(data.price);
                    $("#pOfferPrice").text(data.Offer_price);
                    $("#pSDescription").text(data.short_description);
                    $("#pLDescription").html(data.long_description);
                    $("#pPopular").text(data.popular == 1 ? "Popular" : "Unpopular");
                    $("#pActive").text(data.active == 1 ? "Active" : "Inactive");
                    $("#pDate").text(data.created_at);
                }
            }
        })
    });

    // Delete------------------------------------------

    $(document).on("click", "#delete", function (event) {
        event.preventDefault();

        let url = $(this).attr("href");
        let token = $(this).data("token");

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {

                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _method: 'delete',
                        _token: token
                    },
                    dataType: "JSON",
                    success: (data) => {
                        if (data = "Delete")
                            getAllProduct();
                    }
                })
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });

    // Add----------------------------------------------------

    $(document).on("submit", "#addProductForm", function (event) {
        event.preventDefault();
        displayNone();

        let url = $(this).attr("action");
        let message = "A new Product Save";

        saveProductInfo(this, url, message, "#addProductModal");
    });


    const saveProductInfo = (form, url, message, modal) => {

        let method = $(form).attr("method");
        let data = new FormData(form);

        $.ajax({
            url: url,
            type: method,
            data: data,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: (data) => {

                if (data == "seccess") {
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: message,
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $(modal).modal("hide");
                    $(form)[0].reset();
                    getAllProduct();

                } else {
                    if (data.name) {
                        $(".errorName").css("display", "block");
                        $(".errorName").html(data.name);
                    }
                    if (data.category_id) {
                        $(".errorCategoryName").css("display", "block");
                        $(".errorCategoryName").html(data.category_id);
                    }
                    if (data.code) {
                        $(".errorProductCode").css("display", "block");
                        $(".errorProductCode").html(data.code);
                    }
                    if (data.price) {
                        $(".errorProductPrice").css("display", "block");
                        $(".errorProductPrice").html(data.price);
                    }
                    if (data.Offer_price) {
                        $(".errorProductOfferPrice").css("display", "block");
                        $(".errorProductOfferPrice").html(data.Offer_price);
                    }
                    if (data.short_description) {
                        $(".errorProductShortDescription").css("display", "block");
                        $(".errorProductShortDescription").html(data.short_description);
                    }
                    if (data.long_description) {
                        $(".errorProductLongDescription").css("display", "block");
                        $(".errorProductLongDescription").html(data.long_description);
                    }
                    if (data.photo) {
                        $(".errorProductPhoto").css("display", "block");
                        $(".errorProductPhoto").html(data.photo);
                    }
                }
            }
        })
    }

    const displayNone = () => {

        $(".errorName").css("display", "none");
        $(".errorCategoryName").css("display", "none");
        $(".errorProductCode").css("display", "none");
        $(".errorProductPrice").css("display", "none");
        $(".errorProductOfferPrice").css("display", "none");
        $(".errorProductShortDescription").css("display", "none");
        $(".errorProductLongDescription").css("display", "none");
        $(".errorProductPhoto").css("display", "none");

        $(".photoView").attr('src', '');
    }

    // Upload image---------------------------------
    $(document).on("change", ".photo", function () {
        $(".photoView").attr('src', "");
        let file = event.target.files[0];
        let reader = new FileReader();

        if (file["size"] <= 1048576) {
            reader.onload = (e) => {
                $(".photoView").attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        } else {
            $(".photo").val("");
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'File size must be 1MB',
            })
        }
    });

    // Edit---------------------------------
    $(document).on("click", "#edit", function (event) {
        event.preventDefault();
        displayNone();

        $("#editProductModal").modal("show");

        let url = $(this).attr("href") + '/edit';

        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: (data) => {

                $("#editProductModalLabel").text(data.name + "'s Data");

                $("#valueId").val(data.id);
                $("#valueName").val(data.name);
                $("#selectCategory").val(data.category.id);
                $("#valueProductCode").val(data.code);
                $("#valueProductPrice").val(data.price);
                $("#valueProductOfferPrice").val(data.Offer_price);
                $("#valueProductShortDescription").val(data.short_description);
                $("#valueProductLongDescription").val(data.long_description);
                $("#popular-" + data.popular).prop('checked', true);
                $("#active-" + data.active).prop('checked', true);
                $(".photoView").attr("src", window.location.origin + '/' + data.photo);;
            }
        });
    });

    // Update---------------------------------
    $(document).on("submit", "#updateProductForm", function (event) {
        event.preventDefault();

        let id = $("#valueId").val();
        let url = $(this).attr("action") + "/" + id;
        let message = "Product info update";

        saveProductInfo(this, url, message, "#editProductModal");

    })

})

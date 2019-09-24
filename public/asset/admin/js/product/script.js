$(function(){
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
    $(document).on("click", "#view", function(event){
        event.preventDefault();
        let url = $(this).attr("href");
        
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: (data) => {
                if (! $.isEmptyObject(data)) {
                    $("#viewProductModal").modal("show");

                    $("#viewProductModalLabel").text(data.name +"'s Data");

                    $("#pPhoto").attr("src", data.photo);
                    $("#pName").text(data.name);
                    $("#pCategory").text(data.category.name);
                    $("#pCode").text(data.code);
                    $("#pPrice").text(data.price);
                    $("#pOfferPrice").text(data.Offer_price);
                    $("#pSDescription").text(data.short_description);
                    $("#pLDescription").text(data.long_description);
                    $("#pPopular").text(data.popular == 1 ? "Popular" : "Unpopular");
                    $("#pActive").text(data.active == 1 ? "Active" : "Inactive");
                    $("#pDate").text(data.created_at);
                }
            }
        })
    });

    // Delete------------------------------------------

    $(document).on("click", "#delete", function(event){
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
                    data: {_method: 'delete', _token :token},
                    dataType: "JSON",
                    success: (data) => {
                        if (data = "Delete") {
                            return getAllProduct();
                        }
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

    $(document).on("submit", "#addProductForm", function(event){
        event.preventDefault();

        $(".errorName").css("display", "none");
        $(".errorCategoryName").css("display", "none");
        $(".errorProductCode").css("display", "none");
        $(".errorProductPrice").css("display", "none");
        $(".errorProductOfferPrice").css("display", "none");
        $(".errorProductShortDescription").css("display", "none");
        $(".errorProductLongDescription").css("display", "none");
        $(".errorProductPhoto").css("display", "none");


        let url = $(this).attr("action");
        let method = $(this).attr("method");
        let photo = $("#photo").val().replace(/^.*[\\\/]/, '');
        let data = $(this).serialize() +"&photo="+ photo;

        $.ajax({
            url: url,
            type: method,
            data: data,
            dataType: "JSON",
            success: (data)=> {
                
                if (data == "Success") {
                    console.log(data);
                }
                else{
                    if (data.name) {
                        $(".errorName").css("display", "block");
                        $(".errorName").html(data.name);
                    } if (data.category_id) {
                        $(".errorCategoryName").css("display", "block");
                        $(".errorCategoryName").html(data.category_id);
                    } if (data.code) {
                        $(".errorProductCode").css("display", "block");
                        $(".errorProductCode").html(data.code);
                    } if (data.price) {
                        $(".errorProductPrice").css("display", "block");
                        $(".errorProductPrice").html(data.price);
                    } if (data.Offer_price) {
                        $(".errorProductOfferPrice").css("display", "block");
                        $(".errorProductOfferPrice").html(data.Offer_price);
                    } if (data.short_description) {
                        $(".errorProductShortDescription").css("display", "block");
                        $(".errorProductShortDescription").html(data.short_description);
                    } if (data.long_description) {
                        $(".errorProductLongDescription").css("display", "block");
                        $(".errorProductLongDescription").html(data.long_description);
                    } if (data.photo) {
                        $(".errorProductPhoto").css("display", "block");
                        $(".errorProductPhoto").html(data.photo);
                    } 
                }
            }
        })
    });
    
})
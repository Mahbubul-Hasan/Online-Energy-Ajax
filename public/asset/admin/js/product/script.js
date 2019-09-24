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
    
})
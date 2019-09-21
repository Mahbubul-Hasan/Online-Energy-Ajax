$(function(){

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

                    console.log(data);
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

    
    
})
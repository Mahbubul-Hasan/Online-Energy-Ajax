$(function () {
    // Add------------------------------------------------------------
    $(document).on("submit", "#addCategoryForm", function(event) {
        event.preventDefault();

        let url = $(this).attr("action");
        let message = "A new Category Save"
        return seveCategoryInfo("#addCategoryForm", "#addCategoryModal", url, message);
        
    });


    //  Add and Update----------------------------------------------------
    const seveCategoryInfo = (form, modal, url, message) => {
        // console.log(url);
        let method = $(form).attr("method");
        let data = $(form).serialize();

        $.ajax({
            url: url,
            type: method,
            data: data,
            dataType: "JSON",
            beforeSend: () => {
            },
            success: (data) => {
                if (data.name)
                {
                    $(".errorName").css("display", "block");
                    $(".errorName").html(data.name);
                }else {
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: message,
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $(".errorName").css("display", "none");
                    $(form)[0].reset();
                    $(modal).modal('hide');
                    return getAllcategory();
                }
            },
            complete: () => {
            },
        })
    }

    // All Category------------------------------------------------------------
    const getAllcategory = () => {
        let url = $("#getAllcategory").data("url");
        $.ajax({
            url: url,
            type: "GET",
            dataType: "html",
            success: (data) => {
                $("#showAllcategory").html(data)
            },
        })
    };

// View------------------------------------------------------------
    $(document).on("click", "#view", function(event) {
        event.preventDefault();
        let url = $(this).attr("href");
        $.ajax({
            url: url,
            typr: "GET",
            dataType: "JSON",
            success: (data) => {
                if(! $.isEmptyObject(data))
                {
                    $("#viewCategoryModal").modal("show");
                    $("#viewCategoryModalLabel").text(data.name + "'s Data");

                    $("#cName").text(data.name);
                    $("#cDescription").text(data.description);
                    $("#cActive").text(data.active === 1 ? "Yes" : "No");
                    $("#cDate").text(data.created_at);
                }
            }
        })
    });
// Delete------------------------------------------------------------
    $(document).on("click", "#delete", function (event) {
        event.preventDefault();
        let url = $(this).attr("href");
        let token = $(this).data('token');

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
                    type: 'POST',
                    data: {_method: 'delete', _token :token},
                    dataType: "JSON",
                    success: function(data) {
                        if (data === "delete")
                            return getAllcategory();
                    },
                });
                console.log("Delete");
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success',
                )
            }
        })
    });

    // Edit------------------------------------------------------------
    $(document).on("click", "#edit", function (event) {
        event.preventDefault();
        let url = $(this).attr("href") +'/edit';

        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: (data) => {
                $("#editCategoryModal").modal("show");
                $("#eId").val(data.id);
                $("#eName").val(data.name);
                $("#eDescription").val(data.description);
                
                $("#active-" + data.active).prop('checked', true);
                $("#editCategoryModalLabel").text("Update "+data.name +"'s Data")

                $(document).on("submit", "#updateCategoryForm", function(event) {
                    event.preventDefault();

                    let url = $("#updateCategoryForm").attr("action")+ "/" + data.id;
                    console.log(url)
                    let message = "Category info update";
                    return seveCategoryInfo("#updateCategoryForm","#editCategoryModal", url, message);
                });
            }
        })
    })
});

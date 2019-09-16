$(function () {
    $(document).on("submit", "#addCategoryForm", function(event) {
        event.preventDefault();
        let url = $(this).attr("action");
        let type = $(this).attr("method");
        let data = $(this).serialize();

        $.ajax({
            url: url,
            type: type,
            data: data,
            dataType: "JSON",
            beforeSend: () => {
            },
            success: (data) => {
                if (data.name)
                {
                    $("#name").css("display", "block");
                    $("#name").html(data.name);
                }else {
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $("#name").css("display", "none");
                    $(this)[0].reset();
                    $('#addCategoryModal').modal('hide');
                    return getAllcategory();
                }
            },
            complete: () => {
            },
        })
    });

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
                    type: 'post',
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
    })
});

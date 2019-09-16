$(function () {
    $("#addCategoryForm").on("submit",  function(event) {
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
                    Swal.fire(
                        'Good job!',
                        'You clicked the button!',
                        'success'
                    );
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
            type: "get",
            dataType: "html",
            success: (data) => {
                $("#showAllcategory").html(data)
            },
        })
    }
});

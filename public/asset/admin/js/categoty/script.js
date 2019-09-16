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
                alert("Sending...........")
            },
            success: (data) => {
                if (data.name)
                {
                    $("#name").html(data.name);
                }else {
                    Swal.fire(
                        'Good job!',
                        'You clicked the button!',
                        'success'
                    )
                }
                console.log(data.name);
            },
            complete: () => {

            },
        })
    })
});

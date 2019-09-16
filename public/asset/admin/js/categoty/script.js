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
            success: () => {
                alert("Success...........")
            },
            complete: () => {
                alert("Complete...........")
            },
        })
    })
});

$(document).ready(function () {
    $("#form").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "/api/login",
            type: "POST",
            data: formData,
            success: function (data) {
                //onsuccess access the access_token and store it in local storage
                localStorage.setItem("access_token", data.access_token);
                window.location.href = "/home";
            },
            cache: false,
            contentType: false,
            processData: false,
        });
    });

    //#create-book form, on submit
    $("#create-book").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "/api/create-book",
            type: "POST",
            data: formData,
            headers: {
                Authorization: "Bearer " + localStorage.getItem("access_token"),
            },
            success: function (data) {
                window.location.href = "/home";
            },
            cache: false,
            contentType: false,
            processData: false,
        });
    });

    //#book-dropdown, fill the dropdown call api/list-book
    $.ajax({
        url: "/api/list-book",
        type: "GET",
        headers: {
            Authorization: "Bearer " + localStorage.getItem("access_token"),
        },
        success: function (data) {
            var dropdown = $("#book-dropdown");
            dropdown.empty();
            dropdown.append(
                '<option value="" disabled selected>Choose Book</option>'
            );
            $.each(data, function (key, entry) {
                dropdown.append(
                    $("<option></option>")
                        .attr("value", entry.id)
                        .text(entry.title)
                );
            });
        },
    });

    //onchange of #book-dropdown, fill the form with the book details
    $("#book-dropdown").change(function () {
        var book_id = $(this).val();
        $.ajax({
            url: "/api/get-book/?id=" + book_id,
            type: "GET",
            headers: {
                Authorization: "Bearer " + localStorage.getItem("access_token"),
            },
            success: function (data) {
                $("#edit-book input[name=id]").val(data.id);
                $("#edit-book input[name=title]").val(data.title);
                $("#edit-book input[name=author]").val(data.author);
                $("#edit-book input[name=isbn]").val(data.isbn);
                $("#edit-book input[name=year]").val(data.year);
            },
        });
    });

    //clear all input in #edit-book form
    $("#edit-book input").val("");

    //#edit-book form, on submit
    $("#edit-book").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "/api/edit-book",
            type: "POST",
            data: formData,
            headers: {
                Authorization: "Bearer " + localStorage.getItem("access_token"),
            },
            success: function (data) {
                window.location.href = "/home";
            },
            cache: false,
            contentType: false,
            processData: false,
        });
    });

    //#delete-book form, on submit
    
});

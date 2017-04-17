/**
 * Created by yura on 17.04.17.
 */
$(document).ready(function () { // Ждём загрузки страницы

    $(function () {
        $("#search").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "searchauthor/",
                    dataType: "json",
                    data: {
                        search: request.term,
                    },
                    success: function (data) {
                        if (data == "") $("#author-search-error").html("Nothing found");
                        else $("#author-search-error").html("");
                        response(data);
                    },
                    type: "POST",
                });
            },
            minLength: 2,
            delay: 250,
            select: function (event, ui) {
                $("#search").val(ui.item.value);
                $("#user_id").val(ui.item.id);
                return false;
            },
        });
    });
});
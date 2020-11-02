$(document).ready(function(){
    $("thead").on("click", function() {
        $(this).parents("table").find("tbody").toggle();
    });
});
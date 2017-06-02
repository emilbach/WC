$(function () {
    var tabName = $("[id*=TabName]").val() != "" ? $("[id*=TabName]").val() : "personal";
    $('#Tabs a[href="#' + tabName + '"]').tab('show');
    $("#Tabs a").click(function () {
        $("[id*=TabName]").val($(this).attr("href").replace("#", ""));
    });
});
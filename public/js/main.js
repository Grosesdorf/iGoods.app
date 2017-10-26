$(document).ready(function(){
    $("#program_id").val($("#program_name").find(":selected").attr("data-attr"));
    $("#merchant_email").val($("#merchant_category").find(":selected").attr("data-attr"));
    $("#program_name").change(function() {
        $("#program_id").val($("#program_name").find(":selected").attr("data-attr"));
    });
    $("#merchant_category").change(function() {
        $("#merchant_email").val($("#merchant_category").find(":selected").attr("data-attr"));
    });
});
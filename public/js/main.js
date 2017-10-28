$(document).ready(function(){
    $("#program_id").val($("#program_name").find(":selected").attr("data-attr"));
    $("#merchant_email").val($("#merchant_category").find(":selected").attr("data-attr"));
    $("#program_name").change(function() {
        $("#program_id").val($("#program_name").find(":selected").attr("data-attr"));
    });
    $("#merchant_category").change(function() {
        $("#merchant_email").val($("#merchant_category").find(":selected").attr("data-attr"));
    });

    $('.btn-delete').on('click', function() {

        var id = this.id;
        var token = $(this).attr('data-token');

        var confirm_delete = confirm('Таки да?');
        if(confirm_delete)
        {
              $.ajax({
                type: 'post',
                url: '/goods/'+ id,
                data: {_method: 'delete',  _token : token},
                success: function() {
                    $('#'+id).parent().parent().remove();
                }
            });
        }
    });
});

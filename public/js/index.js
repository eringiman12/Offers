

$(function(){

    $('#Add_Question_content').click(function() {
        $("#q_n1").clone().insertAfter("#q_n1").attr("id","q_n_b");
      });

});

function Bt_Hidden(id) {
    $('.main_box').hide();
    $('#' + id.replace('_bt', '')).show();
}

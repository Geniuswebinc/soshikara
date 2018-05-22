$(function() {

  //セレクトボックスが切り替わったら発動
  $('#select_food').change(function() {
    //値が変更されたときの処理
    var unit = $("#select_food option:selected").data("unit");
    var id = $(this).val();
    var input = "";
    if (unit == 1) {
        input = "<div class='col-xs-3'><label>量(個)</label><input type='number' name='quantity' step='0.5' min='0' class='form-control'></div> ";
    } else if (unit == 2) {
        input = "<div class='col-xs-3'><label>量(g)</label><input type='number' name='quantity' step='50' min='0' class='form-control'></div>  ";
    } else if (unit == 3) {
        input = "<div class='col-xs-3'><label>量(ml)</label><input type='number' name='quantity' step='10' min='0' class='form-control'></div>  ";
    }
    input += "<div class='col-xs-4'><label>期限</label><input type='date' name='limit_date' class='form-control'></div>";
    input += "<input type='hidden' name='id' value='" + id + "'>";
    $('#unit').html(input);
  });
});

function show_name_on_add_vacation_last_years(id){
       $("#user_id").val(id);
 return false;
}
function save_vacation_last_year_form(){
      $.ajax({
          type:"POST",
          url:"after_meeting.php",
          data:$("#vacation_last_year_form").serialize(),
          success:function(data){
            $(".close").trigger("click");

            if (data ==1) {
                 swal({
                        title: "Success",
                        icon: "success",
                        text: "บันทึกข้อมูลเรียบร้อย",
                        type: "success"})
                 .then(function() {
                 location.reload();
                });
            }else{
                 swal({
                        title: "Warning",
                        icon: "warning",
                        text: "ไม่สามารถบันทึกข้อมูลเรียบร้อย",
                        type: "warning"})
                 .then(function() {
                 location.reload();
                });
            }
          }
      });

  return false;


}


 $(function() {
   $("#datepicker").datepicker({ dateFormat: 'dd-mm-yy' });
 });
 $(function() {
   $("#datepicker2").datepicker({ dateFormat: 'dd-mm-yy' });
 });
 $(function() {
   $("#datepicker3").datepicker({ dateFormat: 'dd-mm-yy' });
 });


 $(function() {
    $("#day").change(function(){
        var johnamaty = $("#day").val();
       if (johnamaty == 3 ) {
              $("#field_minute").show();
       }else{
              $("#field_minute").hide();
              $("#minute").val('');
       }
    });
 });

// เลือก ประเภทมาโชว์ โมเดล
$(function(){
    $("#attendent_from").change(function(){
      var type_of_detail =$("#type_of_detail").val();
      var user_id_type_of_detail =$("#user_id_type_of_detail").val();
      var month_type_of_detail =$("#month_type_of_detail").val();
      info = [];
      info[0] = type_of_detail;
      info[1] = user_id_type_of_detail;
      info[2] = month_type_of_detail;
          $.ajax({
            type:'POST',
            url :'after_meeting.php',
            data:{johnatar_maty:info},
          success:function(data){
            $("#attendent_from2").html(data);
          }
          });


    });
});

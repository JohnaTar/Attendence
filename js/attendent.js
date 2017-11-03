
$(function(){
   $("#month").change(function(){
    var month =$(this).val();
    


            if (month !='') {          
                $.ajax({
                url: "attendent.php",
                data: "month=" + month,
                type: "POST",
      
                     success: function(data)  { 
                             $("#test").html(data);

                        }
                    });

            }else{

                alert('55');
        }
   });
});



function add_data(id){
     
    $.ajax({
        type:"POST",
        url:"attendent.php",
        data:{add_id:id},
        success:function(data){
              $("#data_form").html(data);
              $("#data_form2").html(data);
              $("#data_form3").html(data);
              $("#data_form4").html(data);
              $("#data_form5").html(data);
               $("#data_form6").html(data);
              






             

        }
    });
    return false;
}

 $(function() {
        $('#type').change(function(){
            $('.colors').hide();       
            $('#' + $(this).val()).show();


    });
});


function save_data(){

    var month =$("#month").val();
    $.ajax({
        type:"POST",
        url:"attendent.php",
        data:$("#data_save").serialize(),
        success:function(data){

           $(".close").trigger("click");
               if (data ==1) {
                 swal({
                        title: "Success",
                        icon: "success",
                        text: "บันทึกข้อมูลเรียบร้อย",
                        type: "success"});
            }else{

                 swal({
                        title: "Warning",
                        icon: "warning",
                        text: "ไม่สามารถบันทึกข้อมูลเรียบร้อย",
                        type: "warning"});
            }

            if (month !='') {          
                $.ajax({
                url: "attendent.php",
                data: "month=" + month,
                type: "POST",
      
                     success: function(data)  { 
                             $("#test").html(data);

                        }
                    });

            }
                 
            
        }
    });
    return false;
}


function save_data2(){

    var month =$("#month").val();
    $.ajax({
        type:"POST",
        url:"attendent.php",
        data:$("#data_save2").serialize(),
        success:function(data){



           $(".close").trigger("click");


             if (data ==1) {
                 swal({
                        title: "Success",
                        icon: "success",
                        text: "บันทึกข้อมูลเรียบร้อย",
                        type: "success"});
            }else{

                 swal({
                        title: "Warning",
                        icon: "warning",
                        text: "ไม่สามารถบันทึกข้อมูลเรียบร้อย",
                        type: "warning"});
            }

            if (month !='') {          
                $.ajax({
                url: "attendent.php",
                data: "month=" + month,
                type: "POST",
      
                     success: function(data)  { 
                             $("#test").html(data);

                        }
                    });

            }
                 
            
        }
    });
    return false;
}

function save_data3(){

    var month =$("#month").val();
    $.ajax({
        type:"POST",
        url:"attendent.php",
        data:$("#data_save3").serialize(),
        success:function(data){



           $(".close").trigger("click");

           
              if (data ==1) {
                 swal({
                        title: "Success",
                        icon: "success",
                        text: "บันทึกข้อมูลเรียบร้อย",
                        type: "success"});
            }else{

                 swal({
                        title: "Warning",
                        icon: "warning",
                        text: "ไม่สามารถบันทึกข้อมูลเรียบร้อย",
                        type: "warning"});
            }

            if (month !='') {          
                $.ajax({
                url: "attendent.php",
                data: "month=" + month,
                type: "POST",
      
                     success: function(data)  { 
                             $("#test").html(data);

                        }
                    });

            }
                 
            
        }
    });
    return false;
}

/* #######################ลากิจ#################################*/
function save_data4(){

    var month =$("#month").val();
    $.ajax({
        type:"POST",
        url:"attendent.php",
        data:$("#data_save4").serialize(),
        success:function(data){



           $(".close").trigger("click");
               if (data ==1) {
                 swal({
                        title: "Success",
                        icon: "success",
                        text: "บันทึกข้อมูลเรียบร้อย",
                        type: "success"});
            }else{

                 swal({
                        title: "Warning",
                        icon: "warning",
                        text: "ไม่สามารถบันทึกข้อมูลเรียบร้อย",
                        type: "warning"});
            }

            if (month !='') {          
                $.ajax({
                url: "attendent.php",
                data: "month=" + month,
                type: "POST",
      
                     success: function(data)  { 
                             $("#test").html(data);

                        }
                    });

            }
                 
            
        }
    });
    return false;
}

function save_data5(){

    var month =$("#month").val();
    $.ajax({
        type:"POST",
        url:"attendent.php",
        data:$("#data_save5").serialize(),
        success:function(data){



           $(".close").trigger("click");
               if (data ==1) {
                 swal({
                        title: "Success",
                        icon: "success",
                        text: "บันทึกข้อมูลเรียบร้อย",
                        type: "success"});
            }else{

                 swal({
                        title: "Warning",
                        icon: "warning",
                        text: "ไม่สามารถบันทึกข้อมูลเรียบร้อย",
                        type: "warning"});
            }

            if (month !='') {          
                $.ajax({
                url: "attendent.php",
                data: "month=" + month,
                type: "POST",
      
                     success: function(data)  { 
                             $("#test").html(data);

                        }
                    });

            }
                 
            
        }
    });
    return false;
}

function save_data6(){

    var month =$("#month").val();
    $.ajax({
        type:"POST",
        url:"attendent.php",
        data:$("#data_save6").serialize(),
        success:function(data){



           $(".close").trigger("click");
               if (data ==1) {
                 swal({
                        title: "Success",
                        icon: "success",
                        text: "บันทึกข้อมูลเรียบร้อย",
                        type: "success"});
            }else{

                 swal({
                        title: "Warning",
                        icon: "warning",
                        text: "ไม่สามารถบันทึกข้อมูลเรียบร้อย",
                        type: "warning"});
            }

            if (month !='') {          
                $.ajax({
                url: "attendent.php",
                data: "month=" + month,
                type: "POST",
      
                     success: function(data)  { 
                             $("#test").html(data);

                        }
                    });

            }
                 
            
        }
    });
    return false;
}

function get_show_attendent(id){
     
    var month =$("#month").val();
info = [];
info[0] = id;
info[1] = month;
    $.ajax({
        type:"POST",
        url:"attendent.php",
        data:{attendent:info},
        success:function(data){

       
             $("#attendent_from").html(data);
         
              






             

        }
    });
    return false;
}

$(function(){
   $("#date_absence2").change(function(){
    var date_absence2 =$(this).val();
    var date_absence1 =$("#date_absence1").val();
     
  from = moment(date_absence1, 'YYYY-MM-DD'); // format in which you have the date
  to = moment(date_absence2, 'YYYY-MM-DD');     // format in which you have the date
  
  /* using diff */
  duration = to.diff(from, 'days')     
  
  /* show the result */
  if (duration >=1) {
        $("#alert").html("");
  }else if (duration < 0) {
      $("#alert").html("<font color = 'red'>กรุณากรอกวันที่ให้ถูกต้อง</font>");
  }else if (date_absence2 =="") {
      $("#alert").html("");
  }

       $('#rank2').val(duration);  
   });
});

$(function(){
   $("#date_sick2").change(function(){
    var date_sick2 =$(this).val();
    var date_sick1 =$("#date_sick1").val();
     
  from = moment(date_sick1, 'YYYY-MM-DD'); // format in which you have the date
  to = moment(date_sick2, 'YYYY-MM-DD');     // format in which you have the date
  
  /* using diff */
  duration = to.diff(from, 'days')     
  
  /* show the result */
  if (duration >=1) {
        $("#alert2").html("");
  }else if (duration < 0) {
      $("#alert2").html("<font color = 'red'>กรุณากรอกวันที่ให้ถูกต้อง</font>");
  }else if (date_absence2 =="") {
      $("#alert2").html("");
  }

       $('#rank3').val(duration);  
   });
});

$(function(){
   $("#date_errand2").change(function(){
    var date_errand2 =$(this).val();
    var date_errand1 =$("#date_errand1").val();
     
  from = moment(date_errand1, 'YYYY-MM-DD'); // format in which you have the date
  to = moment(date_errand2, 'YYYY-MM-DD');     // format in which you have the date
  
  /* using diff */
  duration = to.diff(from, 'days')     
  
  /* show the result */
  if (duration >=1) {
        $("#alert3").html("");
  }else if (duration < 0) {
      $("#alert3").html("<font color = 'red'>กรุณากรอกวันที่ให้ถูกต้อง</font>");
  }else if (date_absence2 =="") {
      $("#alert3").html("");
  }

       $('#rank4').val(duration);  
   });
});

$(function(){
   $("#date_Exerrand2").change(function(){
    var date_Exerrand2 =$(this).val();
    var date_Exerrand1 =$("#date_Exerrand1").val();
     
  from = moment(date_Exerrand1, 'YYYY-MM-DD'); // format in which you have the date
  to = moment(date_Exerrand2, 'YYYY-MM-DD');     // format in which you have the date
  
  /* using diff */
  duration = to.diff(from, 'days')     
  
  /* show the result */
  if (duration >=1) {
        $("#alert4").html("");
  }else if (duration < 0) {
      $("#alert4").html("<font color = 'red'>กรุณากรอกวันที่ให้ถูกต้อง</font>");
  }else if (date_absence2 =="") {
      $("#alert4").html("");
  }

       $('#rank5').val(duration);  
   });
});

$(function(){
   $("#date_ext2").change(function(){
    var date_ext2 =$(this).val();
    var date_ext1 =$("#date_ext1").val();
     
  from = moment(date_ext1, 'YYYY-MM-DD'); // format in which you have the date
  to = moment(date_ext2, 'YYYY-MM-DD');     // format in which you have the date
  
  /* using diff */
  duration = to.diff(from, 'days')     
  
  /* show the result */
  if (duration >=1) {
        $("#alert5").html("");
  }else if (duration < 0) {
      $("#alert5").html("<font color = 'red'>กรุณากรอกวันที่ให้ถูกต้อง</font>");
  }else if (date_absence2 =="") {
      $("#alert5").html("");
  }

       $('#rank6').val(duration);  
   });
});
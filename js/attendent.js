
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
          var tatar =  $('#type').val();
          if (tatar ==1) {
            $('.colors').hide();
            $('#1').show();
          }else if (tatar ==3){
            $('.colors').hide();
            $('#4').show();
          }else if(tatar ==2){
            $('.colors').hide();
            $('#3').show();
          }else{
            $('.colors').hide();
            $('#2').show();


          $('#likeamp').val(tatar);


}

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
/* #######################ลากิจ#################################*/


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

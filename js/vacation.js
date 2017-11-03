function add_vacation(id){
    $.ajax({
        type:"POST",
        url:"process.php",
        data:{show_user_id:id},
        success:function(data){
            $("#add_form").html(data);
        }
    });
    return false;
}

function save_vacation(){
    $.ajax({
        type:"POST",
        url:"process.php",
        data:$("#edit_user_form").serialize(),
        success:function(data){
            
            //close modal
            $(".close").trigger("click");
            
            //show result
                 
            
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

function add_user_form(){
    $.ajax({
        type:"POST",
        url:"process.php",
        data:$("#add_user_form").serialize(),
        success:function(data){
            
            //close modal
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
            //show result          
       
            
            
            //reload page
            
        }
    });
    return false;
}


function get_show_vacation(id){
    $.ajax({
        type:"POST",
        url:"process.php",
        data:{show_vacation:id},
        success:function(data){
            $("#vacation_from").html(data);
        }
    });
    return false;
}
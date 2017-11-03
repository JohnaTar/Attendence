<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include ('nav.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Forms</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="fn">ชื่อ นามสกุล</label>  
                        <div class="col-md-4">
                    <input name="stwFirstname" type="text" placeholder="Firstname : Lastname" class="form-control input-md" required="" value="">
    
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="fn">วันเริ่มงาน</label>  
                        <div class="col-md-4">
                    <input name="stwFirstname" type="date" placeholder="Firstname" class="form-control input-md" required="" value="">
    
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label" for="selectbasic">แผนก</label>
                        <div class="col-md-4">
                    <select  name="stwDept_id" class="form-control input-md" required="">
                        <option value="">  </option>
                         <option value="1"> ฝ่ายบริหาร </option>
                         <option value="2"> PA & Marketing </option>
                         <option value="3"> ฝ่ายบัญชีและการเงิน </option>
                         <option value="4"> ฝ่ายบุคคลและธุรการ </option>
                         <option value="5"> Staff & Labor Outsourcing BKK </option>
                         <option value="6"> Staff & Labor Outsourcing CHON </option>
                         <option value="7"> Staff & Labor Outsourcing PTY </option>
  
                    </select>
                  
                        </div>
                    </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
            <button id="btnSubmit" name="submit" class="btn btn-primary" ><i class="fa fa-floppy-o " aria-hidden="true"></i></button>
                </div>
            </div>
             
                  


                </form>


            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

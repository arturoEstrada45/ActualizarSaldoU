<?php
$cuenta=$_REQUEST['cuenta'];
$almacen=$_REQUEST['grupo'];
 
$serverName = "192.168.1.5";
$connectionInfo = array( "Database"=>"V6INTER", "UID"=>"sa", "PWD"=>"Int3r_Cart0n.");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
$sql = "SELECT * FROM saldou WHERE cuenta='$cuenta' AND rama='RESV' and grupo='$almacen'";
$stmt = sqlsrv_query( $conn, $sql );

 while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
   $saldoU=$row['SaldoU'];
   $rama=$row["Rama"];
     } 


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Actualización SaldoU</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
<script>
alert("Ten cuidado con los cambios que hagas");
</script>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                        <img src="../img/infoService.jpg" width="430" height="515">
                    </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Cuenta <?php echo $cuenta?></h1>
                                        <h1 class="h4 text-gray-900 mb-2">Alamcen:</h1>
                                        <p class="mb-4"><?php echo $almacen ?></p>
                                        <h1 class="h4 text-gray-900 mb-2">Rama: </h1>
                                        <p class="mb-4"><?php echo $rama ?></p>
                                        <h1 class="h4 text-gray-900 mb-2">SaldoU: </h1>
                                        <p class="mb-4"><?php echo $saldoU ?></p>
                                        
                                        
                                    </div>
                                    
                                    <div class="text-center">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="text-gray-400"></i>
                                    Cambiar SaldoU
                                </a>
                                    </div>
                                
                                    <div class="text-center">
                                        <a class="small" href="servicios.php?correo=<?php echo $correo ?>">Regresar a los servicios</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reservar o Desreservar</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="../php/desreservar.php" method="POST" id="updateUser">
                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <p class="mb-4">Cambio SaldoU</p>
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="saldouCambio" name="saldouCambio" value="<?php echo $saldoU?>"
                                            placeholder="ingresa número" pattern="[0-9]{1,35}" required data-toggle="tooltip" title="Solo ingresa numeros">
                                            
                                            <input hidden type="text" class="form-control form-control-user" id="cuenta" name="cuenta" value="<?php echo $cuenta?>"
                                            placeholder="ingresa número"  >

                                            <input hidden type="text" class="form-control form-control-user" id="almacen" name="almacen" value="<?php echo $almacen?>"
                                            placeholder="ingresa número">
                                    </div>
                </div>                           
                    </form>
                
    </div>
                <div class="modal-footer"> 
                <button class="btn btn-primary" type="submit" name="reservar" form="updateUser">Reservar</button>
                    <button class="btn btn-success" type="submit" name="desreservar" form="updateUser">Desreservar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                    </div>
            </div>
        </div>
    </div>
    </div>
    
   <!-- Bootstrap core JavaScript-->
   <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>

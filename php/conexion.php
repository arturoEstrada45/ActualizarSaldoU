<?php



if (isset($_POST['busca'])){
    
$cuenta = $_POST['cuenta'];
$almacen = $_POST['almacen'];
$serverName = "192.168.1.5";
$connectionInfo = array( "Database"=>"V6INTER", "UID"=>"sa", "PWD"=>"Int3r_Cart0n.");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}
$contador=0;
$sql = "SELECT * FROM saldou WHERE cuenta='$cuenta' AND rama='RESV' and grupo='$almacen'";
$stmt = sqlsrv_query( $conn, $sql );
$total=sqlsrv_num_rows($stmt);
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      $contador=$contador+1;
      $cuenta1=$row['Cuenta'];
      $almacen1=$row['Grupo'];
  }

    //header('location: ../vistas/index.php');
  
if($contador==1){
   echo $contador;
    
          header('location: ../vistas/muestraInfo.php?cuenta='.$cuenta1.'&grupo='.$almacen);
    
}
else{
    header('location: ../vistas/index.php');
}

   


sqlsrv_free_stmt($stmt);
}


?>

<?php
if (isset($_POST['reservar'])){

$cuenta = $_POST['cuenta'];
$almacen = $_POST['almacen'];
$saldo = $_POST['saldouCambio'];
echo $saldo;
$serverName = "192.168.1.5";
$connectionInfo = array( "Database"=>"V6INTER", "UID"=>"sa", "PWD"=>"Int3r_Cart0n.");
$conn = sqlsrv_connect( $serverName, $connectionInfo );


if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}
$sql = "SELECT * FROM saldou WHERE cuenta='$cuenta' AND rama='RESV' and grupo='$almacen'";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
    $real=$row['SaldoU'];    
}
$resultado=$real+$saldo;

$sql = "update saldou set saldou='$resultado' where cuenta='$cuenta' AND rama='RESV' and grupo='$almacen'";
$stmt = sqlsrv_query( $conn, $sql );

sqlsrv_free_stmt($stmt);
header('location: ../vistas/muestraInfo.php?cuenta='.$cuenta.'&grupo='.$almacen);
}elseif (isset($_POST['desreservar'])){

    $cuenta = $_POST['cuenta'];
    $almacen = $_POST['almacen'];
    $saldo = $_POST['saldouCambio'];
    echo $saldo;
    $serverName = "192.168.1.5";
    $connectionInfo = array( "Database"=>"V6INTER", "UID"=>"sa", "PWD"=>"Int3r_Cart0n.");
    $conn = sqlsrv_connect( $serverName, $connectionInfo );
    
    
    if( $conn === false ) {
        die( print_r( sqlsrv_errors(), true));
    }
    $sql = "SELECT * FROM saldou WHERE cuenta='$cuenta' AND rama='RESV' and grupo='$almacen'";
    $stmt = sqlsrv_query( $conn, $sql );
    if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
    }
    
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        $real=$row['SaldoU'];    
    }
    $resultado=$real-$saldo;
    
    $sql = "update saldou set saldou='$resultado' where cuenta='$cuenta' AND rama='RESV' and grupo='$almacen'";
    $stmt = sqlsrv_query( $conn, $sql );
    
    sqlsrv_free_stmt($stmt);
    header('location: ../vistas/muestraInfo.php?cuenta='.$cuenta.'&grupo='.$almacen);
    }

?>
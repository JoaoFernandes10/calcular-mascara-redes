<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='../../css/estilo.css'/>
</head>
<body>
<?php
require_once '../../php/funcoes/datas.php';
$host = isset ( $_POST ['host'] ) ? $_POST ['host'] : '';
$mascara = hosts_mascara ( $host );
$ip = isset($_POST['ip'])?$_POST['ip']:'IP';
include '../../template/host.php';
?>
</body>
</html>
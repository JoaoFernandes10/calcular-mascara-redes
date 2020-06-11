<?php
require_once 'se_guran_ca/ph-p/funcoes.php';
try{
	$pdo = new PDO('mysql:host=localhost;dbname=cgrinfo','usuario','senha');
}catch (PDOException $ex){
	echo $ex->getMessage();
}
$stmt = $pdo->prepare("SELECT * FROM usuario;");
$stmt->execute();
//$stmt->fetchAll(PDO::FETCH_ASSOC);

if ($stmt->rowCount()):
	//logar($stmt->fetchAll(PDO::FETCH_ASSOC)[0]['nome']);
endif;

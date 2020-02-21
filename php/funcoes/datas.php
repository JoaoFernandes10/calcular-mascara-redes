<?php
/*
 * @Autor: Joao Carlos Fernandes
 * @Email: joao43013@gmail.com
 * Data: 28/04/2019
 */
require_once 'validacao.php';
$tab = Array ( // vetor usado nas seguintes funcoes: decimal_binario(), binario_decimal().
		1 => 128,
		2 => 64,
		3 => 32,
		4 => 16,
		5 => 8,
		6 => 4,
		7 => 2,
		8 => 1 
);
function decimal_binario($decimal) { // parametro $decimal recebe obrigatoriamente uma string com numero maior ou igual a 0 e menor ou igual a 255
	global $tab; // ganho acesso ao vetor tab
	             // Validar parametro $decimal, para que so seje aceito valor decimal >= 0 e <= 255
	if (validar_decimal ( $decimal ) == 1) :
		$binario = [ ]; // valor de retorno da funcao
		for($i = 1; $i <= 8; $i ++) { // loop para percorrer vetor tab, a variavel $i E usada como indice para o vetor binario
			if ($decimal >= $tab [$i]) { // se o valor do vetor tab no indice $i for maior ou igual a valor de decimal,
				$binario [$i] = '1'; // preciso adicionar o valor 1 no vetor binario no mesmo indice do vetor tab,
				$decimal -= $tab [$i]; // no final retorno o vetor binario
			} else { // senao adiciono o valor 0 no binario, no mesmo indice do vetor tab
				$binario [$i] = '0';
			}
		}
		unset ( $decimal ); // $decimal e $i nao sera mais usadas
		unset ( $i );
	 else :
		$binario = "ERRO";
		// se o valor do parametro decimal nao é valido entao retorno uma variavel $binario com valor ERRO
	endif;
	return $binario;
}

function binario_decimal($binario) { // parametro binario recebe uma string com os oitos digitos binarios
	global $tab; // ganho acesso ao vetor tab
	if (strlen ( $binario ) == 8) : // validar parametro $bianrio parte1
		$decimal = 0; // decimal vai receber $decimal += valor numerico, portanto inicializo com valor zero
		for($i = 0; $i <= 7; $i ++) { // loop para percorrer string $binario recebido como parametro, variavel $i E usada como indice do vetor tab
			if (($binario [$i] > 1) || ($binario [$i] < 0) || ($binario [$i] != 1) && ($binario [$i] != 0)) : // validar parametro $binario ultima parte
				$decimal = "ERRO"; // se parametro binario nao for validado na ultima parte, entao decimal recebe erro
				break;
			 else :
				if ($binario [$i] == 1) : // se bianrio é um valor valido,
					$decimal += $tab [$i + 1]; // variavel decimal recebe valor do vetor tab onde o indice seja igual o indice da string binario
				endif;
			endif;
		}
		unset ( $i ); // variaveis $i e parametro $binario nao sera mais usadas
		unset ( $binario );
	 else : // se binario nao é valido entao decimal recebe erro
		$decimal = "ERRO";
	endif;
	return $decimal; // retorno a variavel com o valor de decimal, finalizando a funcao
}

function barra_decimal($barra) { // se receber 29, retorna 255.255.255.248
	$mascara = '';
	$mr = '';
	if (($barra >= 0) && ($barra <= 32)) :
		for($i = 1; $i <= 32; $i ++) {
			if ($i <= $barra) {
				$mascara .= '1';
			} else {
				$mascara .= '0';
			}
			if ($i < 32) {
				if ($i % 8 == 0) {
					$mascara .= '.';
				}
			}
		}
		$masc = explode ( '.', $mascara );
		for($i = 0; $i <= 3; $i ++) {
			$mr .= binario_decimal ( $masc [$i] );
			if ($i < 3) {
				$mr .= '.';
			}
		}
		unset ( $barra );
		unset ( $mascara );
		unset ( $masc );
		unset ( $i );
	 else :
		$mr = "ERRO";
	endif;
	return $mr;
}

function decimal_barra($decimal) { // se receber 255.255.255.248, retorna 29
	$masc = explode ( '.', $decimal );
	if (validar_mascara ( $decimal )) {
		$mascara = 0;
		$binario = '';
		for($i = 0; $i <= 3; $i ++) {
			for($j = 1; $j <= 8; $j ++) {
				$binario .= decimal_binario ( $masc [$i] ) [$j];
			}
		}
		for($i = 0; $i < 32; $i ++) {
			if ($binario [$i] == 0) {
				break;
			} else {
				$mascara ++;
			}
		}
	} else {
		$mascara = "ERRO";
	}
	return $mascara;
}

function mascara_hosts($mascara) {
	if (strlen ( $mascara ) > 2) :
		$n = 32 - decimal_barra ( $mascara );
		// mascara decimal
	elseif (($mascara >= 0) && ($mascara <= 32)) :
		$n = 32 - $mascara;
	 else :
		return "ERRO";
	endif;
	$tot_hosts = (2 ** $n) - 2;
	return $tot_hosts;
}

function hosts_mascara($host) {
	$host += 2;
	$n = 0;
	$i = 1;
	while ($i < $host){
		$i *= 2;
		$n++;
	}
	$mascara = 32 - $n;
	$r=[];
	$r['mascara_decimal']=barra_decimal($mascara);
	$r['cidr'] = 'IP/'.$mascara;
	$r['total_host'] = mascara_hosts($mascara);
	$r['sobra_host'] = $r['total_host']-($host-2);
	return $r;
}

function mascara_ip($cidr){
	$retorno = [];
	$host = mascara_hosts(explode('/',$cidr)[1]);
	
	return $retorno;
}

function ip_mascara($ip_inicio,$ip_final){
	
}
print_r(mascara_hosts(1));


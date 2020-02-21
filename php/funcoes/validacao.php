<?php
function val_tam_masc($mascara) {
	$t = explode ( '.', $mascara );
	$v = 0;
	if (count ( $t ) == 4) {
		$v = 1;
	} else {
		$v = 0;
	}
	for($i = 0; $i < count ( $t ); $i ++) {
		if ($t [$i] == '') {
			$v = 0;
		}
	}
	unset ( $mascara );
	unset ( $t );
	return $v;
}
function val_zero_masc($mascara) {
	$masc = explode ( '.', $mascara );
	if (($masc [0] == 255) && ($masc [1] == 255) && ($masc [2] == 255) && ($masc [3] == 255)) {
		return 1;
	}
	$v = 0;
	if ($masc [0] == 0) :
		return $v;
	endif;
	if (($masc [0] == 255) && ($masc [1] == 255) && ($masc [2] == 255) && ($masc [3] < 255)) {
		return 1;
	}
	for($i = 0; $i <= 2; $i ++) {
		$j = 3;
		while ( $j > $i ) {
			if (($masc [$i] < 255) || ($masc [$i] == 0)) {
				if ($masc [$j] == 0) {
					$v = 1;
				} else {
					unset ( $masc );
					unset ( $v );
					unset ( $i );
					unset ( $j );
					return 0;
				}
			}
			$j --;
		}
	}
	unset ( $masc );
	unset ( $i );
	unset ( $j );
	return $v;
}
function val_num_masc($mascara) {
	$masc = explode ( '.', $mascara );
	$v = 0;
	$m = 0;
	for($i = 7; $i >= 0; $i --) {
		$m += 2 ** $i;
		for($j = 0; $j <= 3; $j ++) {
			if ($masc [$j] == $m) {
				$v ++;
			}
		}
	}
	for($i = 0; $i <= 3; $i ++) {
		if ($masc [$i] == 0) {
			$v ++;
		}
	}
	unset ( $masc );
	unset ( $m );
	unset ( $i );
	unset ( $j );
	if ($v == 4) :
		return 1;
	 else :
		return 0;
	endif;
}
function validar_mascara($mascara) {
	if ((val_tam_masc ( $mascara ) == 1) && (val_zero_masc ( $mascara ) == 1) && (val_num_masc ( $mascara ) == 1)) {
		return 1;
	} else {
		return 0;
	}
}
function validar_decimal($decimal) { // validar parametro decimal, baseando, maior ou igual a 0 e menor ou igual a 255
	$valido = 0; // por padarao decimal E invalido, ate que fique provado o contrario
	if ($decimal < 0 || $decimal > 255) { // se decimal for menor que 0 ou maior que 255 decimal é invalido
		unset ( $decimal ); // $decimal ja nao E mais necesario
		return $valido; // finalizo a funcao retornando 0, representando $decimal E invalido
	}
	if ((strlen ( $decimal ) == 0) || (strlen ( $decimal ) > 3)) { // se decimal conter mais de 3 digitos ou nao tiver digito $decimal E invalido
		unset ( $decimal ); // $decimal ja nao E mais necesario
		return $valido; // finalizo a funcao retornando 0, representando $decimal E invalido
	}
	if (strlen ( $decimal ) == 1) { // se decimal conter um digito, se verdadeiro, esse sera o unico bloco executado no fim da funcao retorna $valido
		for($i = 0; $i <= 9; $i ++) { // loop de 0 a 9, pois sao esses os valores validos para o primeiro digito
			if ("$i" === $decimal [0]) { // se a string $i for identica ao valor da string decimal no indice 0,
				$valido = 1; // valido recebe 1, representando $decimal E valido
			}
		}
	} elseif (strlen ( $decimal ) == 2) { // se decimal conter dois digitos, entao esse sera o unico bloco a ser executado no fim da funcao retorna $valido
		for($i = 0; $i <= 1; $i ++) { // loop de 0 a 1, representando os dois digitos da string $decimal
			for($j = 0; $j <= 9; $j ++) { // loop de 0 a 9, pois sao esses os valores validos para os dois digitos
				if ("$j" === $decimal [$i]) { // se os dois digitos de $decimal, for numero maior ou igual a 0 e menor ou igual a 9,
					$valido += 1; // valido incrementa, representando digito valido
				}
			}
		}
		if ($valido == 2) { // se valido foi incrementado duas vezes,
			$valido = 1; // entao valido recebe 1, representando que $decimal E valido
		} else { // se valido nao foi incrementado duas vezes,
			$valido = 0; // entao um dos digitos nao é um numero e valido recebe 0, representado $decimal E invalido
		}
	} else { // senao decimal tem tres digitos
		for($i = 0; $i <= 2; $i ++) { // loop para percorrer os 3 digitos de $decimal
			for($j = 0; $j <= 9; $j ++) { // valores validos para os tres digitos, pois se o terceiro digito for maior que 2, executa o primeiro bloco if e $decimal seria invalido
				if ("$j" === $decimal [$i]) { // se os tres digitos for maior ou igual a 0 e menor que 9,
					$valido += 1; // entao valido incrementa, representando digito valido
				}
			}
		}
		if ($valido == 3) { // se valido foi incrementado 3 vezes
			$valido = 1; // valido recebe 1, representando $decimal valido
		} else { // senao entao pelo menos um digito nao E valido
			$valido = 0; // nesse caso valido recebe 0, representaedo $decimal E invalido
		}
	}
	unset ( $i ); // variaveis $i, $j e parametro $decimal nao sera mais utilizados
	unset ( $j );
	unset ( $decimal );
	return $valido; // retorna 0 ou 1, 0 = $decimal invalido, 1 $decimal valido
}

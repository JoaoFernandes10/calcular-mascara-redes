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
	unset($mascara);
	unset($t);
	return $v;
}

function val_zero_masc($mascara) {
	$masc = explode ( '.', $mascara );
	$v = 0;
	if ($masc [0] == 0) :
		return $v;
	endif;
	if(($masc[0]==255)&&($masc[1]==255)&&($masc[2]==255)&&($masc[3]<255)){
		return 1;
	}
	for($i = 0; $i <= 2; $i ++) {
		$j = 3;
		while ( $j > $i ) {
			if (($masc [$i] < 255) || ($masc [$i] == 0)) {
				if ($masc [$j] == 0) {
					$v = 1;
				} else {
					unset($masc);
					unset($v);
					unset($i);
					unset($j);
					return 0;
				}
			}
			$j --;
		}
	}
	unset($masc);
	unset($i);
	unset($j);
	return $v;
}

function val_num_masc($mascara) {
	$masc = explode ( '.', $mascara );
	$v = 0;
	$m = 0;
	for($i = 7; $i >= 0; $i --) {
		$m += 2 ** $i;
		for($j = 0; $j <= 3; $j ++) {
			if($masc[$j]==$m){
				$v++;
			}
		}
	}
	for($i=0;$i<=3;$i++){
		if($masc[$i]==0){
			$v++;
		}
	}
	unset($masc);
	unset($m);
	unset($i);
	unset($j);
	if($v==4): return 1;
	else: return 0;
	endif;
}

function validar_mascara($mascara){
	if((val_tam_masc($mascara)==1)&&(val_zero_masc($mascara)==1)&&(val_num_masc($mascara)==1)){
		return 1;
	}else{
		return 0;
	}
}

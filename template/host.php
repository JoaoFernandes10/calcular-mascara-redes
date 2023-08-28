<?php
/*
echo "<div id='info'>";
echo "<span >Mascara de Rede: </span>";
echo "<span >CIDR: </span>";
echo "<span >Total de Hosts: </span>";
echo "<span >Hosts restante: </span>";
echo "</div>";

echo "<div id='val'>";
echo "<span >".$mascara['mascara_decimal']."</span>";
echo "<span >".$ip."/".explode('/',$mascara['cidr'])[1]."</span>";
echo "<span >".$mascara['total_host']."</span>";
echo "<span >".$mascara['sobra_host']."</span>";
echo "</div>"; */
?>
<div id='info'>
	<span>Mascara de Rede: </span>
	<span>CIDR: </span>
	<span>Total de Hosts: </span>
	<span>Hosts Restantes: </span>
</div>
<div id='val'>
	<span><?php echo $mascara['mascara_decimal']; ?></span>
	<span><?php echo $mascara['cidr']; ?></span>
	<span><?php echo $mascara['total_host']; ?></span>
	<span><?php echo $mascara['sobra_host']; ?></span>
</div>
<?php

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
echo "</div>";

?>
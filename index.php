<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'/>
        <title>Central Gerenciamento de Redes</title>
        <script async='async' src=''></script>
        <link rel='stylesheet' href='css/estilo.css'/>
    </head>
    <body> 
        <div id='content'>
        	<!-- receber do usuario um numero desejado de host, deveolver a mascara-->
        	<form action='php/scripts/main.php' method='post'>
            	<label for='host'>Hosts: </label>
            	<input type='text' name='host' id='host' placeholder='Quantos Hosts?' disabled='disabled' /><br/>
            	<label for='id'>Digite o IP: </label>
            	<input type='text' name='ip' id='ip' placeholder='Digite o IP' disabled='disabled'/><br/>
            	<input type='submit' value='Calcular Mascara'  disabled='disabled'/>
            </form>
            <p style='color: red; font-size: 20px; width: 300px; margin: 0 auto;'>
           		suporte a calculos de Redes de computadores indisponivel.
            </p>
        </div>
    </body>
</html>
<html>
<head>
	<title> Exemplo de um formulário WEB com Upload de arquivo </title>
</head>
<body>
<table border="0" cellpadding="3" cellspacing="0" width "100%">
	<tr>
		<td height="30" bgcolor="#8CDAFF">
		<b> Upload de Arquivo - Resultado </b>
		</td>
		<td align="right" bgcolor="#8CDAFF">
		 <?=date("d-m-Y H:i:s")?>&nbsp;
		</td>	
	</tr>
</table>

<?php 
 // 1º - Definir os parâmetros de teste
$tamanho_maximo = 100000; //em bytes
$typos_aceitos = array ("image/gif", "image/jpeg", "image/x-ng", "image/bmp");
// 2º - validar o arquivo enviado
// a variável global $_FILES conterá toda a informação do arquivo enviado.
// Note que $_FILES assume o nome do arquivo enviado ARQUIVO
//Variável $arquivo recebe os parametros ARQUIVO de $_FILES
$arquivo = $_FILES ['ARQUIVO'];
if ($arquivo['error'] != 0) { //caso arquivo não tenha sido enviado
	echo '<p><b><font color="red>Erro no Upload do arquivo<br>';
	//tratamento de possíveis erros do envio do arquivo
	switch ($arquivo['erro']) {
		case UPLOAD_ERR_INI_SIZE:
			echo 'O Arquivo excede o tamanho máximo permitido';
			break;
		case UPLOAD_ERR_FORM_SIZE:
			echo 'O arquivo enviado é muito grande';
			break;
		case UPLOAD_ERR_PARTIAL: 
			echo 'O upload não foi completo';
			break;
		case UPLOAD_ERR_NO_FILE:
			echo 'Nenhum arquivo foi informado para upload';
			break;
		}
		echo '</font></b></p>';
		exit;
	}

	if ($arquivo['size'] == 0 OR $arquivo['tmp name'] == NULL) {
		echo '<p><b><font color = "red"> Nenhhum arquivo enviado'
		'</font></b></p>';
		exit;
	}
	if ($arquivo['size']>$tamanho_maximo) {
		echo '<p><b><font color="red">O arquivo é muito grande 
		  (Tamanho Máximo = ' . $tamanho_maximo . '</fonte></b></p>';
		  	exit;
		  }
	if (array_seach($arquivo['type'],$tipos_aceitos) ===FALSE) {
		echo '<p><b><font color="red">O Arquivo enviado não é do tipo ('.
			$arquivo['type'] . ') aceito 				para upload.
  			Os tipos aceitos são:   </font></b></p>';
  		echo '<pre>';
  		prin$tipos_aceitos);
		echo '</pre>';
		exit;
	}
// O arquivo é enviado para uma pasta pré-definida.	  
}
$destino = 'C:\\Program Files (x86\\EasyPHP-Devserver-17\\eds-ww\\Upload\\arquivos_upload\\' . $arquivo ['name'];
if (move_uploaded_file($arquivo['tmp_name'], $destino)) {
	//tudo ok, mostramos os dados
	echo '<p><font color="navy"><b>';
	echo 'O arquivo foi carregado com sucesso! </b></font></p>';
	echo "<img src='$destino' border=0>";
} 
else {
 echo '<p><b><font color"red">Ocorreu um durante o upload </font></b></p>';
}
?>
</body>
</html>	 

<!-- Paloma Rangel - 2º Info B - Noturno - ETEC ZL -->
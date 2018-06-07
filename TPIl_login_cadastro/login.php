<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta charset="utf-8">
</head>
<body>
	<center>
	<table>
	<form action="validarlogin.php" method="POST" id="login">
			<tr>
				<td><label>Selecione:</label></td>
				<td>
					<input type="radio" name="t" value="funcionario"><label>Funcionário</label><br/>
					<input type="radio" name="t" value="cliente"><label>Cliente</label><br/>
    				<input type="radio" name="t" value="fornecedor"><label>Fornecedor</label><br/>
				</td>
			</tr>
			<tr>
				<td><label>ID:</label></td>
				<td><input type="number" name="idUsuario"></td>
			</tr>
			<tr>
				<td><label>Usuário:</label></td>
				<td><input type="text" name="dsUsuario"></td>
			</tr>
			<tr>
				<td><label>Senha:</label></td>
				<td><input type="password" name="dsSenha"></td>
			</tr>
			<tr>
				<td><input type="submit" value="Login"></td>
				<td> <?php echo '<input style="width: 100px;" type="button" onclick="window.location='."'index.php'".';" value="Voltar">'; ?></td>
			</tr>
	</form>
	</table>
	</center>
</body>
</html>
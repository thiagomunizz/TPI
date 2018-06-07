<?php // SALVAR COMO conexao.php
class BancodeDados {
    // Nas linhas abaixo você poderá colocar as informações do Banco de Dados.
    private $host = "localhost"; 	// Nome ou IP do Servidor
    private $user = "root"; 		// Usuário do Servidor MySQL
    private $senha = ""; 		// Senha do Usuário MySQL
    private $banco = "aula2805"; 		// Nome do seu Banco de Dados
    public $con;
	
	// método responsável para conexão a base de dados
	function conecta(){
        $this->con = @mysqli_connect($this->host,$this->user,$this->senha, $this->banco);
	    // Conecta ao Banco de Dados
        if(!$this->con){
      		// Caso ocorra um erro, exibe uma mensagem com o erro
			die ("Problemas com a conexão");
        }
    }
	
	// método responsável para fechar a conexão
	function fechar(){
		mysqli_close($this->con);
		return;
	}
	
	// método para executar o SELECT (consultar.php, verexclusao.php, veralteracao.php)
	function sqlquery($string,$caminho){
		// executando instrução SQL
		$resultado = @mysqli_query($this->con, $string);
		if (!$resultado) {
			echo '<input type="submit" onclick="window.location='."'index.php'".';" value="Voltar"><br /><br />';
			die('<b>Query Inválida:</b>' . @mysqli_error($this->con)); 
		} else {
			$num = @mysqli_num_rows($resultado);
			if ($num==0){
				echo "<label><b>Código: </b>não localizado!!</label><br /><br />";
				echo '<input type="submit" onclick="window.location='."'$caminho'".';" value="Voltar"><br /><br />';
				exit;		
			}else{
				$dados=mysqli_fetch_array($resultado);
			}
		} 
		$this->fechar(); // chama o método que fecha a conexão
		return $dados;
	}
	
	// método para executar o INSERT, UPDATE e DELETE (incluir.php, alterar.php, excluir.php)
	function sqlstring($string,$texto){
		$resultado = @mysqli_query($this->con, $string);
		if (!$resultado) {
			echo '<input type="submit" onclick="window.location='."'index.php'".';" value="Voltar"><br /><br />';
			die('<label><b>Query Inválida:</b></label>' . @mysqli_error($mysql->con)); 
		} else {
			echo "<label><b>$texto </b> - Realizada com  Sucesso</label>";
		}
		$this->fechar(); // chama o método que fecha a conexão
		return;
	}

	// método para retornar valores
	function testesql($string,$caminho) {
		$resultado = @mysqli_query($this->con, $string);
		if (!$resultado) {
			echo '<input type="submit" onclick="window.location='."'index.php'".';" value="Voltar"><br /><br />';
			die('<b>Query Inválida:</b>' . @mysqli_error($this->con)); 
		} else {
			$num = @mysqli_num_rows($resultado);
			if ($num==0){
				echo "<label><b>Código: </b>não localizado!!</label><br /><br />";
				echo '<input type="submit" onclick="window.location='."'$caminho'".';" value="Voltar"><br /><br />';
				exit;		
			}else{
				$dadosconsulta=mysqli_query($this->con, $string);
			}
		} 

		$this->fechar(); // chama o método que fecha a conexão
		return $dadosconsulta;
	}

	function verificarlogin($string,$caminho){
		$resultado = @mysqli_query($this->con, $string);
		if (mysqli_num_rows($resultado) <= 0) {
	?>

		<label>Usuário e/ou senha incorreta</label><br/>

	<?php
		echo '<input type="submit" onclick="window.location='."'login.php'".';" value="Voltar"><br /><br />';
		die(); 
		} else {
			header("Location: nsei.php");
		}

		$this->fechar(); // chama o método que fecha a conexão
	} 	
 }  
?>
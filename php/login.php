<?php
	
	include_once('conexao.php');
	
	function login($cref, $senha) {
		global $con;
		// Monta uma consulta SQL (query) para procurar um usu?rio
		$sql = "SELECT * FROM usuario WHERE crefito = '$cref' AND senha= '$senha' LIMIT 1";
 
		if (mysql_num_rows(mysql_query($sql,$con))>0){ //A tabela n?o existe
			return true;
		}else{
			return false;
		}
	}
?>	
	

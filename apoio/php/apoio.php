<?php
	include_once('conexao.php');
	
	
	/* +----------------------------------------------------------+
	   |        funções para recuperar dados de um livro          |
	   +----------------------------------------------------------+
	*/
	

	function apoio_GetNome($id) {
		global $com;
		// Monta uma consulta SQL (query) para procurar um usu?rio
		$sql = "SELECT * FROM apoio WHERE id = '$id' LIMIT 1";

		if (!mysql_query($sql,$com)){ //A tabela n?o existe
				return FALSE;
		}
		
		$query = mysql_query($sql,$com);
		$resultado = mysql_fetch_assoc($query);
		// Definimos dois valores na sess?o com os dados do usu?rio	
		return $resultado['nome'];
	}
	
	
	function apoio_GetDesc($id) {
		global $com;
		// Monta uma consulta SQL (query) para procurar um usu?rio
		$sql = "SELECT * FROM apoio WHERE id = '$id' LIMIT 1";

		if (!mysql_query($sql,$com)){ //A tabela n?o existe
				return FALSE;
		}
		
		$query = mysql_query($sql,$com);
		$resultado = mysql_fetch_assoc($query);
		// Definimos dois valores na sess?o com os dados do usu?rio	
		return $resultado['desc'];
	}
	
	
	function apoio_GetLink($id) {
		global $com;
		// Monta uma consulta SQL (query) para procurar um usu?rio
		$sql = "SELECT * FROM apoio WHERE id = '$id' LIMIT 1";

		if (!mysql_query($sql,$com)){ //A tabela n?o existe
				return FALSE;
		}
		
		$query = mysql_query($sql,$com);
		$resultado = mysql_fetch_assoc($query);
		// Definimos dois valores na sess?o com os dados do usu?rio	
		return $resultado['link'];
	}
	
	function apoio_patner() {
		return 'img/apoio/'.rand(1,3).'.png';
	}
	
?>
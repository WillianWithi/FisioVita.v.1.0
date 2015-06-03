<?php
	include_once('conexao.php');
	
	
	
	/*
		funções de retorno com parametro email
	*/
	
	//retorna o nome do usuario
	function getNome($email) {
		global $com;
		// Monta uma consulta SQL (query) para procurar um usu?rio
		$sql = "SELECT * FROM user WHERE email = '$email' LIMIT 1";

		if (!mysql_query($sql,$com)){ //A tabela n?o existe
				return FALSE;
		}
		
		$query = mysql_query($sql,$com);
		$resultado = mysql_fetch_assoc($query);
		// Definimos dois valores na sess?o com os dados do usu?rio	
		return $resultado['nome'];
	}

	//retorna o nome do usuario
	function getSenha($email) {
		global $com;
		// Monta uma consulta SQL (query) para procurar um usu?rio
		$sql = "SELECT * FROM user WHERE email = '$email' LIMIT 1";

		if (!mysql_query($sql,$com)){ //A tabela n?o existe
				return FALSE;
		}
		
		$query = mysql_query($sql,$com);
		$resultado = mysql_fetch_assoc($query);
		// Definimos dois valores na sess?o com os dados do usu?rio	
		return $resultado['senha'];
	}
	
	
	// retorna id do usuarios
	function getId($email) {
		global $com;
		// Monta uma consulta SQL (query) para procurar um usu?rio
		$sql = "SELECT * FROM user WHERE email = '$email' LIMIT 1";

		if (!mysql_query($sql,$com)){ //A tabela n?o existe
				return FALSE;
		}
		
		$query = mysql_query($sql,$com);
		$resultado = mysql_fetch_assoc($query);
		// Definimos dois valores na sess?o com os dados do usu?rio
		return $resultado['id'];
	}
	
	function getFone($email) {
		global $com;
		// Monta uma consulta SQL (query) para procurar um usu?rio
		$sql = "SELECT * FROM user WHERE email = '$email' LIMIT 1";

		if (!mysql_query($sql,$com)){ //A tabela n?o existe
				return FALSE;
		}
		
		$query = mysql_query($sql,$com);
		$resultado = mysql_fetch_assoc($query);
		// Definimos dois valores na sess?o com os dados do usu?rio
		return $resultado['fone'];
	}
	
	function getFace($email) {
		global $com;
		// Monta uma consulta SQL (query) para procurar um usu?rio
		$sql = "SELECT * FROM user WHERE email = '$email' LIMIT 1";

		if (!mysql_query($sql,$com)){ //A tabela n?o existe
				return FALSE;
		}
		
		$query = mysql_query($sql,$com);
		$resultado = mysql_fetch_assoc($query);
		// Definimos dois valores na sess?o com os dados do usu?rio
		return $resultado['face'];
	}
	
	function getImg($email) {
		global $com;
		// Monta uma consulta SQL (query) para procurar um usu?rio
		$sql = "SELECT * FROM user WHERE email = '$email' LIMIT 1";

		if (!mysql_query($sql,$com)){ //A tabela n?o existe
				return FALSE;
		}
		
		$query = mysql_query($sql,$com);
		$resultado = mysql_fetch_assoc($query);
		// Definimos dois valores na sess?o com os dados do usu?rio
		return $resultado['img'];
	}
	
	
	
	
	
	
	/*
		funções de retorno com parametro id
	*/
	
	
	//retorna o nome do usuario
	function idGetNome($id) {
		global $com;
		// Monta uma consulta SQL (query) para procurar um usu?rio
		$sql = "SELECT * FROM user WHERE id = '$id' LIMIT 1";

		if (!mysql_query($sql,$com)){ //A tabela n?o existe
				return FALSE;
		}
		
		$query = mysql_query($sql,$com);
		$resultado = mysql_fetch_assoc($query);
		// Definimos dois valores na sess?o com os dados do usu?rio	
		return $resultado['nome'];
	}
	
	//retorna o email do usuario
	function idGetEmail($id) {
		global $com;
		// Monta uma consulta SQL (query) para procurar um usu?rio
		$sql = "SELECT * FROM user WHERE id = '$id' LIMIT 1";

		if (!mysql_query($sql,$com)){ //A tabela n?o existe
				return FALSE;
		}
		
		$query = mysql_query($sql,$com);
		$resultado = mysql_fetch_assoc($query);
		// Definimos dois valores na sess?o com os dados do usu?rio	
		return $resultado['email'];
	}
	
	//retorna o fone do usuario
	function idGetFone($id) {
		global $com;
		// Monta uma consulta SQL (query) para procurar um usu?rio
		$sql = "SELECT * FROM user WHERE id = '$id' LIMIT 1";

		if (!mysql_query($sql,$com)){ //A tabela n?o existe
				return FALSE;
		}
		
		$query = mysql_query($sql,$com);
		$resultado = mysql_fetch_assoc($query);
		// Definimos dois valores na sess?o com os dados do usu?rio	
		return $resultado['fone'];
	}
	
	//retorna o fone do usuario
	function idGetFace($id) {
		global $com;
		// Monta uma consulta SQL (query) para procurar um usu?rio
		$sql = "SELECT * FROM user WHERE id = '$id' LIMIT 1";

		if (!mysql_query($sql,$com)){ //A tabela n?o existe
				return FALSE;
		}
		
		$query = mysql_query($sql,$com);
		$resultado = mysql_fetch_assoc($query);
		// Definimos dois valores na sess?o com os dados do usu?rio	
		return $resultado['face'];
	}
	
	//retorna o fone do usuario
	function idGetImg($id) {
		global $com;
		// Monta uma consulta SQL (query) para procurar um usu?rio
		$sql = "SELECT * FROM user WHERE id = '$id' LIMIT 1";

		if (!mysql_query($sql,$com)){ //A tabela n?o existe
				return FALSE;
		}
		
		$query = mysql_query($sql,$com);
		$resultado = mysql_fetch_assoc($query);
		// Definimos dois valores na sess?o com os dados do usu?rio	
		return $resultado['img'];
	}
	
	//retorna o fone do usuario
	function idGetPasta($id) {
		global $com;
		// Monta uma consulta SQL (query) para procurar um usu?rio
		$sql = "SELECT * FROM user WHERE id = '$id' LIMIT 1";

		if (!mysql_query($sql,$com)){ //A tabela n?o existe
				return FALSE;
		}
		
		$query = mysql_query($sql,$com);
		$resultado = mysql_fetch_assoc($query);
		// Definimos dois valores na sess?o com os dados do usu?rio	
		return $resultado['pasta'];
	}
	
	
	function isnotEmail($email){
		global $com;
		
		// verifica se ja existe um email
		$sql = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
		
		if (mysql_num_rows(mysql_query($sql,$com))>0){ //A tabela existe
			return false;
		}else{
			return true;
		}
	}
	
	
	
	function emailUserImg($var){
		$v=getImg($var);
		if(($v!='')&&($v!=NULL)){
			return getImg($var);
		}else{
			return 'img/user/user.jpg';
		}
	}
	
	
	
	function getCor($n){
		if($n==1){
			return '#0f83e2;';
		}else if($n==2){
			return '#ffcc29;';
		}else{
			return '#a31016;';
		}
	}
	
	function doar($id,$aviso,$nome,$email,$img,$face){
		echo '<div style="width:98%;border:1px solid #0f83e2;float:left;margin-right:3%;margin-bottom:3%;border-radius:10px;background:#0f83e2;padding:5px;">
					<input type="button" name="button"  value="x"  style="width:20px; height:25px;background-color:#0f83e2;  border:1px solid #0f83e2; margin-top:10px;margin-right:10px;color:#fff;border-radius:3px;font-weight:bold;float:right;" onClick="location.href=\'notificacoes.php?ex='.$id.'\' " />		
					<center>
						<p  style="color:#fff;width:90%;text-align:left;margin-top:10px;">Solicitacao de doacao do livro <b>'.$img.':</b></p>
						<h5 style="color:#fff;width:90%;text-align:left;margin-top:20px;"><b>'.$nome.'</b></h5>
						<p style="color:#ddd;text-align:justify;width:90%;font-size:14px;margin-top:-10px;">'.$email.'</p>';	
						
		if($face!=''){
			echo '<p style="color:#fff;text-align:justify;width:90%;font-size:12px;margin-top:-10px;"><a href="'.$face.'" style="color:#fff;">Contato via Facebook</a></p>';
		}		
						
		echo '<p  style="color:#fff;width:90%;text-align:left;margin-top:10px;">'.$aviso.'</p></center>
			<a href="rejeitar.php?nome='.$img.'&id='.$id.'" style="color:#fff;width:90%;text-align:left;margin-top:20px;margin-left:40px;margin-bottom:35px;><h5 "><b>Rejeitar pedido</b></h5></a>	
			</div>';
	}
	
	
	
?>
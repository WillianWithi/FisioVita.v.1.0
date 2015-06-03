<?php
	
	include_once('../php/conexao.php');
	include('../php/user.php');
	include('../php/book.php');
	
	function login($email, $senha) {
		global $com;
		// Monta uma consulta SQL (query) para procurar um usu?rio
		$sql = "SELECT * FROM user WHERE email = '$email' AND senha= '$senha' LIMIT 1";

		if (mysql_num_rows(mysql_query($sql,$com))>0){ //A tabela n?o existe
			return true;
		}else{
			return false;
		}
	}
	

	
	
	function uploadIMG($foto,$pasta){

		// Se a foto estiver sido selecionada 
		if (!empty($foto['name'])) {   
			
			// Largura máxima em pixels 
			$largura = 2000; 
			// Altura máxima em pixels 
			$altura = 2000; 
			// Tamanho máximo do arquivo em bytes 
			$tamanho = 5000000;   

			// Verifica se o arquivo é uma imagem 
			if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){ 
				$error[1] = "Isso não é uma imagem."; 
			}   
			
			// Pega as dimensões da imagem 
			@$dimensoes = getimagesize($foto["tmp_name"]);   
			
			// Verifica se a largura da imagem é maior que a largura permitida 
			if($dimensoes[0] > $largura) { 
				$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels"; 
			}   
			
			// Verifica se a altura da imagem é maior que a altura permitida 
			if($dimensoes[1] > $altura) {
				$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels"; 
			}   
			
			// Verifica se o tamanho da imagem é maior que o tamanho permitido 
			if($foto["size"] > $tamanho) {
				$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes"; 
			}   
			
			// Se não houver nenhum erro 
			if (@count($error) == 0) {   
			
				// Pega extensão da imagem 
				preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);   
				
				// Gera um nome único para a imagem 
				$nome_imagem = md5(uniqid(time())) . "." . $ext[1];   
				
				// Caminho de onde ficará a imagem 
				$caminho_imagem = "img/".$pasta."/". $nome_imagem;   
				
				// Faz o upload da imagem para seu respectivo caminho 
				move_uploaded_file($foto["tmp_name"], $caminho_imagem);   
				
				return $caminho_imagem;
			}   
		} 
	}
	
	function redirect($end){
		echo "<script> location.href='$end'; </script>";
	}
	
	function blindar($chave){
		if(!isset($chave)||($chave=='')){
			redirect('index.php');
		}
	}
	
	function not($id){
		global $com;
		
		$sql="SELECT * FROM notas WHERE user = '$id'";
		$result=mysql_query($sql,$com);
		if(mysql_num_rows($result)>0){
			$not=mysql_num_rows($result);
			return $not;
		}else{
			return '';
		}
	}

	//numero de livros doados
	function livros_doados($id){
		global $com;
		
		$sql="SELECT * FROM livro WHERE doador = '$id' AND status = 'not' ";
		$result=mysql_query($sql,$com);
		if(mysql_num_rows($result)>0){
			$var=mysql_num_rows($result);
			return $var;
		}else{
			return '';
		}
	}
	
	?>
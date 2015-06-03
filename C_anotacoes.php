
<?php
    date_default_timezone_set('America/Sao_Paulo');

// cadastrar anotações
    session_start();
	$id_pac = $_SESSION['id'];
	
	//  guardar dados no banco de dados;
	 include ('php/conexao.php');
	 if(isset($_POST['m-vent'])){
	   // postando dados dos inputs
		$m_ventilatorio= $_POST['m-vent'];
		
		$vm= $_POST['opcao'];
		if($vm== 1){
		  $tipo = $_POST['op'];
		  if($tipo == 1){
		    $tot = 1;
			$tqt = 0;
		  }else{
		    $tqt = 1;
			$tot = 0;
		  }
		}else{
		  $tot = 0;
		  $tqt = 0;
		}
		
		$tamanho = $_POST['tamanho'];
		$p_cuff = $_POST['p_cuff'];
		$posicao = $_POST['posicao'];
		$diag = $_POST['diagnostico'];
		$avaliacao =$_POST['aval'];
		$informacao = $_POST['inf'];
	    $data = date('Y/m/d');
		$hora = date('H:i:s');
		$nomeFisio = $_SESSION['nome'];
		
		// sql para inserir esses dados na minha tabela de avaliação do meu banco de fisioterapia;
		$sql= mysql_query("INSERT into avaliacao(m_vent,tqt,v_m,tot,tamanho,p_cuff,posicao,aval,inf_imp,diagnostico,id_paciente,data,hora,fisio) 
		VALUES('$m_ventilatorio','$tqt','$vm','$tot','$tamanho','$p_cuff','$posicao','$avaliacao','$informacao','$diag','$id_pac','$data','$hora','$nomeFisio')",$con);
		
		echo "<center><h1>Cadastro efetuado com sucesso</h1></center><br>
			  <a href='C_paciente.php' style='color:#000'>Cadastrar Novamente</a>";
	      
	}else{
	  echo "NÂO DEU CERTO hehe";
	}


?>
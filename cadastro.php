<html>

<head>
	<title>Cadastrando...</title>
</head>

<body>
	<?php
        session_start();
        $t = 2;
		$_SESSION['M']= $t;    
		include ('php/conexao.php');
		$sql= mysql_query("SELECT * FROM paciente",$con) or die (mysql_error()) ;
		$linha = mysql_fetch_assoc($sql);
		$total = mysql_num_rows($sql);
		$cont = 0;
		
		do{
		  if(($_POST['leito']==$linha["leito"])&&($linha["status"]==1)&&($_POST['clinica'] == $linha["clinica"])){
		    $cont = $cont + 1;
		  }
		}while($linha = mysql_fetch_assoc($sql));
		
		if($cont==0){
			if(isset($_POST['leito'])){
				$pront= $_POST['pront'];
				$leito= $_POST['leito'];
				$nome= $_POST['nome'];
				$diag = $_POST['diagnostico'];
				$status = 1;
				$clinica = $_POST['clinica'];
				

				// sql para cadastrar o paciente no banco de dados 
				$sql= mysql_query("INSERT into paciente(pront,leito,nome,diagnostico,status,clinica) VALUES('$pront','$leito','$nome','$diag','$status','$clinica')",$con);
				mysql_close($con);
				header("Location: table.php?setor=".$clinica);
			}
		}else{
		   $_SESSION['leito']= 1;
		   header("Location: table.php?setor=".$clinica);
		}

	
	?>
</body>
</html>
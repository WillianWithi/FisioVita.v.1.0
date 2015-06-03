<?php
    SESSION_START();
	$teste = 1;
	$_SESSION['M'] = $teste;
	 $_SESSION['leito']=0;
?>
<!DOCTYPE html>
<html lang="pt-br">
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/login.css">
		
		<!-- Bootstrap Styles-->
		<link href="assets/css/bootstrap.css" rel="stylesheet" />
		 <!-- FontAwesome Styles-->
		<link href="assets/css/font-awesome.css" rel="stylesheet" />
			<!-- Custom Styles-->
		<link href="assets/css/custom-styles.css" rel="stylesheet" />
		 <!-- Google Fonts-->
	   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

		
		<style type="text/css">
				
			
			body{
               			
				background-image: url("img/fisiovitafundo.jpg");
				background-repeat: no-repeat;
				background-size:100%,100%;
				
		    }
			
		
			
			.admin{
			   position: absolute;
			   top:0;
			   right:0;
			}
			
		</style>

	</head>
	
	<body>
	    
		
			
			
           <div style="width:260px;height:400px;margin:auto;padding-top:8%;">
				<div style="margin-top:25%;width450px;height:320px;border-radius:6px;background:#fff;margin:auto;background:#091929;padding:25px;" class="shadow">
					<img src="img/logofisioVita.png" width="200" align ="center"/>
					<br><br>
					
					
					<form action="index.php" method="post">	
						<input class="form-control&#32;input-lg" id="pesquisa" name="crefito" placeholder="Crefito" type="text" style="width:200px;height:40px;font-size:14px;margin-bottom:15px;"/>
						<input class="form-control&#32;input-lg" id="pesquisa" name="senha" placeholder="Senha" type="password" style="width:200px;height:40px;font-size:14px;margin-bottom:15px;"/>
						<input type="submit"  value="Entrar" style="border-radius:3px;color:#fff;background: #0f83e2; border:4px solid #0f83e2;height:40px;"/>
						<span></span>
						
						<div>
						<?php 
							// verifica se os dados de usuário e senha são logaveis
							include('php/conexao.php');

							if(isset($_POST['crefito'])){
							  $CRE= $_POST['crefito'];
							  $SEN= $_POST['senha'];

							  $sql= mysql_query("SELECT * FROM usuario  WHERE crefito = '$CRE' and senha= '$SEN'",$con) or die (mysql_error()) ;
							  $lin = mysql_fetch_assoc($sql);
							  $tot = mysql_num_rows($sql);
							  
							 
							  
							 
							  if($tot>0){
								//  o fisioterapeuta tá logado
								$_SESSION['nome']= $lin['nome'];
								header('Location: table.php');
							  }else{
								 echo "<h4 style='color:#fff;font-family: sans-serif;'>'usuário' ou 'senha' estão incorreto </h4>";
							  } 
                             }
                        ?>
						</div>
						
					</form>
				</div>
			</div>
		
		   <div class="admin">
				<a href="donut.php" class="btn btn-primary">Administrador</a>
		   </div>
          
	</body>
</html>
                     
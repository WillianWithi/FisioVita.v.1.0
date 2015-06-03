
<!DOCTYPE html>
<html lang="pt-br">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <title>Pion | ensino Online</title>
	
	<link rel="shortcut icon" href="fav.ico" type="image/x-icon" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" type="text/css" />
    <link rel="stylesheet" href="css/style2.css"  type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/interno.css" type="text/css" />


</head>
<body style="background:#f0f0f0;">
    <div id="bit-main-nav" class="navbar navbar-default navbar-fixed-top shadow" style="background:#f0f0f0;border:none;height:30px;">
		<div class="header">
			<a class="navbar-brand" href="editar.php">
					<img src="img/pion.png" width="200"  title="Voltar ao inicio" style="margin-left:20px;margin-top:20px;"/>    
			</a>
		</div>
	
		<div class="header" id="bit-default-navbar">
			
		</div>

		<div class="navbar-collapse collapse" id="bit-default-navbar">
			<ul class="nav navbar-nav navbar-right" style="margin-right:20px;margin-top:10px;">
				
                <li class="dropdown hidden-sm">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuario Pereira da Silva<b class="caret" ></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">opção 1</a></li>
                        <li><a href="#">opção 2</a></li>
                        <li><a href="#">opção 3</a></li>
                        <li class="divider"></li>
                        <li><a href="sair.php">Desconectar</a></li>
                    </ul>
                </li>
				
			</ul>
		</div>
	
	</div>


	<div class="conteudo" style="background:#fff;">
		<div class="coluna" style="margin-left:-30px;">
			
			<form action="busca.php" method="get" style="margin-bottom:10px;" class="form-inline">
				<table>
					<tr><td>								
							<input class="input" id="pesquisa" name="seach" placeholder="Esta procurando alguma coisa?" type="text" />
						</td>
						<td>
							<input type="submit"  value="Pesquisar" class="bseach"/>
					</td></tr>
				</table>	
			</form>
			
			<div  class="manu-o" data-spy="affix" data-offset-top="226" style="margin-top:20px;">
				<ul id="bit-about-nav" class="nav nav-pills nav-stacked">
					<li class="act" ><a href="#"><span class="item-menu">opção 1</span></a></li>
					<li ><a href="#">opção 2</a></li>
					<li ><a href="#">opção 3</a></li>
					<li ><a href="#">opção 4</a></li>
					<li ><a href="#">opção 5</a></li>
					
				</ul>
			</div>
		</div>
		
		<!-- Area onde estão disponiveis essass campanhas-->
		<div  style="width:65%;height:500px;float:right;background:#fff;">
			
			

		</div>
	</div>
</body>

</html>

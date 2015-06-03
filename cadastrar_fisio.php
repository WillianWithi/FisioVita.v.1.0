<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>fisioVita</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
	 <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="img/logofisioVita.png" width="150" align ="center"/></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    
			
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <br><br>
					
                    <li>
                         <a href="#" style="color:#fff">Cadastrar Fisioterapeuta</a><br>
                    </li>
					<li>
                         <a href="#" style="color:#fff">Tempo de ventilação</a><br>
                    </li>
                    <li>
                         <a href="#" style="color:#fff">Óbito/Transferência</a><br>
                    </li>
                    
                    <li>
                        <a href="#" style="color:#fff">Extubações</a><br>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="panel panel-default" align="center">
						 <p align="center" style="font-size:25px"> Cadastrar Fisioterapeuta</p><br>
						 <form action="Cadastrando_fisio.php" method="post" align="center">	
							<input class="form-control&#32;input-lg" id="pesquisa" name="nome" placeholder="Nome" type="text" style="width:500px;height:40px;font-size:14px;margin-bottom:15px;"/>
							<input class="form-control&#32;input-lg" id="pesquisa" name="crefito" placeholder="Crefito" type="text" style="width:500px;height:40px;font-size:14px;margin-bottom:15px;"/>
							<input class="form-control&#32;input-lg" id="pesquisa" name="email" placeholder="E-mail" type="text" style="width:500px;height:40px;font-size:14px;margin-bottom:15px;"/>						
							<input class="form-control&#32;input-lg" id="pesquisa" name="sen" placeholder="Senha" type="password" style="width:500px;height:40px;font-size:14px;margin-bottom:15px;"/><br>
							<br>
							<input type="submit"  value="Cadastrar" style="border-radius:3px;color:#fff;background: #0f83e2; border:4px solid #0f83e2;height:40px;"/>
							<input type="RESET"  value="Limpar" style="border-radius:3px;color:#fff;background: #0f83e2; border:4px solid #0f83e2;height:40px;"/>
							<br><br>
							<span></span>
						 </form>
                          
                        </div>
                    </div>
					
                    <div class="col-md-3 col-sm-12 col-xs-12">
					   
                      
                    </div>

                </div>
				
				 
			</div>
                
                <!-- /. ROW  -->
				<footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>
<?php
  Session_start();
  include('funcoes.php');
  $id = $_SESSION['id'];
 
  $sql= mysql_query("SELECT * FROM avaliacao WHERE id_paciente = '$id' order by id DESC",$con) or die (mysql_error()) ;
  $linha = mysql_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>anotações</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
 </head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" rule="navigation">
          <a class="navbar-brand" href="table.php"><img src="img/logofisioVita.png" width="200" align ="center"/></a>
		  <div>
		<!--	<h2 style="color:#fff"align="center">Avaliação do Fisioterapeuta</h2--> 
			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
						<i class="fa fa-envelope fa-fw fa-2x"></i>
					</a>
				</li>
			</ul>
			<br>
            <h2 style="color:#fff;"align="center" >PRONTUÁRIO</h2>
		  </div>
		 
	
		  
         </nav>
         <nav class="navbar-default navbar-side" role="navigation">
		  <div class="navbar-header" style="padding-right:10%">
		       
				
						</br></br>
				
						<p style="font-size:12px;color:#fff;margin-left:10%">	
					       <?php
						      $query = mysql_query("SELECT * FROM paciente WHERE id = '$id'",$con) or die (mysql_error()) ;
						      $line = mysql_fetch_assoc($query);
							  echo "LEITO:".$line['leito']."<br>
								   PRONTUARIO:".$line['pront']."<br>
								   NOME:".$line['nome']."<br>
								   DIAGNOSTICO:".$line['diagnostico']."<br>
								   Data Admissão:".$line['data']."<br>
								   Pressao do cuff:".$linha['p_cuff']."<br>
								   Posicao:".$linha['posicao']."<br>
								   Tamanho:".$linha['tamanho']."<br>
							  ";
						   ?>
			
							
						</p>
			  
			
		  </div>
         </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
		
            <div id="page-inner" >
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-14">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
								<?php
								    do{
										echo "
											<div><i class='fa fa-calendar-o'style='margin-left:40px;'></i><span style='margin-left:15px;'>".inverteData($linha['data'])."</span> <i class='fa fa-clock-o' style='margin-left:40px;'></i>
											<span>".$linha['hora']."</span><i class='fa fa-user-md'style='margin-left:40px;'></i> <span style='margin-left:15px;'>".$linha['fisio']."</span><br></div>
<br>
 <br>
										    <div style='margin-left:50px;'>".$linha['aval']."</div>
											<div style='margin-left:40px;'>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div></BR>
											
										";
									}while($linha= mysql_fetch_assoc($sql));
								?>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
						
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
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
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
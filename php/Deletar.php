
<?php 
// função para deletar

 if(isset($_POST['id'])){
	$id = $_POST['id'];
	deletar($id);
	header('Location: ../pacientes.php'); 
 }

 function deletar($id){
    include('conexao.php');
	$sql= mysql_query("DELETE FROM paciente WHERE id='$id'",$con) or die(mysql_error());
 }
 
 

?>
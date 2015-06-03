<?php
include('Calcular.php');
	
	
if(isset($_POST['peso'])){
        $id_p = $_POST['id']; // id do paciente que solicitou atendimento
		$peso = $_POST['peso'];
		$idade= $_POST['idade'];
		$fr_atual= $_POST['fr_atual'];
		$fio2= $_POST['fio2_atual'];
		$pco2_atual= $_POST['pco2_atual'];
		$pao2_atual= $_POST['paO2_atual'];
		$hco3= $_POST['hco3'];
		$pco2_ideal= $_POST['pcO2_ideal'];
		$altura= $_POST['altura'];
		$peep = $_POST['peep'];
		$pressao_plato= $_POST['pressao_plato'];
		$pressao_pico = $_POST['pressao_pico'];
	
	    
		$paciente= array("peso"=>$peso,"idade"=>$idade,"fr_atual"=>$fr_atual,
		"fio2"=>$fio2,"pco2_atual"=>$pco2_atual,"pao2_atual"=>$pao2_atual,"hco3"=>$hco3,"pco2_ideal"=>$pco2_ideal,"altura"=>$altura,"peep"=>$peep,
		"pressao_plato"=>$pressao_plato,"pressao_pico"=>$pressao_pico);
	}                  
	
	
	$volume_corrente = v_corrente($paciente);
	$peso_m= peso_p_mulher($paciente);
	$peso_h= peso_p_homem($paciente);
	$volume_correntel= v_correntel($paciente);
	$pao2_ideal = pao2_ideal($paciente);
	$pco2_ideal_ac = pco2_ideal_ac($paciente);
	$pco2_ideal_alc = pco2_ideal_alc($paciente);
    $fluxo = fluxo($paciente);
    $fr_ideal =	fr_ideal($paciente);
	$fio2_ideal = fio_ideal($paciente);
	$ind_oxigenacao = ind_oxigenacao($paciente);
	$volume_minuto = v_minuto($paciente);
	$complacencia = complacencia($paciente);
	$pressao_distencao = pressao_distencao($paciente);
	$resistencia = resistencia($paciente);
	$ind_tobin = ind_tobin($paciente);
	
	// teste mostrar dados
	
	echo $peso_m."<br>".$peso_h."<br>".$volume_correntel."<br>".$pao2_ideal."<br>".$pco2_ideal_ac."<br>".$pco2_ideal_alc."<br>".$volume_corrente."<br>".$fluxo."<br>"
	.$fr_ideal."<br>".$fio2_ideal."<br>".$ind_oxigenacao."<br>".$volume_minuto."<br>".$complacencia."<br>".$pressao_distencao."<br>".$resistencia."<br>".$ind_tobin."<br>";
   
	// cadastrar no banco de dados os parametros V.M do paciente 
    
	$sql = "INSERT INTO resultado(peso_m, peso_h, volume_corrente, pao2_ideal, pco2_ideal_ac, pco2_ideal_alc,v_corrente_ml, fluxo, fr_ideal, 
	fio2_ideal, ind_oxigenacao, volume_minuto, complacencia, pressao_distensao, resistencia, ind_tobin,id_paciente) 
	VALUES('$peso_m', '$peso_h','$volume_corrente','$pao2_ideal','$pco2_ideal_ac', '$pco2_ideal_alc','$volume_correntel','$fluxo','$fr_ideal','$fio2_ideal',
	'$ind_oxigenacao','$volume_minuto','$complacencia','$pressao_distencao','$resistencia','$ind_tobin','$id_p')";
	
	$sql= mysql_query($sql,$con)or die(mysql_error());
	mysql_close($con);
	
	
	
	// redirecionar os dados para a página atender.php 
    header('Location: atendimento.php?id='.$id_p.'&f=1');
	
?>
<?php
    include('php/conexao.php');
	
    function ocupados($data,$clinica){
		$sql = mysql_query("SELECT COUNT(status) as status FROM paciente WHERE status = '1' and clinica = '$clinica' ");
		$line= mysql_fetch_assoc($sql);
		return $line['status'];
    }
	// função para contar o numero de pacientes com vm
	function vm($data,$clinica){
	    $squery = mysql_query("SELECT COUNT(v_m) as v_m FROM paciente INNER JOIN avaliacao ON paciente.id = avaliacao.id_paciente WHERE avaliacao.data = '$data'and avaliacao.v_m = '1' and clinica = '$clinica'");
		$linha = mysql_fetch_array($squery);
		return $linha['v_m'];
	}
	
	// função para contar o numero de pacientes com tot
	function tot($data,$clinica){
		$squery = mysql_query("SELECT COUNT(tot) as tot FROM paciente INNER JOIN avaliacao ON paciente.id = avaliacao.id_paciente WHERE avaliacao.data = '$data'and avaliacao.tot = '1' and clinica = '$clinica'");
		$linha = mysql_fetch_array($squery);
		return $linha['tot'];
	}
	
	
	// função para contar o numero de pacientes com tqt
	function tqt($data,$clinica){
		$squery = mysql_query("SELECT COUNT(tqt) as tqt FROM paciente INNER JOIN avaliacao ON paciente.id = avaliacao.id_paciente WHERE avaliacao.data = '$data' and  avaliacao.tqt = '1' and clinica = '$clinica'");
		$linha = mysql_fetch_array($squery);
		return $linha['tqt'];
	}
	
    function med($vm,$ocupados){
	  $med = ($vm/$ocupados);
	  return $med;
	}
	    
?>
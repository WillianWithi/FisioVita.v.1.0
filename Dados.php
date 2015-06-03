<?php
    $sql= mysql_query("SELECT * FROM avaliacao",$con) or die (mysql_error()) ;
    $linha = mysql_fetch_assoc($sql);
    include ('php/data');
	$data = date('y/m/d');
    $id_pac = $_SESSION['id'];
	
	if($linha['data'] != $data ){
	
	  // gerar os dados estatísticos para o tempo que está em processo
		$tot=0;
		$tqt = 0;
		$vni = 0;
		
		if($linha['tipo']== 1){
			$tot = 1;
			$tqt = 0;
			$vni = 0;
		}else if ($linha['tipo']== 2){
			$tqt = 1;
			$tot = 0;
			$vni = 0;
		}else if ($linha['tipo']== 3){
			$vni = 1;
			$tot = 0;
			$tqt = 0;
		}else{
			$tot = 0;
			$tqt = 0;
			$vni = 0;
		}
		
	// ventilação mecanica

		if($linha['v_m']==1){
		 $vm = 1;
		}else{
		 $vm = 0;
		}
        
		$sql= mysql_query("INSERT into estatistica(id_paciente,data,,diagnostico,status,clinica) VALUES('$pront','$leito','$nome','$diag','$status','$clinica')",$con);
		
	
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
?>
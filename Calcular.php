<?php 
     
    include('php/conexao.php');
	

	function v_corrente($paciente){
		if(is_array($paciente)){
		    $a= $paciente['peso'] * 6;
			return $a;
		}
	}
	
	function fluxo($paciente){
	  return 6 * v_minuto($paciente);	
	}
	
	function v_minuto($paciente){
	   return $paciente['fr_atual'] * v_correntel($paciente);
	}
	
	function v_correntel($paciente){
        return v_corrente($paciente)*0.001;
    }
    
    function fr_ideal($paciente){
		return (($paciente['fr_atual'] * $paciente['pco2_atual'])/$paciente['pco2_ideal']);
	}
    
    function fio_ideal($paciente){
	  return ((pao2_ideal($paciente) * $paciente['fio2'])/$paciente['pao2_atual']);	
	}	
	
	function peso_p_mulher($paciente){
	  return 45.5 + 0.91 * ($paciente['altura']-152.4);
	}
	
	function peso_p_homem($paciente){
	  return 50 + 0.91 * ($paciente['altura']-152.4);
	}
	
	function pao2_ideal($paciente){
	  return 109 - ($paciente['idade']*0.4);
	}
	
	function pco2_ideal_ac($paciente){
	  return (1.5 * $paciente['hco3']) + 8;
	}
	
	function pco2_ideal_alc($paciente){
	  return (0.7 * $paciente['hco3']) + 20;
	}
	
	function ind_oxigenacao($paciente){
	  return ($paciente['pao2_atual']/$paciente['fio2']);
	}
	
	function complacencia($paciente){
	  return (v_corrente($paciente) / pressao_distencao($paciente));
	}
	
	function pressao_distencao($paciente){
	  return $paciente['pressao_plato'] - $paciente['peep'];
	}
	
	function resistencia($paciente){
      return ($paciente['pressao_pico'] - ($paciente['pressao_plato']/ fluxo($paciente)));	
	}
	
	function ind_tobin($paciente){
	  return $paciente['fr_atual'] / (v_correntel($paciente));
	}

?>

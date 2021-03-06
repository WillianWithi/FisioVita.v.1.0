/*
   funçoes para calcular os parametros ventilatórios
*/

<html>
<head>
<script type="text/javascript">
var paciente = 
			{
				peso:65,
				idade:64,
				fr_atual:30,
				pco2_atual:57,9,
				pco2_ideal:36,95,
				fio2: 0,5,
				pao2_atual:162,
				altura: 174,
				hco3: 19,3,
				pressao_plato:40,
				peep: 8,
				pressao_pico:20,
		
			}

   
// volume corrente*

	 function v_corrente(paciente){
		a=parseFloat(paciente.peso * 6);
	    return a;
	 }
	 
// Retorna o fluxo*
	function fluxo(paciente){
	  return 6 * v_minuto(paciente);	
	}
	
//	Retorna o volume minuto
	function v_minuto(paciente){
	   return paciente.fr_atual * v_correntel(paciente);
	}
//	Retorna o volume corrente (L)*
	function v_correntel(paciente){
        return v_corrente(paciente)*0.001;
    }
// Retorna a frequencia respiratória ideal para o paciente   *  
    function fr_ideal(paciente){
		return ((paciente.fr_atual * paciente.pco2_atual)/paciente.pco2_ideal);
	}
//  Retorna a fração inspirada de oxigênio ideal -
    function fio_ideal(paciente){
	  return ((pao2_ideal(paciente) * paciente.fio2)/paciente.pao2_atual);	
	}	
	
// Retorna o peso predito Mulheres *
	function peso_p_mulher(paciente){
	  return 45.5 + 0.91 * (paciente.altura -152.4);
	}
// Retorna o peso predito do homem	*
	function peso_p_homem(paciente){
	  return 50 + 0.91 * (paciente.altura -152.4);
	}
// retorna o Pa0² ideal para o paciente *	
	function pao2_ideal(paciente){
	  return 109 - (paciente.idade * 0.4);
	}
	
//  Retorna o Pc0² ideal ac -
	function pco2_ideal_ac(paciente){
	  return (1.5 * paciente.hco3) + 8;
	}

//  Retorna o Pc0² ideal alc  -
	function pco2_ideal_alc(paciente){
	 alert (0.7 * paciente.hco3) + 20;
	}
// Retorna o indice de oxigenação	*
	function ind_oxigenacao(paciente){
	
	  return (paciente.pao2_atual/paciente.fio2);
	}
// Retorna a pressao de distensao	*
	function pressao_distensao(paciente){
	  return paciente.pressao_plato - paciente.peep;
	}
	
// Retorna a complacencia	*
	function complacencia(paciente){
	  return(v_corrente(paciente)/ pressao_distensao(paciente));
	}

// Retorna a resistencia	*
	function resistencia(paciente){
      return (paciente.pressao_pico - (paciente.pressao_plato/ fluxo(paciente)));	
	}
// Retorna o indice de tobin	*
	function ind_tobin(paciente){
	  return paciente.fr_atual / (v_correntel(paciente));
	}

</script>
</head>
<body>
<script type="text/javascript">
   pco2_ideal_alc(paciente);

</script>
</body>
</html>



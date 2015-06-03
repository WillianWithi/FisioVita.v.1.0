<?php
	
	function data(){
		
	

		setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );

		date_default_timezone_set( 'America/Sao_Paulo' );
        
		$data = strftime( '%a, %d de %B de %Y', strtotime( date( 'Y-m-d' ) ) );
		
		$data = ucfirst($data);
		echo $data;
		
    }
 ?>
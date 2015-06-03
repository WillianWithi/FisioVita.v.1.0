
<?php 
   include ("estatistic.php");
   $data1 = "25-05-2015";
   $data2 = "31-05-2015";
   $clinica = "uti1";
   $i = 0;
   $mediaTotal = 0;
   $mediaTotTotal = 0;
   $mediaTqtTotal =0;
   $dataFinal = date('d-m-Y', strtotime("+1 days",strtotime($data2)));
	do{
		
		$dataTeste = date("Y-m-d",strtotime(str_replace('/','-',$data1)));
        $media = med(vm($dataTeste,$clinica),ocupados($dataTeste,$clinica)); // media de pacientes em vm
		$mediaTot = med(tot($dataTeste,$clinica),ocupados($dataTeste,$clinica)); // media de pacientes com tot
		$mediaTqt = med(tqt($dataTeste,$clinica),ocupados($dataTeste,$clinica)); // media de pacientes com tqt
		echo " media: $media";
		echo " tot: $mediaTot";
		echo " tqt: $mediaTqt";
		echo "<br>";
		$data1 = date('d-m-Y', strtotime("+1 days",strtotime($data1)));
		$mediaTotal = $mediaTotal + $media;
		$mediaTotTotal = $mediaTotTotal + $mediaTot;
		$mediaTqtTotal = $mediaTqtTotal + $mediaTqt;
		$i= $i+1;
		
	}while($data1 != $dataFinal );
	
	$mediaTotal = $mediaTotal/$i; // media total no mês
	$mediaTotTotal = $mediaTotTotal/$i; // media do tot total no mes
	$mediaTqtTotal = $mediaTqtTotal/$i; // media do tqt total no mes
	echo round(($mediaTotal*100),2),"<br>";
	echo round(($mediaTotTotal*100),2),"<br>";
	echo round (($mediaTqtTotal*100),2);
	
	
?>
<?php
 // função para quebrar string
 include('php/conexao.php');
 function qString($v){
   $n = explode(" ",$v);
   return $n[0];
 }

 // conveter a primeira letra do nome em maiuscula de cada palavra
 
 function MString($M){
   $mai = ucwords ($M);
   return $mai;
 }
 
 function mStatus($id_sal){
    $id = $id_sal;
    $sql= mysql_query("UPDATE paciente SET status = 0 WHERE id='$id' ") or die(mysql_error());
 } 
 
 
 function getPaciente($id,$campo){
    $sql= mysql_query("SELECT * FROM paciente WHERE id = $id",$con) or die (mysql_error()) ;
    $linha = mysql_fetch_assoc($sql);   
	return $linha[$campo];
 }
 
 function getAnotacao($id,$campo){
    $sql= mysql_query("SELECT * FROM avaliacao WHERE id= $id",$con) or die (mysql_error()) ;
    $linha = mysql_fetch_assoc($sql);
	return $linha[$campo];
 }
 
 
 
 // pega o numero de leitos ocupados
 function ocupados($data,$clinica){
    $sql = mysql_query("SELECT COUNT(status) as status FROM paciente WHERE status = '1' and clinica = '$clinica' ");
	$query = mysql_fetch_assoc($sql);
	return $query['status'];
 }
 

 // pega o quantos pacientes internados estão entubados por dia;
 
 function tot_dia($data,$clinica){ 
    $sql = mysql_query("SELECT COUNT(tipo) as tipo FROM paciente INNER JOIN avaliacao ON paciente.id = avaliacao.id_paciente WHERE tipo = '1' AND avaliacao.data = '$data' and status = 1 and clinica = '$clinica'");
    $squery = mysql_fetch_assoc($sql);
	return $squery['tipo']; 
 }
 
 // pega quantos pacientes traqueostomizados por dia
 
 function tqt_dia($data,$clinica){
	$sql = mysql_query("SELECT COUNT(tipo) as tipo FROM paciente INNER JOIN avaliacao ON paciente.id = avaliacao.id_paciente WHERE tipo = '2' AND avaliacao.data = '$data' and status = 1 and clinica = '$clinica'");
    $squery = mysql_fetch_assoc($sql);
	return $squery['tipo']; 
 }
 // quantos pacientes estão em vni nessa data
 function VNI_dia($data,$clinica){
	$sql = mysql_query("SELECT COUNT(tipo) as tipo FROM paciente INNER JOIN avaliacao ON paciente.id = avaliacao.id_paciente WHERE tipo = '3' AND avaliacao.data = '$data' and status = 1 and clinica = '$clinica'");
    $squery = mysql_fetch_assoc($sql);
	return $squery['tipo']; 
 }
 
 //pega o numero de pacientes que estão em vm por dia
 function vm_dia($data,$clinica){
	$sql = mysql_query("SELECT COUNT(v_m) as v_m FROM paciente INNER JOIN avaliacao ON paciente.id = avaliacao.id_paciente WHERE v_m ='1' AND status = '1' AND avaliacao.data = '$data' AND clinica = '$clinica'");
    $query = mysql_fetch_assoc($sql);
    return $query['v_m'];
 }
 
 // inverter data
 function inverteData($data){
    if(count(explode("/",$data)) > 1){
        return implode("-",array_reverse(explode("/",$data)));
    }elseif(count(explode("-",$data)) > 1){
        return implode("/",array_reverse(explode("-",$data)));
    }
}
 
 
?>
<?php
# ---------------------------------------------------------------- #
# Script:        find.php
# Description:   PROCURA ARQUIVOS EM DIR, SUBDIR E SUB-SUBDIR 
# Written by	 vanderson.lima
# Date:			 11.03.2021
#            	 Grupo Vicoa Brasil
# ---------------------------------------------------------------- #
include "funcoes.php";
include "ftp.php";

$data = $_POST['data'];
$cpf = $_POST['cpf'];
$telefone1 = $_POST['telefone1'];
$telefone2 = $_POST['telefone2'];
$adesao = $_POST['adesao'];
$rotulo = $_POST['rotulo'];

$new_data = implode('/', array_reverse(explode('-', $data)));

$array = explode("/", $new_data);
$dia = $array[0];
$mes = $array[1];
$ano = $array[2];

$dir = verificaPeriodo($dia, $mes, $ano);

if(is_dir($dir)){

$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));

$files = array(); 

foreach ($rii as $file) {
	
	if ($file->isDir()){ 
       continue;
		logMsg("Mais Diretorios Foram Encontrados");
	}
	
	$files[] = $file->getPathname(); 	
	
	$cpf_compare = strripos($file->getPathname(), $cpf);
	$telefone1_compare = strripos($file->getPathname(), $telefone1);
	$telefone2_compare = strripos($file->getPathname(), $telefone2);
	$adesao_compare = strripos($file->getPathname(), $adesao);
	$rotulo_compare = strripos($file->getPathname(), $rotulo);
	
	if ($cpf_compare !== false)
	{
		$nome = basename($file->getPathname());
		$filepath = $file->getPathname();
		ftp($filepath, $nome); 
    }
	else
	if ($telefone1_compare !== false)
	{
		$nome = basename($file->getPathname());
		$filepath = $file->getPathname();
		ftp($filepath, $nome); 
	}
	else
	if ($telefone2_compare !== false)
	{
		$nome = basename($file->getPathname());
		$filepath = $file->getPathname();
		ftp($filepath, $nome); 
	}
	else
	if ($adesao_compare !== false)
	{	
		$nome = basename($file->getPathname());
		$filepath = $file->getPathname();
		ftp($filepath, $nome);
	}	
	else
	if ($rotulo_compare !== false)
	{		
		$nome = basename($file->getPathname());
		$filepath = $file->getPathname();
		ftp($filepath, $nome); 
	}
}
}
else
{
	echo "<script>window.alert('Áudio Não Encontrado');</script>"; 
	header("Refresh:10;url=index.html");	
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Busca Áudio</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/find.css">
</head>
<body>

</body>
</html>

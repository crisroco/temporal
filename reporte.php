<?php


require_once("../../config.php");
require_once('locallib.php');
global $DB, $USER;
require_login();



if(!isset($_GET['group']) || !isset($_GET['scorm']) ){
	echo 'Falta el parametro';
	die();
}



$cursos = get_course_by_categoria_id($_GET['group']);



$csv_arr = array (
    array('fullname','shortname','category','templatecourse')    
);

foreach ($cursos as $key => $value) {
	$csv_arr[] = array($value['fullname'],$value['shortname'],$_GET['group'],$_GET['scorm']);
}

$fp = fopen('fichero.csv', 'w');

foreach ($csv_arr as $campos) {
    fputcsv($fp, $campos, ';');
}

fclose($fp);


$filename = 'fichero.csv';
header('Content-Description: File Transfer');
header('Content-Type: application/vnd.ms-excel');
header("Content-disposition: attachment; filename=$filename");
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filename));
readfile("$filename");
unlink($filename);
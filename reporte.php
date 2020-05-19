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
echo "<pre>";
print_r($cursos);
echo "</pre>";

die();

// $filename = 'Reporte_'. $nombre ."_".$hoy.'.xlsx';
// $writer->save($filename);
// //header("Content-type:xlsx");
// header('Content-Description: File Transfer');
// header('Content-Type: application/vnd.ms-excel');
// header("Content-disposition: attachment; filename=$filename");
// //header('Content-Disposition: attachment; filename="'.basename($filename).'"');
// header('Expires: 0');
// header('Cache-Control: must-revalidate');
// header('Pragma: public');
// header('Content-Length: ' . filesize($filename));
// readfile("$filename");
// unlink($filename);
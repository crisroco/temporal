<?php


require_once("../../config.php");
require_once('locallib.php');
global $DB, $USER;

 

require_login();

if(!isset($_GET['group']) || !isset($_GET['scorm']) ){
	echo 'Falta el parametro';
	die();
}

use core_course_category;

$catid = $_GET['group']; 
$cat = core_course_category::get($catid);
$children_courses = $cat->get_courses();

foreach($children_courses as $course) {
    echo $course->shortname . '   -    '. $course->fullname. '   -    '. $_GET['scorm'] . '<br>';  
}

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
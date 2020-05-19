<?php
global $DB, $PAGE, $OUTPUT,$CFG,$USER, $COURSE;


require_once("../../config.php");
require_once($CFG->dirroot.'/course/lib.php');
require_once($CFG->dirroot.'/course/modlib.php');
require_once($CFG->libdir.'/completionlib.php');
require_once('locallib.php');


//$courseId = $_GET['courseid'];
//$userId = $_GET['userid'];

// $params = array();
// $params = array('id' => $courseId );
// $course = $DB->get_record('course', $params, '*', MUST_EXIST);

// Prevent caching of this page to stop confusion when changing page after making AJAX changes
$PAGE->set_cacheable(false);
$urlparams = array();
$PAGE->set_url('/view.php', $urlparams);


//$PAGE->set_pagelayout('course');
//$PAGE->set_heading($course->fullname);

// Get information 
//$list_scorms = get_scorms($courseId);
$list_plantillas = get_course_plantilla();
$courseGroup = get_course_groups();
//$list_scorms_enabled = get_mod_availability($courseId);
//$user_list = get_report_data('todos', '1', '30');
//$userRol = get_user_rol($userId,$courseId);

$PAGE->requires->css('/blocks/scorm_report/assets/css/styles.css');
//print $OUTPUT->header();
$PAGE->requires->js_call_amd('block_scorm_report/module', 'init');

print html_writer::tag('script','',array('src'=>$CFG->wwwroot.'/blocks/scorm_report/assets/js/jquery.min.js'));
print html_writer::tag('script','',array('src'=>$CFG->wwwroot.'/blocks/scorm_report/assets/js/bootstrap.min.js'));
print html_writer::tag('link','',array('href'=>'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css','rel'=>'stylesheet'));
   //print_r($list_plantillas);
echo '<div class="container">';
    echo '<div class="row">';
        echo '<div class="col-sm-4">';
        echo '</div>';
        echo '<div class="col-sm-3">';
            echo '<form id="searchform" action="reporte.php" method="get">';
                echo '<div class="form-group">';
                    echo '<label>Sección :</label>';
                    print(html_writer::select($courseGroup , 'group', 'group', 'Elegir...', array('required'=>'', 'class' => 'form-control')));
                echo '</div>';
                echo '<div class="form-group">';
                    echo '<label>Plantilla :</label>';
                    print(html_writer::select($list_plantillas , 'scorm', 'scorm', 'Elegir...', array('required' => '','class' => 'form-control')));	
                echo '</div>';
                //echo '<input id="courseidd" type="hidden" name="courseid"  value="'. $courseId .'"> ' ;
                echo '<button type="submit" class="btn btn-primary">Descargar CSV</button>';
            echo '</form>';
        echo '</div>';
    echo '</div>';
echo '</div>';
// print(add_action_buttons(false, 'Reporte'));
//print $OUTPUT->footer();

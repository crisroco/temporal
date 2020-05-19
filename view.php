<?php
    global $DB, $PAGE, $OUTPUT,$CFG,$USER, $COURSE;


    require_once("../../config.php");
    require_once($CFG->dirroot.'/course/lib.php');
    require_once($CFG->dirroot.'/course/modlib.php');
    require_once($CFG->libdir.'/completionlib.php');
    require_once('locallib.php');

    $PAGE->set_cacheable(false);
    $urlparams = array();
    $PAGE->set_url('/view.php', $urlparams);

    $list_plantillas = get_course_plantilla();
    $courseGroup = get_course_groups();

    $PAGE->requires->css('/blocks/scorm_report/assets/css/styles.css');
    print $OUTPUT->header();
    $PAGE->requires->js_call_amd('block_scorm_report/module', 'init');

    print html_writer::tag('script','',array('src'=>$CFG->wwwroot.'/blocks/scorm_report/assets/js/jquery.min.js'));
    print html_writer::tag('script','',array('src'=>$CFG->wwwroot.'/blocks/scorm_report/assets/js/bootstrap.min.js'));
    print html_writer::tag('link','',array('href'=>'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css','rel'=>'stylesheet'));
       
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
                    
                    echo '<button type="submit" class="btn btn-primary">Descargar CSV</button>';
                echo '</form>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
    print $OUTPUT->footer();

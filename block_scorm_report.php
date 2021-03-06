<?php

class block_scorm_report extends block_base {
    function init() {
        $this->title = get_string('pluginname', 'block_scorm_report');
    }

    function has_config() {
        return false;
    }

    function get_content() {
        global $OUTPUT, $USER , $DB , $COURSE, $PAGE;

        $PAGE->requires->css('/blocks/scorm_report/assets/css/styles.css');


        if ($this->content !== null) {
          return $this->content;
        }

        if (empty($this->instance)) {
          $this->content = '';
          return $this->content;
        }

        $this->content = new stdClass();
        $this->content->text = ''; //translate this

        //$url = new moodle_url('/blocks/scorm_report/view.php', array('courseid' =>$courseid, 'userid' => $userid));
        $url = new moodle_url('/blocks/scorm_report/view.php', array());

        $text = 'Generar CSV replica actividad'; //Translate this
        //$this->content->text = '<div>Este es un curso hijo</div>';
        $this->content->text .= html_writer::link($url,$text,array('class'=>'btn btn-danger btn-reporte' , 'target' => '_blank'));
    }

}
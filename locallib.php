<?php

  require_once(dirname(__FILE__) . '/../../config.php');
  require_once($CFG->libdir.'/adminlib.php');
  require_once($CFG->libdir.'/modinfolib.php');
  require_once($CFG->libdir.'/formslib.php');
  require_once("$CFG->dirroot/course/lib.php");


  global $DB, $CFG, $PAGE, $OUTPUT, $USER, $COURSE;


  require_login();

  /**
  *retorna los grupos que existen en el curso
  */
  function get_course_groups(){
  	global $DB;

    $category = $DB->get_records('course_categories',array());

    $sections_list = array();

    foreach($category as $cat){
        $sections_list[$cat->id] = $cat->name;
    }

    return $sections_list;
  }


  function get_course_plantilla(){
    global $DB;

    $category = $DB->get_records('course_categories',array());
    $categoria_id = null;
    $response = array();

    foreach($category as $cat){
      if ($cat->name == 'plantillas') {
        $categoria_id =  $cat->id;
        break;
      }
    }

    if($categoria_id){
      $lista_cursos = get_course_by_categoria_id($categoria_id);
      foreach ($lista_cursos as $key => $value) {
        $response[$value['shortname']] = $value['fullname']; 
      }
    }
    return $response;
  }


  function get_course_by_categoria_id($categoria_id){
    $key = 0;
    $cat = core_course_category::get($categoria_id);
    $children_courses = $cat->get_courses();
    $course_list = array();

    foreach($children_courses as $course) {
        $course_list[$key]['id'] = $course->id; 
        $course_list[$key]['shortname'] = $course->shortname; 
        $course_list[$key]['fullname'] = $course->fullname; 
        $key++;
    }

    return $course_list;
  }



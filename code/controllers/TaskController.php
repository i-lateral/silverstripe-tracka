<?php
/**
 * Description of TaskController
 *
 * @author morven
 */
class TaskController extends Controller {
    public function init() {
        parent::init();
    }
    
    public function index() {
        return $this->renderWith(array('TaskController','Page'));
        
    }
}
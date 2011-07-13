<?php
/**
 * Description of ProjectController
 *
 * @author morven
 */
class ProjectController extends Controller {
    public static $allowed_actions = array(
        'add',
        'edit',
        'delete'
    );
    
    public function init() {
        parent::init();
    }
    
    public function index() {
        return $this->renderWith(array('ProjectController','Page')); 
    }
    
    public function add() {
        return $this->renderWith(array('ProjectController_add','Page')); 
    }
}
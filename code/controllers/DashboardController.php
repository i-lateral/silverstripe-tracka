<?php
/**
 * Description of ProjectController
 *
 * @author morven
 */
class DashboardController extends Controller {
    public function init() {
        parent::init();
    }
    
    public function index() {
        return $this->renderWith(array('DashboardController','Page'));
    }
}
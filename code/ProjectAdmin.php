<?php
/**
 * Description of ProjectAdmin
 *
 * @author morven
 */
class ProjectAdmin extends LeftAndMain {
    static $url_segment = 'projects';
    static $menu_title = 'Projects';
    static $menu_priority = 50;
    static $url_priority = 41;
    static $url_rule = '/$Action/$ID/$OtherID';
    static $tree_class = "Project";

    public function init() {
        parent::init();
        Requirements::javascript('tracka/javascript/ProjectAdmin_right.js');
        Requirements::css('tracka/css/ProjectAdmin.css');
    }

    /**
    * Basic action to display a blank pannel when the root node is selected
    * from the left sitetree.
    *
    * @return <type> false
    */
    public function root() {
        return false;
    }
}
?>

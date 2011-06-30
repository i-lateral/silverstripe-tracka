<?php
/**
 * ProjectAdmin is responsible for generating a list of projects and tasks from
 * within the CMS
 *
 * @author morven
 */
class ProjectAdmin extends ModelAdmin {
    static $url_segment = 'projects';
    static $menu_title = 'Projects';
    static $menu_priority = 10;

    static $managed_models = array(
        'Task',
        'Project'
    );
}
?>
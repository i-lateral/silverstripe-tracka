<?php
/**
 * Description of ProjectAdmin
 *
 * @author morven
 */
class ProjectAdmin extends LeftAndMain {
    static $url_segment = 'projects';
    static $menu_title = 'Projects';
    static $menu_priority = 10;
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

    /**
     * Form to appear at the top of the left had pane
     * 
     * @return Form
     */
    function leftMenuForm() {
        // Create form fields
        $fields = new FieldSet(
            new HiddenField('ID','id#','new')
        );

        $actions = new FieldSet(
            new FormAction('doCreateProject', _t('ProjectAdmin.CreateProject','Create Project'))
        );

        $form = new Form($this, "LeftMenuForm", $fields, $actions);

        return $form;
    }

    /**
     * Method responsible for creating new projects in the CMS
     * @param <type> $data
     * @param <type> $form
     * @return <type> FormResponse
     */
    function doCreateProject($data, $form) {
        $project = new Project();
        $project->Title = "New Project";

        if($project->write()) {
            FormResponse::status_message(_t('ProjectAdmin.CreateSuccess','Created Project'), 'good');
        } else
            FormResponse::status_message(_t('ProjectAdmin.CreateFail','Creation Failed'), 'bad');

        return FormResponse::respond();
    }

    public function get_projects() {
        return DataOject::get("Project");
    }
}
?>
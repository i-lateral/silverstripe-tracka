<?php
/**
 * TrackaAdmin is the core class used to track issues in tracka. It makes use
 * of the the tree pain to list all projects under relevent categories (these
 * can be clients, project types, whatever you want).
 * 
 * Each project has the following views associated with it:
 * 
 * Dashboard:
 *     used to display a summary of recent activity on the project.
 * Tasks:
 *     list of all tasks available on the project. This list will not be a
 *     conventional list field and will allow you to view items as a list or
 *     tabular data.
 * Milestones:
 *     Allows you to set milestones for each project in a traditional fasion.
 * Editform:
 *     Allows you to edit the project settings
 * 
 *
 * @author morven
 * @package tracka
 */

class TrackaAdmin extends LeftAndMain {
    static $url_segment = 'tracka';
    static $url_rule = '$Action/$ID';
    static $menu_title = 'Tracka';
    static $menu_priority = 60;
 
    /**
     * Initialisation method called before accessing any functionality that
     * BulkLoaderAdmin has to offer
     */
    public function init() {
        parent::init();
    }
 
    /**
     * Form that will be shown when we open one of the items
     */ 
    public function getEditForm($id = null) {
        return new Form($this, "EditForm",
            new FieldSet(
                new ReadonlyField('id #',$id)
            ),
            new FieldSet(
                new FormAction('go')
            )
        );
    }
}

?>

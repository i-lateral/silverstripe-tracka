<?php

/**
 * Description of Milestone
 *
 * @author morven
 * @package tracka
 */
class Milestone extends DataObject {

    public static $db = array(
        'Title' => 'Varchar(100)',
        'DueDate'=> 'Date'
    );
    
    public static $has_one = array(
        'Parent'    => 'Project'
    );
    
    public static $has_many = array(
        'Tasks'     => 'Task'
    );
    
    public static $summary_fields = array(
        'Title'     => 'Name',
        'DueDate'   => 'Due Date'
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        
        $fields->removeByName("Main");
        $fields->removeByName("Tasks");
        
        $fields->addFieldToTab('Root.Details', new TextField('Title','Name'));
        $fields->addFieldToTab('Root.Details', new DatePickerField('DueDate'));
        
        return $fields;
    }

}

?>

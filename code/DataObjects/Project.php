<?php
/**
 * A project is an object that represents a piece of work to be done
 *
 * @author morven
 */
class Project extends DataObject {
    public static $db = array(
        "Title"         => "Varchar",
        "Description"   => "HTMLText"
    );

    public static $has_one = array(
        "Icon"  => "Image"
    );

    public static $has_many = array(
        "Tasks" => "Task"
    );
    
    public static $summary_fields = array(
        'ID'    => 'ID #',
        'Title' => 'Name'
    );
    
    public function canCreate($member = null) {
        return true;
    }
    
    public function canDelete($member = null) {
        return true;
    }
    
    public function canView($member = null) {
        return true;
    }
    
    public function canEdit($member = null) {
        return true;
    }
}
?>
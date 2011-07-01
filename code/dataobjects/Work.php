<?php
/**
 * Quotes are objects that allow you to track how much time you estimate a
 * user will spend on a task
 *
 * @author morven
 */
class Work extends DataObject{
    public static $db = array(
        "Hours"         => "Decimal",
        "Date"          => 'Date',
        "Description"   => "HTMLText"
    );

    public static $has_one = array(
        "Parent"    => "Task",
        "Creator"   => "Member"
    );
    
    public static $summary_fields = array(
        'Hours',
        'Description'
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
    
    public function getCMSFields() {
        $fields = parent::getCMSFields();
        
        $fields->addFieldToTab('Root.Description', new TextareaField('Description',null,4));
        $fields->addFieldToTab('Root.Main', new NumericField('Hours'));
        $fields->addFieldToTab('Root.Main', new DatePickerField('Date'));
        
        return $fields;
    }
}
?>

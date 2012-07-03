<?php
/**
 * An expense is an object representing an external cost to a project (eg: travel,
 * software purchases, etc)
 *
 * @author morven
 * @package tracka
 */
class Expense extends DataObject {
    public static $db = array(
        "Cost"          => "Decimal",
        "Description"   => "HTMLText",
        "Date"          => "Date"
    );

    public static $has_one = array(
        "Parent"    => "Project",
        "Creator"   => "Member"
    );
    
    public static $summary_fields = array(
        'Cost',
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
        
        $fields->addFieldToTab('Root.Main', new TextareaField('Description',null,4));
        $fields->addFieldToTab('Root.Main', new NumericField('Cost','Cost (£)'));
        $fields->addFieldToTab('Root.Main', new DatePickerField('Date'));
        
        return $fields;
    }
}
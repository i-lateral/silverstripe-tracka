<?php
/**
 * Project objects act as a wrapper that pull together and filter tasks.
 * 
 * A project can contain many tasks, and many members. Projects are 
 *
 * @author morven
 * @package tracka
 */
class Project extends DataObject {
    public static $db = array(
        "Title"         => "Varchar",
        "Description"   => "HTMLText"
    );

    public static $has_one = array(
        "Icon"          => "Image"
    );

    public static $has_many = array(
        "Tasks"         => "Task",
        "Milestones"    => 'Milestone'
    );
    
    public static $many_many = array(
        "Members"       => "Member"
    );
    
    public static $casting = array(
        "MembersAsString"   => 'Text'
    );
    
    public static $summary_fields = array(
        'Title'             => 'Name',
        'MembersAsString'   => 'Team Members'
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
    
    /**
     * Compiles all associated members into a comma seperated list and returns
     * them as a string.
     * 
     * @return type string
     */
    public function getMembersAsString() {
        $output = "";
        
        foreach($this->Members() as $member) {
            $output .= "{$member->FirstName} {$member->Surname}, ";
        }
        
        return $output;
    }
    
    public function getCMSFields() {
        $fields = parent::getCMSFields();
        
        // Remove unwanted tabs
        $fields->removeByName("Main");
        $fields->removeByName("Members");
        $fields->removeByName("Tasks");
        $fields->removeByName("Milestones");
        
        $fields->addFieldToTab('Root.Details', new TextField('Title'));
        $fields->addFieldToTab('Root.Details', new TextareaField('Description',null,5));
        $fields->addFieldToTab('Root.Details', new ImageField('Icon',null,null,null,null,'Projects/Icons/'));
        
        $memberField = new ManyManyDataObjectManager(
            $this,
            'Members',
            'Member',
            array(
                'FirstName' => 'First Name',
                'Nickname'  => 'Nickname',
                'SurName'   => 'Surname',
                'Email' => 'Email'
            )
        );
        
        $milestoneField = new DataObjectManager(
            $this,
            'Milestones',
            'Milestone',
            null,
            null,
            "ParentID = '{$this->ID}'"
        );
        
        $fields->addFieldToTab('Root.Team',$memberField);
        $fields->addFieldToTab('Root.Milestones',$milestoneField);
        
        return $fields;
    }
}
?>
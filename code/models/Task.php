<?php
/**
 * Tasks are objectives that can be set and assigned to a user, they make use of
 * several key variables:
 * 
 * - Title: Name of your task
 * - Description: Some general details
 * - Priority: Level of importance
 * - Progress: What work state is this task in
 * - Due Date: When is this task due to be completed
 * - Time Estimate: How much work you think this task will take to complete
 * 
 * It also makes use of some relationships:
 * 
 * - Parent: @uses Project
 * - Asignee: Asign the task to a member in the database
 * - Creator: This should be automatically set to the person who was logged in
 *            and created the task
 * - Work: Each task can have many work objects associated with it, that track
 *         how much time has been spend at different times.
 * - Expenses: Each task can also have many expenses associated with it. These
 *             cover things like mileage, software licenses, etc.
 * 
 * @author morven
 * @package tracka
 */
class Task extends DataObject {
    public static $db = array(
        "Title"         => "Varchar",
        "Description"   => "HTMLText",
        "Priority"      => "Enum('1 - High,2 - Med,3 - Low','2 - Med')",
        "Progress"      => "Enum('Not Started,In Progress,Complete,Closed','Not Started')",
        "DueDate"       => "Date",
        "TimeEstimate"  => "Decimal"
    );

    public static $has_one = array(
        "Parent"        => "Project",
        "Asignee"       => "Member",
        "Creator"       => "Member",
        "Milestone"     => "Milestone"
    );

    public static $has_many = array(
        "Work"          => "Work",
        "Expenses"      => "Expense"
    );
    
    public static $casting = array( 
        "TotalWork"     => "Decimal",
        "TotalCosts"     => "Decimal"
    );

    public static $summary_fields = array(
        'Title'         => 'Name',
        'Priority'      => 'Priority',
        'Progress'      => 'Progress',
        'Parent.Title'  => 'Project',
        'TimeEstimate'  => 'Estimate (h)',
        'TotalWork'     => 'Work Done (h)',
        'TotalCosts'    => 'Costs (£)'
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
        
        // Remove unwanted tabs
        $fields->removeByName("Main");
        $fields->removeByName("Work");
        $fields->removeByName("Expenses");
        
        $projects = DataObject::get('Project')->toDropDownMap(
            'ID',
            'Title',
            'Select Project'
        );
        
        $members = DataObject::get('Member')->toDropDownMap(
            'ID',
            'FirstName',
            'Select Person'
        );
        
        // Add fields to the 'Details' tab
        $fields->addFieldToTab('Root.Details', new TextField('Title','Name'));
        $fields->addFieldToTab('Root.Details', new HtmlEditorField('Description',null,19));
        $fields->addFieldToTab('Root.Details', new DatePickerField('DueDate'));
        $fields->addFieldToTab('Root.Details', new NumericField('TimeEstimate'));
        
        // Add additional fields to the 'Workflow' tab
        $fields->addFieldToTab('Root.Workflow', new DropdownField('ParentID', 'Project', $projects));
        $fields->addFieldToTab('Root.Workflow', new DropdownField('PriorityID',null,$this->dbObject('Priority')->enumValues()));
        $fields->addFieldToTab('Root.Workflow', new DropdownField('ProgressID',null,$this->dbObject('Progress')->enumValues()));
        $fields->addFieldToTab('Root.Workflow', new DropdownField('CreatorID', 'Assign reporter', $members));
        $fields->addFieldToTab('Root.Workflow', new DropdownField('AsigneeID', 'Asign to person', $members));
        
        if($this->ID) {
            // Deal with adding relationships managed by DOM
            $work_manager = new DataObjectManager($this, 'Work', 'Work', null, "ParentID = '{$this->ID}'");
            $expense_manager = new DataObjectManager($this, 'Expenses', 'Expense', null, "ParentID = '{$this->ID}'");

            $fields->addFieldToTab('Root.Work', $work_manager);
            $fields->addFieldToTab('Root.Costs', $expense_manager);
        }
        
        if($this->ParentID) {
            $milestones = DataObject::get('Milestone',"ParentID = {$this->ParentID}")->toDropDownMap(
                'ID',
                'Title',
                'Select Milestone'
            );
            
            $fields->addFieldToTab('Root.Workflow', new DropdownField('MilestoneID', 'Milestone', $milestones));
        }
        
        return $fields;
    }
    
    /**
     * Combines all time logged against this task into a single int which can
     * then be returned for reports.
     * 
     * @return type int
     */
    public function getTotalWork() {
        $hours_worked = 0;
        
        foreach($this->Work() as $work) {
            if($work->Hours)
                $hours_worked += $work->Hours;
        }
        
        return $hours_worked;
    }
    
    /**
     * Combines all costs logged against this task into a single in which can
     * then be returned for reports.
     * 
     * @return type int
     */
    public function getTotalCosts() {
        $costs = 0;
        
        foreach($this->Expenses() as $expense) {
            if($expense->Cost)
                $costs += $expense->Cost;
        }
        
        return $costs;        
    }
} 
?>
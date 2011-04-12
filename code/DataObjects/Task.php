<?php
/**
 * Tasks are objectives that can be set and assigned to a users
 *
 * @author morven
 */
class Task extends DataObject {
    public static $db = array(
        'Title'         => 'Varchar',
        'Description'   => 'HTMLText',
        'Priority'      => "Enum('1 - High,2 - Med,3 - Low','2 - Med')",
        'Progress'      => "Enum('Not Started,In Progress,Complete,Closed','Not Started')",
        'DueDate'       => 'Date'
    );

    public static $has_one = array(
        'Parent'        => 'Project',
        'Asignee'       => 'Member'
    );

    public static $has_many = array(
        'Quotes'        => 'Quote',
        'Expenses'      => 'Expense'
    );
}
?>
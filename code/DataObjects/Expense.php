<?php
/**
 * An expense is an object representing an external cost to a project (eg: travel,
 * software purchases, etc)
 *
 * @author morven
 */
class Expense extends DataObject {
    public static $db = array(
        'Cost'          => 'Decimal',
        'Description'   => 'HTMLText'
    );

    public static $has_one = array(
        'Parent'    => 'Task'
    );
}
?>
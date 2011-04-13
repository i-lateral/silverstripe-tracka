<?php
/**
 * Quotes are objects that allow you to track how much time you estimate a
 * user will spend on a task
 *
 * @author morven
 */
class Quote extends DataObject{
    public static $db = array(
        "Hours"         => "Decimal",
        "Description"   => "HTMLText"
    );

    public static $has_one = array(
        "Parent"  => "Task"
    );
}
?>

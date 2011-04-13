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
}
?>
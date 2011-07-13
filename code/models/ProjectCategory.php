<?php

/**
 * Description of Category
 *
 * @author morven
 */
class ProjectCategory extends DataObject {

    public static $db = array(
        'Title'         => 'Varchar',
        'Description'   => 'HTMLText'
    );
    public static $has_one = array();
    public static $has_many = array(
        'Projects'      => 'Project'
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        return $fields;
    }

}

?>

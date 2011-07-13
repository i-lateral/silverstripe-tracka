<?php

/**
 * OomphMember is an extension to Member that allows for additional information
 * such as nickname and bio
 *
 * @author morven
 */
class TrackaMember extends DataExtension {
    public function extraStatics() {
        return array(
            'db' => array(
                'Nickname' => 'Varchar(100)',
                'LandLine' => 'Varchar(100)',
                'Mobile'   => 'Varchar(100)'
            ),
            'has_one' => array(
                'Avatar' => 'Image'
            ),
            'belongs_many_many' => array(
                'Projects' => 'Project'
            ),
            'casting' => array(
                'DisplayName' => 'Text'
            ),
            'searchable_fields' => array(
                'Nickname'
            ),
            'summary_fields'    => array(
                'Nickname'
            )
        );

    }

    function updateCMSFields(FieldSet &$fields) {
        $fields->insertBefore(new TextField('Nickname'),'FirstName');
        $fields->addFieldToTab('Root.Main', new ImageField('Avatar', null, null, null, null, "Profiles"));
    }

}
?>

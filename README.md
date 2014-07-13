MajorApps - ZF2 Table Builder Helper
================

*Better docs coming soon*

This module enables "FormBuilder" styled tables within ZendFramework 2.

*Installation*

Composer: Add the following in your composer.json

    "require": {
        "major/table-builder-module": "0.*"
    }

Run composer update

Add 'MajorTableBuilderModule' to your modules list in application.config.php

*Usage*

You're class

    class SampleTable extends \MajorTableBuilderModule\Table\Table
    {

        public function __construct($serviceLocator)
        {
            $config = array(
                'attributes' => array(
                    'class' => 'table table-bordered table-striped'
                ),
                'columns' => array(
                    'name' => array(
                        'attributes' => array(),
                        'header' => 'Name',
                        // Custom formatter
                        'formatter' => function($row, $config, $sm) {
                            $url = $sm->get('viewhelpermanager')->get('url');
                            return '<a href="' . $url('some-url', array('id' => $row['id'])) . '">' . $row['name'] . '</a>';
                        }
                    ),
                    'language' => array(
                        'attributes' => array(
                            'width' => '80px'
                        ),
                        'header' => 'Language',
                        // Using default formatter
                        'formatterOptions' => array(
                            'key' => 'language'
                        )
                    )
                )
            );
            parent::__construct($serviceLocator, $config);
        }
    }

In you're controller

    $table = new SampleTable($this->getServiceLocator());
    $table->setData($assocArrayData);

In you're view

    echo $this->table($table);

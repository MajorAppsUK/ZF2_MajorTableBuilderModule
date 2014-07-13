<?php
/**
 * MajorTableBuilderModule (https://github.com/MajorAppsUK/ZF2_MajorTableBuilderModule)
 *
 * @link      https://github.com/MajorAppsUK/ZF2_MajorTableBuilderModule for the canonical source repository
 * @copyright Copyright (c) 2014 Clocal Ltd
 * @license   https://github.com/MajorAppsUK/ZF2_MajorTableBuilderModule/blob/master/LICENSE GNU V3
 */

namespace MajorTableBuilderModule\Table;

/**
 * TableInterface
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
interface TableInterface
{
    /**
     * Get columns
     *
     * @return array
     */
    public function getColumns();

    /**
     * Get a single column
     *
     * @param string $name
     * @return null|Column
     */
    public function getColumn($name);

    /**
     * Set columns
     *
     * @param array $columns
     * @return \MajorTableBuilderModule\Table\TableBuilder
     */
    public function setColumns(array $columns);

    /**
     * Add a column to the table
     *
     * @param Column|array $column
     * @return \MajorTableBuilderModule\Table\TableBuilder
     * @throws \Exception
     */
    public function addColumn($name, $column);

    /**
     * Remove a column
     *
     * @param string $name
     * @return \MajorTableBuilderModule\Table\TableBuilder
     */
    public function removeColumn($name);

    /**
     * Get data
     *
     * @return array
     */
    public function getData();

    /**
     * Set data
     *
     * @param array $data
     * @return \MajorTableBuilderModule\Table\Table
     */
    public function setData(array $data);

    /**
     * Configure table from array
     *
     * @param array $config
     */
    public function fromArray(array $config = array());
}

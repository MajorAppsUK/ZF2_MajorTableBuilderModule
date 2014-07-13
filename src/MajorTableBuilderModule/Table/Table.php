<?php
/**
 * MajorTableBuilderModule (https://github.com/MajorAppsUK/ZF2_MajorTableBuilderModule)
 *
 * @link      https://github.com/MajorAppsUK/ZF2_MajorTableBuilderModule for the canonical source repository
 * @copyright Copyright (c) 2014 Clocal Ltd
 * @license   https://github.com/MajorAppsUK/ZF2_MajorTableBuilderModule/blob/master/LICENSE GNU V3
 */

namespace MajorTableBuilderModule\Table;

use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Table Builder
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class Table extends Element implements TableInterface
{
    /**
     * Holds the tag name
     *
     * @var string
     */
    protected $tagName = 'table';

    /**
     * Columns
     *
     * @var array
     */
    protected $columns = array();

    /**
     * Row Data
     *
     * @var array
     */
    protected $data = array();

    public function __construct(ServiceLocatorInterface $serviceLocator, $config)
    {
        $this->setServiceLocator($serviceLocator);
        $this->fromArray($config);
    }

    /**
     * Get columns
     *
     * @return array
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * Get a single column
     *
     * @param string $name
     * @return null|Column
     */
    public function getColumn($name)
    {
        if (!isset($this->column[$name])) {
            return null;
        }

        return $this->column[$name];
    }

    /**
     * Set columns
     *
     * @param array $columns
     * @return \MajorTableBuilderModule\Table\TableBuilder
     */
    public function setColumns(array $columns)
    {
        $this->columns = $columns;

        return $this;
    }

    /**
     * Add a column to the table
     *
     * @param Column|array $column
     * @return \MajorTableBuilderModule\Table\TableBuilder
     * @throws \Exception
     */
    public function addColumn($name, $column)
    {
        if (is_array($column)) {

            $column = new Column($column);
        }

        if ($column instanceof Column) {
            $column->setServiceLocator($this->getServiceLocator());
            $this->columns[$name] = $column;
        } else {
            // @todo replace with custom exception
            throw new \Exception('addColumn must be called with an array or Column object');
        }

        return $this;
    }

    /**
     * Remove a column
     *
     * @param string $name
     * @return \MajorTableBuilderModule\Table\TableBuilder
     */
    public function removeColumn($name)
    {
        $this->columns[$name] = null;

        unset($this->columns[$name]);

        return $this;
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set data
     *
     * @param array $data
     * @return \MajorTableBuilderModule\Table\Table
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Configure table from array
     *
     * @param array $config
     */
    public function fromArray(array $config = array())
    {
        if (isset($config['columns'])) {

            foreach ($config['columns'] as $name => $column) {
                $this->addColumn($name, $column);
            }
        }

        if (isset($config['attributes'])) {
            $this->setAttributes($config['attributes']);
        }
    }
}

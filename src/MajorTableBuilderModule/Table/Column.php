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
 * Column
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class Column extends Element implements ColumnInterface
{
    /**
     * Holds the tag name
     *
     * @var string
     */
    protected $tagName = 'td';

    /**
     * Header
     *
     * @var string
     */
    private $header;

    /**
     * Formatter
     *
     * @var callable
     */
    private $formatter;

    /**
     * Holds the formatter options
     *
     * @var array
     */
    private $formatterOptions = array();

    /**
     * Instantiate the column
     *
     * @param array $config
     */
    public function __construct(array $config = array())
    {
        $this->fromArray($config);
    }

    /**
     * Get header
     *
     * @return string
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * Set header
     *
     * @param string $header
     * @return \MajorTableBuilderModule\Table\Column
     */
    public function setHeader($header)
    {
        $this->header = $header;

        return $this;
    }

    /**
     * Get formatter
     *
     * @return callable
     */
    public function getFormatter()
    {
        return $this->formatter;
    }

    /**
     * Set formatter
     *
     * @param callable $formatter
     */
    public function setFormatter(callable $formatter)
    {
        $this->formatter = $formatter;

        return $this;
    }

    /**
     * Get formatter options
     *
     * @return array
     */
    public function getFormatterOptions()
    {
        return $this->formatterOptions;
    }

    /**
     * Set formatter options
     *
     * @param array $formatterOptions
     * @return \MajorTableBuilderModule\Table\Column
     */
    public function setFormatterOptions(array $formatterOptions)
    {
        $this->formatterOptions = $formatterOptions;

        return $this;
    }

    /**
     * Get the column value for the row
     *
     * @param array $row
     * @return mixed
     */
    public function getValue($row)
    {
        if (is_callable($this->getFormatter())) {

            return call_user_func(
                $this->getFormatter(),
                (array)$row,
                $this->getFormatterOptions(),
                $this->getServiceLocator()
            );
        }

        // @todo Replace with custom exception
        throw new \Exception('Can\'t get value for column, formatter is not callable');
    }

    /**
     * Configure the Column from an array
     *
     * @param array $config
     */
    public function fromArray(array $config = array())
    {
        if (isset($config['attributes'])) {
            $this->setAttributes($config['attributes']);
        }

        if (isset($config['header'])) {
            $this->setHeader($config['header']);
        }

        if (isset($config['formatter'])) {
            $this->setFormatter($config['formatter']);
        } else {
            $this->setFormatter(array($this, 'defaultFormatter'));
        }

        if (isset($config['formatterOptions'])) {
            $this->setFormatterOptions($config['formatterOptions']);
        }
    }

    /**
     * Returns a given data item if set
     *
     * @param array $row
     * @param array $config
     */
    public function defaultFormatter(array $row, array $config = array())
    {
        if (isset($config['key']) && isset($row[$config['key']])) {
            return $row[$config['key']];
        }

        return '';
    }
}

<?php
/**
 * MajorTableBuilderModule (https://github.com/MajorAppsUK/ZF2_MajorTableBuilderModule)
 *
 * @link      https://github.com/MajorAppsUK/ZF2_MajorTableBuilderModule for the canonical source repository
 * @copyright Copyright (c) 2014 Clocal Ltd
 * @license   https://github.com/MajorAppsUK/ZF2_MajorTableBuilderModule/blob/master/LICENSE GNU V3
 */

namespace Major\TableBuilder\Table;

/**
 * ColumnInterface
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
interface ColumnInterface
{
    /**
     * Get header
     *
     * @return string
     */
    public function getHeader();

    /**
     * Set header
     *
     * @param string $header
     * @return \Major\TableBuilder\Table\Column
     */
    public function setHeader($header);

    /**
     * Get formatter
     *
     * @return callable
     */
    public function getFormatter();

    /**
     * Set formatter
     *
     * @param callable $formatter
     */
    public function setFormatter(callable $formatter);

    /**
     * Get formatter options
     *
     * @return array
     */
    public function getFormatterOptions();

    /**
     * Set formatter options
     *
     * @param array $formatterOptions
     * @return \Major\TableBuilder\Table\Column
     */
    public function setFormatterOptions(array $formatterOptions);

    /**
     * Get the column value for the row
     *
     * @param array $row
     * @return mixed
     */
    public function getValue($row);

    /**
     * Configure the Column from an array
     *
     * @param array $config
     */
    public function fromArray(array $config = array());

}

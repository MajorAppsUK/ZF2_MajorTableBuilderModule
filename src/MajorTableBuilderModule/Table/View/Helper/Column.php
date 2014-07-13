<?php
/**
 * MajorTableBuilderModule (https://github.com/MajorAppsUK/ZF2_MajorTableBuilderModule)
 *
 * @link      https://github.com/MajorAppsUK/ZF2_MajorTableBuilderModule for the canonical source repository
 * @copyright Copyright (c) 2014 Clocal Ltd
 * @license   https://github.com/MajorAppsUK/ZF2_MajorTableBuilderModule/blob/master/LICENSE GNU V3
 */

namespace Major\TableBuilder\Table\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Major\TableBuilder\Table\ColumnInterface;

/**
 * Column View Helper
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class Column extends AbstractHelper
{
    /**
     * Header format
     */
    const FORMAT_HEADER = '<th>%s</th>';

    /**
     * Column format
     */
    const FORMAT_COLUMN = '%s%s%s';

    /**
     * Holds the column
     *
     * @var \Major\TableBuilder\Table\ColumnInterface
     */
    private $column;

    /**
     * Invoke the view helper
     *
     * @param \Major\TableBuilder\Table\ColumnInterface $column
     * @return \Major\TableBuilder\Table\View\Helper\Column
     */
    public function __invoke(ColumnInterface $column)
    {
        $this->column = $column;

        return $this;
    }

    /**
     * Render the header
     *
     * @return string
     */
    public function renderHeader()
    {
        return sprintf(self::FORMAT_HEADER, $this->column->getHeader());
    }

    /**
     * Render cell
     *
     * @param array $row
     * @return string
     */
    public function renderCell($row)
    {
        $viewHelper = $this->getView()->element($this->column);

        return sprintf(
            self::FORMAT_COLUMN,
            $viewHelper->openTag(),
            $this->column->getValue($row),
            $viewHelper->closeTag()
        );
    }
}

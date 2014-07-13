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
use Major\TableBuilder\Table\TableInterface;

/**
 * Table View Helper
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class Table extends AbstractHelper
{
    /**
     * Table format
     */
    const FORMAT_TABLE = '%s<thead><tr>%s</tr></thead><tbody>%s</tbody></table>';

    /**
     * Row format
     */
    const FORMAT_ROW = '<tr>%s</tr>';

    /**
     * Invoke the view helper
     *
     * @param \Major\TableBuilder\Table\TableInterface $table
     * @return string
     */
    public function __invoke(TableInterface $table)
    {
        $content = sprintf(
            self::FORMAT_TABLE,
            $this->getView()->element($table)->openTag(),
            $this->renderHeaderColumns($table),
            $this->renderRows($table)
        );

        return $content;
    }

    /**
     * Render the header columns
     *
     * @param \Major\TableBuilder\Table\TableInterface $table
     */
    private function renderHeaderColumns($table)
    {
        $content = '';

        foreach ($table->getColumns() as $column) {
            $content .= $this->getView()->column($column)->renderHeader();
        }

        return $content;
    }

    /**
     * Render rows
     *
     * @param \Major\TableBuilder\Table\TableInterface $table
     * @return string
     */
    private function renderRows($table)
    {
        $content = '';

        foreach ($table->getData() as $row) {

            $columns = array();

            foreach ($table->getColumns() as $column) {
                $columns[] = $this->getView()->column($column)->renderCell($row);
            }

            $content .= sprintf(self::FORMAT_ROW, implode('', $columns));
        }

        return $content;
    }
}

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
use Major\TableBuilder\Table\ElementInterface;

/**
 * Element View Helper
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class Element extends AbstractHelper
{
    /**
     * Open tag format
     */
    const FORMAT_OPEN_TAG = '<%s %s>';

    /**
     * Close tag format
     */
    const FORMAT_CLOSE_TAG = '</%s>';

    /**
     * Attribute format
     */
    const FORMAT_ATTRIBUTE = '%s="%s"';

    /**
     * Holds the element
     *
     * @var \Major\TableBuilder\Table\ElementInterface
     */
    private $element;

    /**
     * Invoke the view helper
     *
     * @param \Major\TableBuilder\Table\ElementInterface $element
     * @return \Major\TableBuilder\Table\View\Helper\Element
     */
    public function __invoke(ElementInterface $element)
    {
        $this->element = $element;

        return $this;
    }

    /**
     * Render the open tag
     *
     * @return string
     */
    public function openTag()
    {
        return sprintf(
            self::FORMAT_OPEN_TAG,
            $this->element->getTagName(),
            $this->renderAttributes($this->element->getAttributes())
        );
    }

    /**
     * Render the close tag
     *
     * @return string
     */
    public function closeTag()
    {
        return sprintf(self::FORMAT_CLOSE_TAG, $this->element->getTagName());
    }

    /**
     * Format the attributes
     *
     * @param array $attributes
     * @return string
     */
    protected function renderAttributes(array $attributes = array())
    {
        $attrs = array();

        foreach ($attributes as $name => $value) {
            $attrs[] = sprintf(self::FORMAT_ATTRIBUTE, $name, $value);
        }

        return implode(' ', $attrs);
    }
}

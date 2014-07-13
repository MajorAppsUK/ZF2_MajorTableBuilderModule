<?php
/**
 * MajorTableBuilderModule (https://github.com/MajorAppsUK/ZF2_MajorTableBuilderModule)
 *
 * @link      https://github.com/MajorAppsUK/ZF2_MajorTableBuilderModule for the canonical source repository
 * @copyright Copyright (c) 2014 Clocal Ltd
 * @license   https://github.com/MajorAppsUK/ZF2_MajorTableBuilderModule/blob/master/LICENSE GNU V3
 */

namespace Major\TableBuilder\Table;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

/**
 * Element
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class Element implements ElementInterface, ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    /**
     * Holds the tag name
     *
     * @var string
     */
    protected $tagName = '';

    /**
     * Attributes
     *
     * @var array
     */
    protected $attributes = array();

    /**
     * Get Tag Name
     *
     * @return string
     */
    public function getTagName()
    {
        return $this->tagName;
    }

    /**
     * Set tag name
     *
     * @param string $tagName
     * @return \Major\TableBuilder\Table\Element
     */
    public function setTagName($tagName)
    {
        $this->tagName = $tagName;

        return $this;
    }

    /**
     * Get attributes
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Set all attributes
     *
     * @param array $attributes
     * @return \Major\TableBuilder\Table\TableBuilder
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Set a single attribute
     *
     * @param string $attribute
     * @param mixed $value
     * @return \Major\TableBuilder\Table\TableBuilder
     */
    public function setAttribute($attribute, $value)
    {
        $this->attributes[$attribute] = $value;

        return $this;
    }
}

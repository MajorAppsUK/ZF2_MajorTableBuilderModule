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
 * ElementInterface
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
interface ElementInterface
{
    /**
     * Get Tag Name
     *
     * @return string
     */
    public function getTagName();

    /**
     * Set tag name
     *
     * @param string $tagName
     * @return \MajorTableBuilderModule\Table\Element
     */
    public function setTagName($tagName);

    /**
     * Get attributes
     *
     * @return array
     */
    public function getAttributes();

    /**
     * Set all attributes
     *
     * @param array $attributes
     * @return \MajorTableBuilderModule\Table\TableBuilder
     */
    public function setAttributes(array $attributes);

    /**
     * Set a single attribute
     *
     * @param string $attribute
     * @param mixed $value
     * @return \MajorTableBuilderModule\Table\TableBuilder
     */
    public function setAttribute($attribute, $value);
}

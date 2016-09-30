<?php

namespace serviform\validators;

/**
 * Filter validator class.
 */
class Filter extends \serviform\ValidatorBase
{
    /**
     * @var string
     */
    public $filter = null;

    /**
     * @param mixed                 $value
     * @param \serviform\IValidator $element
     *
     * @return bool
     */
    protected function vaidateValue($value, $element)
    {
        if ($this->filter) {
            if (is_string($this->filter)) {
                $f = $this->filter;
                $element->setValue($f($element->getValue()));
            } elseif (is_callable($this->filter)) {
                return call_user_func_array($this->filter, [$value, $element]);
            }
        }

        return true;
    }
}

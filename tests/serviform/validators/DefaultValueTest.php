<?php

namespace marvin255\serviform\tests\serviform\fields;

use marvin255\serviform\tests\cases\ValidatorElementValue;
use marvin255\serviform\helpers\FactoryValidators;

class DefaultValueTest extends ValidatorElementValue
{
    public function testSetValue()
    {
        $validator = $this->getValidator();
        $this->assertSame($validator, $validator->setValue(1));
        $this->assertSame(1, $validator->getValue());
        $this->assertSame($validator, $validator->setValue('2'));
        $this->assertSame('2', $validator->getValue());
    }

    /**
     * Return array values to test validate
     */
    protected function getValidatorProvider()
    {
        return [
            'empty string' => ['', 'test', ['value' => 'test']],
            'not empty string' => ['not empty', null, ['value' => 'test']],
        ];
    }

    /**
     * Return object for validator representation.
     */
    protected function getValidator($options = array())
    {
        $type = '\\marvin255\\serviform\\validators\\DefaultValue';

        return FactoryValidators::initElement($type, $options);
    }
}

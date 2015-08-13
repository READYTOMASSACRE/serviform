<?php

namespace serviform\helpers;

/**
 * Factory
 */
class Factory
{
	/**
	 * @param string $type
	 * @param array $options
	 * @return \serviform\IElement
	 */
	public static function initElement($type, array $options = array())
	{
		if (strpos($type, '\\') !== false) {
			$class = $type;
		} else {
			$name = ucfirst(trim($type));
			$class = "\\serviform\\fields\\{$name}";
		}
		if (is_subclass_of($class, '\serviform\IElement')) {
			$item = new $class;
			$item->config($options);
			return $item;
		} else {
			throw new Exception('Wrong class: ' . $class);
		}
	}

	/**
	 * @param array $options
	 * @return \serviform\IElement
	 */
	public static function init(array $options)
	{
		if (!empty($options['type'])) {
			$type = $options['type'];
			unset($options['type']);
			return self::initElement($type, $options);
		} else {
			throw new Exception('Wrong field type');
		}
	}
}
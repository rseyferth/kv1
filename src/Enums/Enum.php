<?php namespace Wipkip\Kv1\Enums;

abstract class Enum
{

	final private function __construct() {
		throw new \Exception('Enums cannot be instantiated.');
	}

}
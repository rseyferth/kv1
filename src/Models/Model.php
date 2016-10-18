<?php namespace Wipkip\Kv1\Models;

use Carbon\Carbon;

abstract class Model
{

	public $columns = ['recordType', 'versionNumber', 'implicitOrExplicit', 'dataOwnerCode', /*... */];
	public $dates = [];
	public $booleans = [];

	
	/**
	 * Get the filename for this model from given array of
	 * filenames.
	 * 
	 * @param  array  $filenames 
	 * @return string
	 */
	abstract function guessFilename($filenames);

	


	public static function create(array $values) {

		// Create instance
		$model = new static();
	
		// Length ok?
		if (count($values) > count($model->columns)) throw new \Exception('Could not parse line into ' . get_called_class() . ' (' . implode('|', $values) . '). Too many columns.');
		
		// Set values
		foreach ($values as $index => $value) {

			// Get name
			$name = $model->columns[$index];

			// A date?
			if (in_array($name, $model->dates)) {
				if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) {
					$value = Carbon::createFromFormat('Y-m-d', $value);
				} else {
					$value = null;
				}
			} else if (in_array($name, $model->booleans)) {
				$value = strtoupper($value) == 'TRUE';
			}

			// Set
			$model->$name = $value;

		}
		
		return $model;

	}


}
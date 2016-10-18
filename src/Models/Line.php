<?php namespace Wipkip\Kv1\Models;

/**
 * LINE
 * 
 * Een lijn is een verzameling routes/ritpatronen die bij het
 * publiek bekend is onder een gemeenschappelijk nummer
 */

class Line extends Model
{

	public $columns = [

		// Basics
		'recordType', 'versionNumber', 'implicitOrExplicit', 'dataOwnerCode',

		'linePlanningNumber', 
		'linePublicNumber',
		'lineName',
		'lineVeTagNumber',
		'description',
		'transportType',
		'lineIcon',
		'lineColor'
	];

	
	
	public function guessFilename($files) {
		return head(preg_grep('/\/LINE/', $files));
	}


}
<?php namespace Wipkip\Kv1\Models;

/**
 * LINK
 * 
 * Een routeverbinding beschrijft de verbinding tussen twee punten op
 * het fysieke pad van een route
 */

class Link extends Model
{

	public $columns = [

		// Basics
		'recordType', 'versionNumber', 'implicitOrExplicit', 'dataOwnerCode',

		'userStopCodeBegin', 
		'userStopCodeEnd',
		'validFrom',
		'distance',
		'description',
		'transportType'

	];

	public $dates = ['validFrom'];

	
	
	public function guessFilename($files) {
		return head(preg_grep('/\/LINK/', $files));
	}

	

}
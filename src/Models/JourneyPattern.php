<?php namespace Wipkip\Kv1\Models;

/**
 * JOPA
 * 
 * Ritpatroon, Dit is een geordende lijst van haltes en verbindingen
 * tussen haltes, die het haltepatroon op een logische manier beschrijven.
 */

class JourneyPattern extends Model
{

	public $columns = [

		// Basics
		'recordType', 'versionNumber', 'implicitOrExplicit', 'dataOwnerCode',

		'linePlanningNumber', 
		'journeyPatternCode',
		'journeyPatternType',
		'direction',
		'description'

	];

	public $dates = ['validFrom'];


	public function guessFilename($files) {
		return head(preg_grep('/\/JOPAX/', $files));
	}

	public function isAwayJourney() {
		return $this->direction == 'A' || $this->direction == '1';		
	}

}
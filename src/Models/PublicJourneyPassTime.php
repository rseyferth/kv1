<?php namespace Wipkip\Kv1\Models;

/**
 * PUJOPASS
 * 
 * Publieksrit passeertijden van alle haltes van een rit.
 */

class PublicJourneyPassTime extends Model
{

	public $columns = [

		// Basics
		'recordType', 'versionNumber', 'implicitOrExplicit', 'dataOwnerCode',

		'organizationalUnitCode',
		'scheduleCode',
		'scheduleTypeCode',
		'linePlanningNumber',
		'journeyNumber',
		'stopOrder',
		'journeyPatternCode',
		'userStopCode',

		'targetArrivalTime',
		'targetDepartureTime',
		
		'wheelChairAccessible',
		'dataOwnerIsOperator',
		'plannedMonitored',
		'productFormulaType'

	];

	public $booleans = ['dataOwnerIsOperator', 'plannedMonitored'];

	public function isWheelchairAccessible() {

		// Convert to bool/null
		switch ($this->wheelChairAccessible) {

			case "ACCESSIBLE":
				return true;

			case "NOTACCESSIBLE":
				return false;

			case "UNKNOWN":
			default:
				return null;


		}

	}


	public function guessFilename($files) {
		return head(preg_grep('/\/PUJOPASS/', $files));
	}


}
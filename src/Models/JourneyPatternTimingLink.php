<?php namespace Wipkip\Kv1\Models;

/**
 * JOPATILI
 * 
 * Samenstelling van Ritpatroon uit logische verbindingen (tussen
 * paren van haltes/tijdpunten). 
 * 
 * Per verbinding worden kenmerken vastgelegd als de bestemmingscode en het
 * publieke lijnnummer die gebruikt worden, de concessie(financier) en de 
 * produktformulecode.
 */

class JourneyPatternTimingLink extends Model
{

	public $columns = [

		// Basics
		'recordType', 'versionNumber', 'implicitOrExplicit', 'dataOwnerCode',

		'linePlanningNumber',
		'journeyPatternCode',
		'timingLinkOrder',
		'userStopCodeBegin', 
		'userStopCodeEnd',
		'conFinRelCode',
		'destCode',
		'deprecated',
		'isTimingStop',
		'displayPublicLine',
		'productFormulaCode'

	];

	public $booleans = ['isTimingStop'];



	public function guessFilename($files) {
		return head(preg_grep('/\/JOPATILI/', $files));
	}

	

	public function getKey() {
		$key = $this->userStopCodeBegin . '-' . $this->userStopCodeEnd;
		if (PointOnLink::$useTransportType) {
			$key .= '(' . $this->transportType . ')';
		}
		return $key;
	}


}
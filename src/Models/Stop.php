<?php namespace Wipkip\Kv1\Models;

/**
 * USRSTOP
 * 
 * Halte of passagepunt waarvoor tijden worden vastgelegd in het planningssysteem van de
 * vervoerder. 
 * 
 * Coördinaten van een User Stop Point worden vastgelegd als Point. Bij de keuze van
 * UserStopPoints is het van belang dat de coördinaten eenduidig en verifieerbaar worden vastgelegd.
 *
 * Een USRSTOP heeft een UserStopType; hiervoor zijn drie typen mogelijk: PASSENGER, BRIDGE of FINANCIAL. 
 * 
 * Bij een passagiershalte de locatie van de haltepaal (of als deze er niet is de kop van de halte waar de
 * voorkant van de bus normaliter stopt), bij een brug de stopstreep van de meest rechter rechtdoor strook 
 * voor de brug (per richting).
 */

class Stop extends Model
{

	public $columns = [

		// Basics
		'recordType', 'versionNumber', 'implicitOrExplicit', 'dataOwnerCode',

		'userStopCode', 
		'timingPointCode',
		'getIn',
		'getOut',
		'deprecated',
		'name',
		'town',
		'userStopAreaCode',
		'stopSideCode',
		'roadSideEqDataOwnerCode',
		'roadSideEqUnitNumber',
		'minimalStopTime',
		'stopSideLength',
		'description',
		'userStopType'

	];

	public $booleans = ['getIn', 'getOut'];


	public function guessFilename($files) {
		return head(preg_grep('/\/USRSTOP/', $files));
	}


}
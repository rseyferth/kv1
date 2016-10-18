<?php namespace Wipkip\Kv1\Models;

/**
 * USRSTAR
 * 
 * Een StopArea is een bundeling volgens codering vervoerder van haltes die voor de reiziger
 * eenzelfde naam hebben en logisch bij elkaar horen. (bijv. een busstation of overstappunt). Ook
 * tegen over elkaar liggende haltes kunnen een StopArea vormen.
 * 
 * T.b.v eenduidige naamgeving en presentatie naar reizigers.
 * 
 * Alle Planpunten kunnen de minimale set StopAreas vormen.
 * 
 * Niet alle haltes worden in een STAR aangeleverd
 */

class StopArea extends Model
{

	public $columns = [

		// Basics
		'recordType', 'versionNumber', 'implicitOrExplicit', 'dataOwnerCode',

		'userStopAreaCode',
		'name',
		'town',
		'roadSideEqDataOwnerCode',
		'roadSideEqUnitNumber',
		'description'

	];

	
	public function guessFilename($files) {
		return head(preg_grep('/\/USRSTAR/', $files));
	}


}
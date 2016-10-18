<?php namespace Wipkip\Kv1\Models;

/**
 * ORUN
 * 
 * Een eenheid binnen een openbaar vervoerbedrijf die een bepaald aantal verantwoordelijkheden heeft met
 * betrekking tot de exploitatie.
 *
 * Voor de publieksdienstregeling wordt een lijn als kleinste organisatie-eenheid gekozen
 */

class OrganizationalUnit extends Model
{

	public $columns = [

		// Basics
		'recordType', 'versionNumber', 'implicitOrExplicit', 'dataOwnerCode',

		'organizationalUnitCode', 
		'name',
		'organizationalUnitType',
		'description'
		
	];


	public function guessFilename($files) {
		return head(preg_grep('/\/ORUN/', $files));
	}

	
	public function isLine() {
		return $this->organizationalUnitType == 'LINE';		
	}


}
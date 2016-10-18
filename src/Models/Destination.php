<?php namespace Wipkip\Kv1\Models;

/**
 * DEST
 * 
 * Bestemmingen, 3 onderdelen:
 * DestNameFull 
 * DestNameMain (Hoofdbestemming)
 * DestNameDetail (Detail/neven of via bestemming bij hoofdbestemming)
 */

class Destination extends Model
{


	public $columns = [

		// Basics
		'recordType', 'versionNumber', 'implicitOrExplicit', 'dataOwnerCode',

		'destCode', 
		'destNameFull',
		'destNameMain',
		'destNameDetail',
		'relevantDestNameDetail',
		'destNameMain21',
		'destNameDetail21',
		'destNameMain19',
		'destNameDetail19',
		'destNameMain16',
		'destNameDetail16',
		'destIcon',
		'destColor'		
	];

	public $booleans = ['relevantDestNameDetail'];

	
	public function guessFilename($files) {
		return head(preg_grep('/\/DEST/', $files));
	}



}
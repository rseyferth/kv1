<?php namespace Wipkip\Kv1\Models;

/**
 * OPERDAY
 * 
 * Bevat de uitgeschreven operationele kalender. Per dag
 * per organisatie eenheid is aangegeven welke dienstregeling
 * (Scheduleversion) geldig is
 */

class OperatingDay extends Model
{

	public $columns = [

		// Basics
		'recordType', 'versionNumber', 'implicitOrExplicit', 'dataOwnerCode',

		'organizationalUnitCode', 
		'scheduleCode',
		'scheduleTypeCode',
		'validDate',
		'description'
	];

	public $dates = ['validDate'];


	public function guessFilename($files) {
		return head(preg_grep('/\/OPERDAY/', $files));
	}

	

}
<?php namespace Wipkip\Kv1\Models;

/**
 * SCHEDVERS
 * 
 * Een dienstregelingversie bundelt de geplande activiteiten voor een
 * organisatorische eenheid.
 * 
 * Voor de publieksdienstregeling zijn dit de ritten, routes, rijtijden
 * etc.
 */

class ScheduleVersion extends Model
{
	public $columns = [

		// Basics
		'recordType', 'versionNumber', 'implicitOrExplicit', 'dataOwnerCode',

		'organizationalUnitCode', 
		'scheduleCode',
		'scheduleTypeCode',
		'validFrom',
		'validThru',
		'description'
	];

	public $dates = ['validFrom', 'validThru'];


	public function guessFilename($files) {
		return head(preg_grep('/\/SCHEDVERS/', $files));
	}



}
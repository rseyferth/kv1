<?php namespace Wipkip\Kv1\Models;

/**
 * POOL
 * 
 * Een punt dat wordt toegevoegd aan het fysieke traject van een
 * routeverbinding.
 */

class PointOnLink extends Model
{

	public static $useTransportType = false;

	public $columns = [

		// Basics
		'recordType', 'versionNumber', 'implicitOrExplicit', 'dataOwnerCode',

		'userStopCodeBegin', 
		'userStopCodeEnd',
		'linkValidFrom',
		'pointDataOwnerCode',
		'pointCode',
		'distanceSinceStartOfLink',
		'segmentSpeed',
		'localPointSpeed',
		'description',
		'transportType'
	];

	public $dates = ['linkValidFrom'];


	public function guessFilename($files) {
		return head(preg_grep('/\/POOL/', $files));
	}

	public function getKey($includeDistance = false) {
		$key = $this->userStopCodeBegin . '-' . $this->userStopCodeEnd;
		if (static::$useTransportType) {
			$key .= '(' . $this->transportType . ')';
		}
		if ($includeDistance) {
			$key .= '.' . $this->distanceSinceStartOfLink;
		}
		return $key;
	}


}
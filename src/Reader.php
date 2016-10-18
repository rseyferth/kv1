<?php namespace Wipkip\Kv1;

class Reader
{

	public static $separator = '|';

	protected $path;
	protected $file;
	protected $modelClass;

	public function __construct($path, $modelClass) {

		// Localize
		$this->path = $path;
		$this->modelClass = $modelClass;

	}

	public function openFile() {

		// Open it.
		$this->file = fopen($this->path, 'r');

	}


	public function countLines() {

		// No count?
		if (!isset($this->count)) {

			// Open separately
			$fh = fopen($this->path, 'r');
			$lines = 0;
			while (!feof($fh)) {
				$line = fgets($fh);
				$lines++;
			}
			fclose($fh);
			$this->count = $lines;

		}
		return $this->count;


	}


	public function readLine() {

		// File open?
		if (!$this->file) $this->openFile();

		// Read a line
		$line = fgets($this->file);
		if (!$line) return false;

		// Parse it.
		$values = explode(self::$separator, trim($line));
		$model = $this->modelClass::create($values);

		return $model;

	}






}

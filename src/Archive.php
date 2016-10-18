<?php namespace Wipkip\Kv1;

use ZipArchive;

class Archive
{

	public static $useCache = true;
	public static $storagePath = '/tmp';

	public $url;
	public $publishedAt;
	public $filename;
	public $path;
	public $extractedPath;

	public $files;

	public function __construct($url, $publishedAt) {

		$this->url = $url;
		$this->publishedAt = $publishedAt;

		$this->filename = pathinfo($url, PATHINFO_BASENAME);
		$this->path = self::$storagePath . '/kv1/' . date('Y-M-d') . '/' . $this->filename;

	}


	/////////////
	// Reading //
	/////////////

	public function open($modelType) {

		// Get the model
		$modelClass = 'Wipkip\\Kv1\\Models\\' . $modelType;
		$model = new $modelClass;
		$path = $model->guessFilename($this->getFiles());
		
		// Create reader
		$reader = new Reader($path, $modelClass);
		return $reader;


	}






	///////////////////////////////
	// Downloading and unzipping //
	///////////////////////////////

	public function unpack() {

		// Load it
		$zip = new ZipArchive();
		$zip->open($this->path);
		$this->extractedPath = pathinfo($this->path, PATHINFO_DIRNAME) . '/' . pathinfo($this->path, PATHINFO_FILENAME);
		if (!file_exists($this->extractedPath)) {

			return $zip->extractTo($this->extractedPath);

		}
		return false;

	}

	public function getFiles() {

		if (!isset($this->files)) {
			$this->files = glob($this->extractedPath . '/*.*');
		}
		return $this->files;

	}

	public function download($progressCallback = null) {

		// Use cache?
		if (self::$useCache && file_exists($this->path)) {

			// Already there.
			return true;

		}

		// Open local file
		if (!file_exists(pathinfo($this->path, PATHINFO_DIRNAME))) mkdir(pathinfo($this->path, PATHINFO_DIRNAME), 0700, true);
		$fh = fopen($this->path, 'w');

		// Create curler
		$ch = curl_init();
		$options = [
			CURLOPT_URL => $this->url,
			CURLOPT_FILE => $fh,
			CURLOPT_HEADER => 0
		];
		if ($progressCallback) {
			$options[CURLOPT_PROGRESSFUNCTION] = $progressCallback;
			$options[CURLOPT_NOPROGRESS] = false;
		}
		curl_setopt_array($ch, $options);

		// Get data
		$result = curl_exec($ch);

		// Close it all
		fclose($fh);
		curl_close($ch);
			
		// Good?
		return !!$result;

	}






}
<?php

class Box {
	// col4
	private $col4Dir = 'backend/content/col4/';
	private $col4FilenameRegexp = 'box001';
	private $col4Filenames = array();
	private $col4CountFiles = null;

	// pictextbox (ptb)
	private $ptbDir = 'backend/content/pictext/';
	private $ptbFilename = 'pictextbox.json';

	function __construct() {}
	function __destruct() {}

	/************
	*	col4
	*************/
	private function setCol4CountFiles($value) {
		$this->col4CountFiles = $value;
	}

	private function getCol4CountFiles() {
		return $this->col4CountFiles;
	}

	private function getCol4Dir() {
		return $this->col4Dir;
	}

	private function getCol4FilenameRegexp() {
		return $this->col4FilenameRegexp;
	}

	/**	Load the data for all col4
	*/
	public function loadCountAndFilenamesForCol4() {
		$i = 0;
		foreach( glob("backend/content/col4/box001*.json") as $filename  ) {
			$i++;
			$this->col4Filenames[] = $filename;
		}
		$this->setCol4CountFiles($i);
	}

	/**	get the data for all col4
	*	@return		Array
	*/
	public function getCol4BoxData() {
		$array = array();
		for($i=0; $i<$this->getCol4CountFiles(); $i++) {
			$array[$i] = json_decode(file_get_contents($this->col4Filenames[$i]), true);
		}
		return $array;
	}	

	/**********************
	*	pictextbox
	***********************/
	private function getPtbDir() {
		return $this->ptbDir;
	}

	private function getPtbFilename() {
		return $this->ptbFilename;
	}

	private function getPtBFullPath() {
		return $this->getPtbDir().$this->getPtbFilename();
	}

	public function getPtbData() {
		return json_decode(file_get_contents($this->getPtBFullPath()), true);
	}
}
?>

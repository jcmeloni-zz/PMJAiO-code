<?php
class date_pulldown {
	public $name;
	public $timestamp = -1;
	public $months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
	public $yearstart = -1;
	public $yearend = -1;

	function date_pulldown($name) {
		$this->name = $name;
	}

	function setDate_global( ) {
		if (!$this->setDate_array($GLOBALS[$this->name])) {
			return $this->setDate_timestamp(time());
		}
		return true;
	}

	function setDate_timestamp($time) {
		$this->timestamp = $time;
		return true;
	}

	function setDate_array($inputdate) {
		if (is_array($inputdate) && isset($inputdate['mon']) && isset($inputdate['mday']) && isset($inputdate["year"])) {
			$this->timestamp = mktime(11, 59, 59, $inputdate['mon'], $inputdate['mday'], $inputdate["year"]);
			return true;
		}
		return false;
	}

	function setYearStart($year) {
		$this->yearstart = $year;
	}

	function setYearEnd($year) {
		$this->yearend = $year;
	}

	function getYearStart() {
		if ($this->yearstart < 0) {
			$nowarray = getdate(time());
			$this->yearstart = $nowarray['year']-5;
		}
		return $this->yearstart;
	}

	function getYearEnd() {
		if ($this->yearend < 0) {
			$nowarray = getdate(time());
			$this->yearend = $nowarray['year']+5;
		}
		return $this->yearend;
	}

	function output() {
 		if ($this->timestamp < 0) {
			$this->setDate_global();
		}

		$datearray = getdate($this->timestamp);
		$out  = $this->day_select($this->name, $datearray);
 		$out .= $this->month_select($this->name, $datearray);
		$out .= $this->year_select($this->name, $datearray);
		return $out;
	}

	function day_select($fieldname, $datearray)  {
		$out = "<select name=\"$fieldname"."['mday']\">\n";
		for ($x=1; $x<=31; $x++) {
			$out .= "<option value=\"$x\"".($datearray['mday']==($x) ?" selected":"").">".sprintf("%02d", $x) ."</option>\n";
		}
		$out .= "</select>\n";
		return $out;
	}

	function month_select($fieldname, $datearray) {
		$out = "<select name=\"$fieldname"."['mon']\">\n";
		for ($x = 1; $x <= 12; $x++) {
			$out .= "<option value=\"".($x)."\"".($datearray['mon']==($x) ?" selected":"")."> ".$this->months[$x-1]."</option>\n";
 		}
		$out .= "</select>\n";
		return $out;
	}

	function year_select($fieldname, $datearray) {
		$out = "<select name=\"$fieldname"."['year']\">";
		$start = $this->getYearStart();
		$end = $this->getYearEnd();
		for ($x= $start; $x < $end; $x++) {
			$out .= "<option value=\"$x\"".($datearray['year']==($x) ?" selected":"").">".$x."</option>\n";
		}
		$out .= "</select>\n";
		return $out;
	}
}
?>
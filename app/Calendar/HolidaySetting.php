<?php

namespace App\Calendar;

use Yasumi\Yasumi;
use Illuminate\Database\Eloquent\Model;

class HolidaySetting extends Model
{
    const OPEN = 1;
	const CLOSE = 2;
	
	protected $table = "holiday_setting";
	
	protected $fillable = [
		"flag_mon",
		"flag_tue",
		"flag_wed",
		"flag_thu",
		"flag_fri",
		"flag_sat",
		"flag_sun",
		"flag_holiday"
	];
	
	function isOpenMonday(){
		return $this->flag_mon == HolidaySetting::OPEN;
	}
	function isOpenTuesday(){
		return $this->flag_tue == HolidaySetting::OPEN;
	}
	function isOpenWednesday(){
		return $this->flag_wed == HolidaySetting::OPEN;
	}
	function isOpenThursday(){
		return $this->flag_thu == HolidaySetting::OPEN;
	}
	function isOpenFriday(){
		return $this->flag_fri == HolidaySetting::OPEN;
	}
	function isOpenSaturday(){
		return $this->flag_sat == HolidaySetting::OPEN;
	}
	function isOpenSunday(){
		return $this->flag_sun == HolidaySetting::OPEN;
	}
	function isOpenHoliday(){
		return $this->flag_holiday == HolidaySetting::OPEN;
	}
	function isCloseMonday(){
		return $this->flag_mon == HolidaySetting::CLOSE;
	}
	function isCloseTuesday(){
		return $this->flag_tue == HolidaySetting::CLOSE;
	}
	function isCloseWednesday(){
		return $this->flag_wed == HolidaySetting::CLOSE;
	}
	function isCloseThursday(){
		return $this->flag_thu == HolidaySetting::CLOSE;
	}
	function isCloseFriday(){
		return $this->flag_fri == HolidaySetting::CLOSE;
	}
	function isCloseSaturday(){
		return $this->flag_sat == HolidaySetting::CLOSE;
	}
	function isCloseSunday(){
		return $this->flag_sun == HolidaySetting::CLOSE;
	}
	function isCloseHoliday(){
		return $this->flag_holiday == HolidaySetting::CLOSE;
	}

    private $holidays = null;

	function loadHoliday($year){
		$this->holidays = Yasumi::create("Japan", $year,"ja_JP");		
		// dd($this->holidays);
	}

	function isHoliday($date){
		// dd($date);

		// dd($this->holidays);

		if(!$this->holidays)return false;
		return $this->holidays->isHoliday($date);
	}

}

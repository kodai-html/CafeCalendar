<?php
namespace App\Calendar;

use Carbon\Carbon;

class CalendarWeekDay {
	protected $carbon;
  public $isHoliday = false;

	function __construct($date){
    // dd($this);
		$this->carbon = new Carbon($date);

    
    // dd($date);
	}

	function getClassName(){

    // dd(strtolower($this->carbon->format("D")));

    // dd($this->carbon->format("D"));

		$classNames = [ "day-" . strtolower($this->carbon->format("D")) ];

    // dd($classNames);

    // dd($this);

    //祝日フラグを出す

    // dd($this->isHoliday);

		if($this->isHoliday){

      // dd($this);

			$classNames[] = "day-close";
		}

		return implode(" ", $classNames);
	}

	/**
	 * @return 
	 */
	function render(){

    // dd($this->carbon->format("j"));

		return '<p class="day">' . $this->carbon->format("j"). '</p>';
	}

  /**
	 * 休みかどうかを判定する
	 */
	function checkHoliday(HolidaySetting $setting){

    // dd($setting);
		// dd($setting->isCloseSaturday());

		if($this->carbon->isMonday() && $setting->isCloseMonday()){

      // dd($this->isHoliday);
			$this->isHoliday = true;	
		}
		else if($this->carbon->isTuesday() && $setting->isCloseTuesday()){
			$this->isHoliday = true;	
		}
		else if($this->carbon->isWednesday() && $setting->isCloseWednesday()){
			$this->isHoliday = true;	
		}
		else if($this->carbon->isThursday() && $setting->isCloseThursday()){
			$this->isHoliday = true;	
		}
		else if($this->carbon->isFriday() && $setting->isCloseFriday()){
			$this->isHoliday = true;	
		}
		else if($this->carbon->isSaturday() && $setting->isCloseSaturday()){
			$this->isHoliday = true;
		}
    // dd($this->carbon->isSunday()); false
    // dd($setting->isCloseSunday()); true
		else if($this->carbon->isSunday() && $setting->isCloseSunday()){
			$this->isHoliday = true;	
		}
		
    // dd($this->carbon);
    // dd($setting->isHoliday($this->carbon));
		//祝日は曜日とは別に判定する
		if($setting->isCloseHoliday() && $setting->isHoliday($this->carbon)){
      // dd($this->isHoliday);
			$this->isHoliday = true;
		}
	}

  function getDateKey(){
		return $this->carbon->format("Ymd");
	}
	function setHoliday($flag){
		$this->isHoliday = $flag;
	}
}

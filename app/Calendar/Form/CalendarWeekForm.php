<?php
namespace App\Calendar\Form;

use Carbon\Carbon;
use App\Calendar\CalendarWeek;
use App\Calendar\HolidaySetting;

class CalendarWeekForm extends CalendarWeek {
	/**
	 * ExtraHolidays[]
	 */
	public $holidays = [];

	/**
	 * @return CalendarWeekDayForm
	 */
	function getDay(Carbon $date, HolidaySetting $setting){
		$day = new CalendarWeekDayForm($date);
		$day->checkHoliday($setting);

		// dd($day);
		// dd($day->extraHoliday);
		if(isset($this->holidays[$day->getDateKey()])) {
			$day->extraHoliday = $this->holidays[$day->getDateKey()];
		}

		return $day;
	}
}

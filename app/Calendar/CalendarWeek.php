<?php
namespace App\Calendar;

use Carbon\Carbon;
use App\Calendar\CalendarWeekBlankDay;
use App\Calendar\HolidaySetting;
use App\Calendar\CalendarWeekDay;

class CalendarWeek {

	protected $carbon;
	protected $index = 0;

	function __construct($date, $index = 0){
		$this->carbon = new Carbon($date);
		$this->index = $index;
	}

	function getClassName(){
		return "week-" . $this->index;
	}

	/**
	 * @return CalendarWeekDay[]
	 */
	function getDays(HolidaySetting $setting){

    // dd($setting);

		$days = [];

		//開始日〜終了日
		$startDay = $this->carbon->copy()->startOfWeek();
		$lastDay = $this->carbon->copy()->endOfWeek();

		//作業用
		$tmpDay = $startDay->copy();

    // dd($tmpDay); 4/25
    // dd($lastDay); 5/1

		//月曜日〜日曜日までループ
		while($tmpDay->lte($lastDay)){

      // dd($tmpDay->month); 4
      // dd($this->carbon->month); 5
			//前の月、もしくは後ろの月の場合は空白を表示
			if($tmpDay->month != $this->carbon->month){
				$day = new CalendarWeekBlankDay($tmpDay->copy());

        // dd($day);

				$days[] = $day;

        //翌日に移動
				$tmpDay->addDay(1);
				continue;	
			}
				
			//今月
      $days[] = $this->getDay($tmpDay->copy(), $setting);
			//翌日に移動
			$tmpDay->addDay(1);
		}
    // dd($days);
		
		return $days;
	}
	/**
	 * @return CalendarWeekDay
	 */
	function getDay(Carbon $date, HolidaySetting $setting){
		$day = new CalendarWeekDay($date);
		$day->checkHoliday($setting);
		return $day;
	}
}
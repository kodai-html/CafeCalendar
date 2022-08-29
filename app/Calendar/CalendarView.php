<?php
namespace App\Calendar;

use Carbon\Carbon;
use App\Calendar\HolidaySetting;
use App\Calendar\CalendarWeek;
use App\Calendar\ExtraHoliday;

class CalendarView {

	protected $carbon;
	protected $holidays = [];


	function __construct($date){
		$this->carbon = new Carbon($date);
	}
	/**
	 * タイトル
	 */
	public function getTitle(){
		return $this->carbon->format('Y年n月');
	}

	/**
	 * カレンダーを出力する
	 */
	function render(){

		// dd($this);


		// dd($this->holidays);
    $setting = HolidaySetting::first();

    // dd($this);
    // dd($setting);
    // dd($setting->loadHoliday($this->carbon->format("Y")));

 		$setting->loadHoliday($this->carbon->format("Y"));

    //臨時営業日の読み込み
		 $this->holidays = ExtraHoliday::getExtraHolidayWithMonth($this->carbon->format("Ym"));

		$html = [];
		$html[] = '<div class="calendar">';
		$html[] = '<table class="table">';
		$html[] = '<thead>';
		$html[] = '<tr>';
		$html[] = '<th>月</th>';
		$html[] = '<th>火</th>';
		$html[] = '<th>水</th>';
		$html[] = '<th>木</th>';
		$html[] = '<th>金</th>';
		$html[] = '<th>土</th>';
    $html[] = '<th>日</th>';
		$html[] = '</tr>';
		$html[] = '</thead>';

		$html[] = '<tbody>';
		
    // dd($setting);

    //週の初めの日を代入
		$weeks = $this->getWeeks();
    // dd($weeks);

		foreach($weeks as $week){

      // dd($week->getClassName());day-0

      // dd($week);

      // dd($setting);

			$html[] = '<tr class="'.$week->getClassName().'">';
			$days = $week->getDays($setting);

      // dd($days); 7日間のみ

			foreach($days as $day){
				$html[] = $this->renderDay($day); //renderDay($day)した$thisを格納

				// dd($html);
        
        // dd($day->getClassName()); day-blank

        // dd($day);
				// dd($day->isHoliday); false
        // if ($day->isHoliday) {
				// 	// $html[] = $this->renderDay($day);
        //   $html[] = '<td class="'.$day->getClassName().' day-close">';
        // } 
				// else {
        //   $html[] = '<td class="'.$day->getClassName().'">';
        // }

				// dd($html);
				// $html[] = $day->render();

				// dd($html);
				$html[] = '</td>';

				// dd($html);
			}
			// dd($html);
			$html[] = '</tr>';
		}
		
		$html[] = '</tbody>';
		$html[] = '</table>';
		$html[] = '</div>';

    // dd($days);
    // dd($html);

		return implode("", $html);
	}

  //週ごとの出力
	protected function getWeeks(){

		$weeks = [];

		//初日
		$firstDay = $this->carbon->copy()->firstOfMonth();

		//月末まで
		$lastDay = $this->carbon->copy()->lastOfMonth();

		//1週目
    $weeks[] = $this->getWeek($firstDay->copy());

		//作業用の日
		$tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();

		//月末までループさせる
		while($tmpDay->lte($lastDay)){
			//週カレンダーViewを作成する
      $weeks[] = $this->getWeek($tmpDay->copy(), count($weeks));
			
            //次の週=+7日する
			$tmpDay->addDay(7);
		}
		return $weeks;
	}
  protected function getWeek(Carbon $date, $index = 0){
    return new CalendarWeek($date, $index);
  }

		/**
	 * 日を描画する
	 */
	protected function renderDay(CalendarWeekDay $day){
		$html = [];
		$html[] = '<td class="'.$day->getClassName().'">';
		$html[] = $day->render(); //ここをコメントアウトすれば欄は残るが内容が消える
		$html[] = '</td>';
		return implode("", $html);
	}

	/**
	 * 次の月
	 */
	public function getNextMonth() {
		return $this->carbon->copy()->addMonthsNoOverflow()->format("Y-m");
	}

	/**
	 * 前の月
	 */
	public function getPreviousMonth() {
		return $this->carbon->copy()->subMonthsNoOverflow()->format("Y-m");
	}
}

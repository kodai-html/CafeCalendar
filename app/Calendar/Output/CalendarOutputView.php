<?php
namespace App\Calendar\Output;
use Carbon\Carbon;
use App\Calendar\CalendarView;
use App\Calendar\CalendarWeekDay;

class CalendarOutputView extends CalendarView {

  /**
   * 日を描画する
   */
  protected function renderDay(CalendarWeekDay $day) {
    $html = [];
    $extraHoliday = null;

    // dd($html);

    // dd($this);
    //臨時営業日設定で上書き
    // dd($day->getDateKey());
    // dd($this->holidays);
    // dd($this->holidays[$day->getDateKey()]);
    if(isset($this->holidays[$day->getDateKey()])){
			$extraHoliday = $this->holidays[$day->getDateKey()];

      // dd($extraHoliday);

			if($extraHoliday->isOpen()){
				$day->setHoliday(false);
			}else if($extraHoliday->isClose()){
				$day->setHoliday(true);
			}
		}

    $html[] = '<td class="'.$day->getClassName().'">';
    $html[] = $day->render();

    // dd($html);

    // dd($day->render());
    //コメントを表示
    // dd($extraHoliday);
    if($extraHoliday) {
      // dd($extraHoliday->comment);
      $html[] = '<p class="comment">'.e($extraHoliday->comment).'</p>';
    }
    $html[] = '</td>';

    return implode("", $html);
  }
}

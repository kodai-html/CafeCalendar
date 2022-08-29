<?php

namespace App\Http\Controllers\Calendar;

use App\Http\Controllers\Controller;
use App\Calendar\Form\CalendarFormView;
use App\Calendar\ExtraHoliday;
use Illuminate\Http\Request;

class ExtraHolidaySettingController extends Controller
{

	public function __construct(){
		$this->middleware('auth', ['only' => ['form']]);
  }
	public function form(Request $request){
		
		$date = $request->input('date');

		if($date && strlen($date) == 7) {
			$date = strtotime($date, '-01');
		} else {
			$date = null;
		}

		if(!$date) {
			$date = time();
		}
		$calendar = new CalendarFormView($date);
		return view('calendar/extra_holiday_setting_form', [
			"calendar" => $calendar
		]);
	}
	public function update(Request $request){
		$input = $request->get("extra_holiday");
		$ym = $request->input("ym");
		$date = $request->input("date");

		ExtraHoliday::updateExtraHolidayWithMonth($ym, $input);
        
		return redirect( route('root', ["date" => $date]) )
			->withStatus("休みを更新しました");
	}
}

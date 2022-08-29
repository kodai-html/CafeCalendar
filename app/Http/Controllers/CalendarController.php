<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar\Output\CalendarOutputView;

class CalendarController extends Controller
{
  public function show(Request $request){
		
		//クエリーのdateを受け取る
		$date = $request->input("date");

		if($date && preg_match("/^[0-9]{4}-[0-9]{2}$/", $date)) {
			$date = strtotime($date."-01");
		} else {
			$date = null;
		}

		if(!$date) {
			$date = time();
		}

		//カレンダーに渡す
		$calendar = new CalendarOutputView($date);
		return view('calendar', [
			"calendar" => $calendar
		]);
	}
}

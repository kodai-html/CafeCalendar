<?php

namespace App\Http\Controllers\Calendar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendar\HolidaySetting;
use Illuminate\Support\Facades\DB;

class HolidaySettingController extends Controller
{

	public function __construct(){
		$this->middleware('auth', ['only' => ['form']]);
    }
    function form(){
		
		//取得
		// $setting = HolidaySetting::firstOrCreate();
        $setting = HolidaySetting::first();
        if(!$setting)$setting = new HolidaySetting();
        
		return view("calendar/holiday_setting_form", [
			"setting" => $setting,
			"FLAG_OPEN" => HolidaySetting::OPEN,
			"FLAG_CLOSE" => HolidaySetting::CLOSE
		]);
	}
	function update(Request $request){
        $inputs = $request->all();

        $data = HolidaySetting::first();
        // dd($data);

        \DB::beginTransaction();
        try{
            $data->fill([
                'flag_mon' => $inputs['flag_mon'],
                'flag_tue' => $inputs['flag_tue'],
                'flag_wed' => $inputs['flag_wed'],
                'flag_thu' => $inputs['flag_thu'],
                'flag_fri' => $inputs['flag_fri'],
                'flag_sat' => $inputs['flag_sat'],
                'flag_sun' => $inputs['flag_sun'],
                'flag_holiday' => $inputs['flag_holiday']
            ]);

            $attributes = $request->only(['flag_mon', 'flag_tue', 'flag_wed', 'flag_thu', 'flag_fri', 'flag_sat' ,'flag_sun' ,'flag_holiday']);
            $data->save($attributes);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            $e->getMessage();
            abort(500);
        }

        return redirect(route('holiday_setting'))
        ->withStatus("更新しました");
	}
}

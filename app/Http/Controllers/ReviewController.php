<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function __construct(){
	    $this->middleware('auth');
    }

    public function send(Request $request) {

        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            Review::create($inputs);
            \DB::commit();

        } catch(\Throwable $e){
            \DB::rollback();
            $e->getMessage();
            abort(500);
        }

        \Session::flash('err_msg', '送信しました。');
        return redirect(route('root'));
    }

    public function list() {

        $reviews = Review::all();

        return view("review", ['reviews'=>$reviews]);
    }
}

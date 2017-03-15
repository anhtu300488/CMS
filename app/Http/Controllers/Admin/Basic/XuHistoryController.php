<?php

namespace App\Http\Controllers\Admin\Basic;

use App\MoneyLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class XuHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userName = \Request::get('userName');
        $fromDate = \Request::get('fromDate');
        $toDate = \Request::get('toDate');

        $query = MoneyLog::query()->where('changeGold','>',0);
        if($userName != ''){
            $query->where('userName','LIKE','%'.$userName.'%');
        }
//        if($fromDate != '' && $toDate != ''){
//            $start = date("Y-m-d",strtotime($fromDate));
//            $end = date("Y-m-d",strtotime($toDate));
//            $query->whereBetween('purchasedTime',[$start,$end]);
//        }
        $data = $query->orderBy('userName')->paginate(10);

        return view('admin.basic.xuHistory.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 10);
    }
}

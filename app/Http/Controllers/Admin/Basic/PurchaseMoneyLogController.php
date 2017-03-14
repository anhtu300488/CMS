<?php

namespace App\Http\Controllers\Admin\Basic;

use App\purchaseMoneyLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseMoneyLogController extends Controller
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
        $payType = \Request::get('payType');
//        $cardType = \Request::get('cardType');
//        $os = \Request::get('os');
//
        $matchThese = [];
        if($payType != ''){
            $matchThese['type'] = $payType;
        }

        $query = purchaseMoneyLog::query();
        if($userName != ''){
            $query->where('userName','LIKE','%'.$userName.'%');
        }
        $query->where($matchThese);
        if($fromDate != '' && $toDate != ''){
            $start = date("Y-m-d",strtotime($fromDate));
            $end = date("Y-m-d",strtotime($toDate));
            $query->whereBetween('purchasedTime',[$start,$end]);
        }
        $data = $query->orderBy('userName')->paginate(10);

        return view('admin.basic.purchaseMoneyLog.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 10);
    }
}

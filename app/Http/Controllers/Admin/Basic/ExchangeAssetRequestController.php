<?php

namespace App\Http\Controllers\Admin\Basic;

use App\ExchangeAssetRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExchangeAssetRequestController extends Controller
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
        $status = \Request::get('status');
        $matchThese = [];
        if($status != ''){
            $matchThese['status'] = $status;
        }

        $query = ExchangeAssetRequest::query();
        if($userName != ''){
            $query->where('requestUserName','LIKE','%'.$userName.'%');
        }
        $query->where($matchThese);
        if($fromDate != '' && $toDate != ''){
            $start = date("Y-m-d",strtotime($fromDate));
            $end = date("Y-m-d",strtotime($toDate));
            $query->whereBetween('purchasedTime',[$start,$end]);
        }
        $data = $query->orderBy('requestUserName')->paginate(10);

        return view('admin.basic.exchangeAssetRequest.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 10);
    }
}

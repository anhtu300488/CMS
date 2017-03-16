<?php

namespace App\Http\Controllers\Admin\Revenue;

use App\PurchaseMoneyLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RechargeTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userName = \Request::get('userName');
        $dateCharge = \Request::get('date_charge') ? explode(" - ", \Request::get('date_charge')) : null;
        $datePlayGame = \Request::get('date_play_game') ? explode(" - ", \Request::get('date_play_game')): null;
        $type = \Request::get('type');
        $partner = \Request::get('partner_id');
        $os = \Request::get('os_id');

        $matchThese = [];
        if($type != ''){
            $matchThese['type'] = $type;
        }

        $query = PurchaseMoneyLog::select('*', DB::raw('user.displayName AS displayName'))
        ->join('user', function($join)
        {
            $join->on('user.userId', '=', 'purchase_money_log.userId');

        });
        if($userName != ''){
            $query->where('purchase_money_log.userName','LIKE','%'.$userName.'%');
        }
        $query->where($matchThese);

        if($dateCharge != ''){
            $startDateCharge = $dateCharge[0];

            $endDateCharge = $dateCharge[1];

            if($startDateCharge != '' && $endDateCharge != ''){
                $start = date("Y-m-d 00:00:00",strtotime($startDateCharge));
                $end = date("Y-m-d 23:59:59",strtotime($endDateCharge));
                $query->whereBetween('purchase_money_log.purchasedTime',[$start,$end]);
            }
        }

        if($datePlayGame != ''){
            $startPlayGame = $datePlayGame[0];

            $endPlayGame = $datePlayGame[1];

            if($startPlayGame != '' && $endPlayGame != ''){
                $start1 = date("Y-m-d 00:00:00",strtotime($startPlayGame));
                $end1 = date("Y-m-d 23:59:59",strtotime($endPlayGame));
                $query->whereBetween('user.startPlayedTime',[$start1,$end1]);
            }
        }


        $data = $query->orderBy('purchase_money_log.userName')->paginate(10);

        return view('admin.revenue.rechargeTransaction.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 10);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LogPayment extends Model
{
    protected $table = 'log_payment';

    public function getDataByKeyword($query, $user, $fromDate, $toDate, $payType, $cardType, $os)
    {
        if ($user!='') {
            $query->where(function ($query) use ($user) {
                $query->where("userid", "=","$user");
            });
        }
        if ($payType!='') {
            $query->where(function ($query) use ($payType) {
                $query->where("type", "=","$payType");
            });
        }
        if ($cardType!='') {
            $query->where(function ($query) use ($cardType) {
                $query->where("type", "=","$cardType");
            });
        }
        if ($os!='') {
            $query->where(function ($query) use ($os) {
                $query->where("type", "=","$os");
            });
        }
        return $query;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllData()
    {
        return DB::table('log_payment')->where('id', '=', 1)->paginate(10);
    }
}

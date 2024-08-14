<?php

namespace App\Http\Controllers\Boilerplate;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use DB;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('boilerplate::dashboard');
    }

    function visitorByMonth()
    {
        $label = [];
        $total = [];
        for ($i = 0; $i <= 5; $i++)  {
            array_unshift($label, date("M-Y", strtotime( date( 'Y-m-01' )." -$i months")));

            $count = DB::table('shetabit_visits')
                ->whereYear('created_at', '=', date("Y", strtotime( date( 'Y-m-01' )." -$i months")))
                ->whereMonth('created_at', '=', date("m", strtotime( date( 'Y-m-01' )." -$i months")))
                ->count();

            array_unshift($total, $count);
        }

        $chart = array(
            'data'   => $total,
      		'labels' => $label,
        );

        return response()->json($chart);
    }
}

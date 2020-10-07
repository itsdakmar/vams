<?php

namespace App\Http\Controllers;

use App\Models\ServiceHistory;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        $user = User::all()->count();
        $vehicle = Vehicle::all()->count();
        $service = ServiceHistory::all();
        $service_total = $service->count();
        $service_cost = 'RM'. $service->sum('kos');

        return view('dashboard' , compact('user','vehicle','service_total','service_cost'));
    }

    public function logout()
    {
        auth('web')->logout();
        return redirect()->route('dashboard');
    }

    public function getJumlahPenyelenggaran()
    {
        $services = ServiceHistory::whereYear('tarikh', Carbon::today()->format('Y'))
            ->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->tarikh)->format('m');
            });

        $arr = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
            8 => 0,
            9 => 0,
            10 => 0,
            11 => 0,
            12 => 0,
        ];

        foreach ($services as $key => $service) {
            $arr[(int)$key] = $service->count();
        }

        return json_encode(array_values($arr));
    }

//    public function getJumlahJenisPenyelenggaran(){
//        $type = DB::table('service_histories')
//            ->select('website_id', DB::raw('COUNT(id) as errors'))
//            ->groupBy('website_id')
//            ->orderBy(DB::raw('COUNT(id)'), 'DESC')
//            ->take(10)
//            ->get();
//    }
}

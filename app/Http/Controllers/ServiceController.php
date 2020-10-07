<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Mail\NotificationDayBeforeMail;
use App\Mail\PostponedMail;
use App\Models\ServiceHistory;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ServiceController extends Controller
{
    public function confirmation($service_id){
        $service = ServiceHistory::where('id', $service_id)->with('vehicle')->first();
        return view('service.show', compact('service'));
    }

    public function confirmed($service_id){
        $service = ServiceHistory::findOrFail($service_id);
        $service->update([
            'status' => 'confirmed'
        ]);

        return redirect()->route('service.confirmation', $service_id)->with('status', 'Tarikh penyelenggaran berjaya disahkan!');

    }

    public function postponed($service_id){
        $service = ServiceHistory::findOrFail($service_id);
        $service->update([
            'status' => 'postponed'
        ]);

        $admin = User::whereHas("roles", function($q){ $q->where("name", "Admin"); })->pluck('email');

        Mail::to($admin)->send(new PostponedMail($service, Auth::user()->name));

        return redirect()->route('service.confirmation', $service_id)->with('status', 'Penangguhan tarikh penyelenggaran berjaya dihantar!');
    }

    public function create(){
        return view('service.create');
    }

    public function store(ServiceRequest $request){
        $arr = [
            'kos' => $request->kos,
            'status' => 'confirmation',
            'vehicle_id' => Vehicle::where('no_kenderaan',trim($request->no_kenderaan))->pluck('id')->first(),
            'tarikh' => Carbon::parse($request->tarikh),
        ];

        $arr2 = array_merge($arr, $request->service);

        ServiceHistory::create(
            $arr2
        );

        return redirect()->route('vehicles.service.upcoming')->with('status', 'Penyelenggaran berjaya dicipta!');
    }

    public function edit($service_id){
        $data = ServiceHistory::findOrFail($service_id);
        return view('service.update' , compact('data'));
    }

    public function update(ServiceRequest  $request, $service_id){
        $service = ServiceHistory::findOrFail($service_id);

        $arr = [
            'kos' => $request->kos,
            'status' => 'confirmation',
            'vehicle_id' => Vehicle::where('no_kenderaan',trim($request->no_kenderaan))->pluck('id')->first(),
            'tarikh' => Carbon::parse($request->tarikh),
        ];

        $arr2 = array_merge($arr, $request->service);

        $service->update($arr2);

        return redirect()->route('vehicles.service.upcoming')->with('status', 'Penyelenggaran berjaya dikemaskini!');

    }

    public function delete($service_id){
        ServiceHistory::findOrFail($service_id)->delete();

        return redirect()->route('vehicles.service.upcoming')->with('status', 'Penyelenggaran berjaya dipadam!');

    }
}

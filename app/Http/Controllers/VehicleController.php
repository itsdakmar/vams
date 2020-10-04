<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Imports\ServiceHistoriesImport;
use App\Imports\VehicleImport;
use App\Models\Office;
use App\Models\ServiceHistory;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('vehicles.datatables.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $offices = Office::all();
        return view('vehicles.create', compact('offices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $vehicle = Vehicle::with('office', 'serviceHistories')->where('id', $id)->first();
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Getting all Vehicle resource.
     *
     * @return DataTables
     */
    public function getVehicles()
    {
        $data = Vehicle::with('office')->get();

        return DataTables::of($data)
            ->editColumn('tarikh_pendaftaran', function ($datum) {
                return date('d F Y', strtotime($datum->tarikh_pendaftaran));
            })
            ->editColumn('tarikh_perolehan', function ($datum) {
                return date('d F Y', strtotime($datum->tarikh_perolehan));
            })
            ->addColumn('action', function ($datum) {
                return '<button type="button" class="btn bg-transparent _r_btn border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <span class="_dot _r_block-dot bg-dark"></span>
                                                                                                    <span class="_dot _r_block-dot bg-dark"></span>
                                                                                                    <span class="_dot _r_block-dot bg-dark"></span>
                                                                                                </button>
                                                                                                <div class="dropdown-menu" x-placement="bottom-start">
                                                                                                    <a class="dropdown-item" href="' . route('vehicles.show', $datum->id) . '"><i class="nav-icon i-Eye text-success font-weight-bold mr-2"></i>Papar Maklumat</a>
                                                                                                </div>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for uploading a vehicles by excel.
     *
     * @return \Illuminate\View\View
     */
    public function excel()
    {
        return view('vehicles.upload-excel');
    }

    public function excelUpload(Request $request)
    {
        Excel::import(new VehicleImport(), $request->file('vehicles'));
        return redirect()->route('vehicles.index')->with('status', 'Muat Naik Maklumat Premis Berjaya!');
    }

    public function service()
    {
        return view('vehicles.upload-service');
    }

    public function serviceUpload(Request $request)
    {
        Excel::import(new ServiceHistoriesImport(), $request->file('services'));
        return redirect()->route('vehicles.index')->with('status', 'Muat Naik Maklumat Sejarah Penyelenggaraan Berjaya!');
    }

    public function getServiceHistories($vehicle_id)
    {

        $data = ServiceHistory::where('vehicle_id', $vehicle_id)->get();

        return DataTables::of($data)
            ->editColumn('tarikh', function ($datum) {
                return $datum->tarikh->timestamp;
            })
            ->editColumn('servis', function ($datum) {
                return ($datum->servis !== NULL) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '';
            })
            ->editColumn('enjin', function ($datum) {
                return ($datum->enjin !== NULL) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '';
            })
            ->editColumn('brek', function ($datum) {
                return ($datum->brek !== NULL) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '';
            })
            ->editColumn('transmisi', function ($datum) {
                return ($datum->transmisi !== NULL) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '';
            })
            ->editColumn('steering', function ($datum) {
                return ($datum->steering !== NULL) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '';
            })
            ->editColumn('suspension', function ($datum) {
                return ($datum->suspension !== NULL) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '';
            })
            ->editColumn('casis', function ($datum) {
                return ($datum->casis !== NULL) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '';
            })
            ->editColumn('pam_jentera', function ($datum) {
                return ($datum->pam_jentera !== NULL) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '';
            })
            ->editColumn('kos', function ($datum) {
                return number_format($datum->kos, 2);
            })
            ->rawColumns(['servis', 'enjin', 'brek', 'transmisi', 'steering', 'suspension', 'casis', 'pam_jentera'])
            ->make(true);
    }

    public function serviceUpcoming()
    {
        return view('vehicles.services');
    }

    public function getServiceUpcoming()
    {
        $data = ServiceHistory::with('vehicle')->where('tarikh', '>=', Carbon::now())->get();

        return DataTables::of($data)
            ->editColumn('tarikh', function ($datum) {
                return $datum->tarikh->timestamp;
            })
            ->editColumn('servis', function ($datum) {
                return ($datum->servis !== NULL) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '';
            })
            ->editColumn('enjin', function ($datum) {
                return ($datum->enjin !== NULL) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '';
            })
            ->editColumn('brek', function ($datum) {
                return ($datum->brek !== NULL) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '';
            })
            ->editColumn('transmisi', function ($datum) {
                return ($datum->transmisi !== NULL) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '';
            })
            ->editColumn('steering', function ($datum) {
                return ($datum->steering !== NULL) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '';
            })
            ->editColumn('suspension', function ($datum) {
                return ($datum->suspension !== NULL) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '';
            })
            ->editColumn('casis', function ($datum) {
                return ($datum->casis !== NULL) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '';
            })
            ->editColumn('pam_jentera', function ($datum) {
                return ($datum->pam_jentera !== NULL) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '';
            })
            ->editColumn('kos', function ($datum) {
                return number_format($datum->kos, 2);
            })
            ->rawColumns(['servis', 'enjin', 'brek', 'transmisi', 'steering', 'suspension', 'casis', 'pam_jentera'])
            ->make(true);
    }

    public function getSelectVehicles(Request $request)
    {

        $search = $request->search;

        if ($search == '') {
            $vehicles = Vehicle::orderby('no_kenderaan', 'asc')->select('id', 'no_kenderaan')->limit(5)->get();
        } else {
            $vehicles = Vehicle::orderby('no_kenderaan', 'asc')->select('id', 'no_kenderaan')->where('no_kenderaan', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($vehicles as $vehicle) {
            $response[] = array(
                "id" => $vehicle->no_kenderaan,
                "text" => $vehicle->no_kenderaan
            );
        }

        echo json_encode($response);
        exit;
    }

    public function serviceConfirmation($service_id){
        return $service_id;
    }
}

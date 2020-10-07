<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\WelcomeMail;
use App\Models\Office;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('users.datatables.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $positions = Position::all();
        $offices = Office::all();

        return view('users.create', compact('positions','offices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $password = rand ( 10000 , 99999 );

        $user = User::create([
            'name' => $request->get('name'),
            'position_id' => ($request->has('position')) ? $request->get('position') : NULL,
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'office_id' => $request->get('office'),
            'password' => Hash::make($password)
        ]);

        if($request->user == 1){
            $user->assignRole('Admin');
        }

        Mail::to($user->email)->send(new WelcomeMail($user->name, $password));

        return redirect()->route('users.index')->with('status', 'Pengguna berjaya didaftarkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Getting all User resource.
     *
     * @return DataTables
     */
    public function getUsers()
    {
        $data = User::with('office', 'position')->get();

        return DataTables::of($data)
            ->editColumn('created_at', function ($datum)
            {
                return date('d F Y', strtotime($datum->created_at));
            })
            ->addColumn('balai', function ($datum) {
                if($datum->office){
                    return $datum->office->name;
                }else {
                    return '-';
                }
            })
            ->addColumn('action', function ($datum) {
                return '';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}

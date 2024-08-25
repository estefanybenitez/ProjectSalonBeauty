<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Status;
use App\Models\Service;
use App\Models\Appointment;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view for appointment show
        $appointment = Appointment::select(

            "appointment.id_appointment",
            "appointment.date",
            "appointment.time",
            "appointment.fk_user",
            "appointment.fk_status",
            "appointment.fk_service",

            "users.id_user",
            "users.name as user",

            "status.id_status",
            "status.name_status as status",

            "service.id_service",
            "service.name_service as service",

        )
        ->join("users", "users.id_user", "=", "appointment.fk_user")
        ->join("status", "status.id_status", "=", "appointment.fk_status")
        ->join("service", "service.id_service", "=", "appointment.fk_service")
        ->get();

        return view('/appointment/AppointmentShow')->with(['appointment' => $appointment]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        $appointment = Appointment::all();
        $users = User::all();
        $status = Status::all();
        $service = Service::all();

        return view('/appointment/AppointmentCreate')
        ->with([
        'appointment' => $appointment,
        'users' => $users,
        'status' => $status,
        'service' => $service]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = request()->validate([
            'date'=> 'required',
            'time' => 'required',
            'fk_user' => 'required',
            'fk_status' => 'required',
            'fk_service' => 'required',

        ]);

        //save info
        Appointment::create($data);

        return redirect('/appointment/show');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_appointment)
    {
        //
        $appointment = Appointment::select(
            "appointment.id_appointment",
            "appointment.date",
            "appointment.time",
            "appointment.fk_user",
            "appointment.fk_status",
            "appointment.fk_service"
        )
        ->join("users", "users.id_user", "=", "appointment.fk_user")
        ->join("status", "status.id_status", "=", "appointment.fk_status")
        ->join("service", "service.id_service", "=", "appointment.fk_service")
        ->find($id_appointment);

        $users = User::all();
        $status = Status::all();
        $service = Service::all();

        return view('/appointment/AppointmentUpdate')->with([
            'appointment' => $appointment, 
            'users' => $users,
            'status' => $status,
            'service' => $service]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointments)
    {
        //
        $data = request()->validate([
            'date'=> 'required',
            'time' => 'required',
            'fk_user' => 'required',
            'fk_status' => 'required',
            'fk_service' => 'required',

        ]);
        $appointments->date=$data['date'];
        $appointments->time=$data['time'];
        $appointments->fk_user=$data['fk_user'];
        $appointments->fk_status=$data['fk_status'];
        $appointments->fk_service=$data['fk_service'];
        
        $appointments->updated_at = now();
        $appointments->save();

        return redirect('/appointment/show');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Appointment::destroy($id);
        return response()->json(array('res' => true));
    }
}

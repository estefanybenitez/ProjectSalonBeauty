<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Service;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $payment = Payment::select(

            "payment.id_payment",
            "payment.cost",
            "payment.paymentmethod",
            "payment.fk_service",
            "payment.fk_user",

            "users.id_user",
            "users.name as user",

            "service.id_service",
            "service.name_service as service",

        )
        ->join("users", "users.id_user", "=", "payment.fk_user")
        ->join("service", "service.id_service", "=", "payment.fk_service")
        ->get();

        return view('/payment/PaymentShow')->with(['payment' => $payment]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $payment = Payment::all();
        $users = User::all();
        $service = Service::all();

        return view('/payment/PaymentCreate')
        ->with([
        'payment' => $payment,
        'users' => $users,
        'service' => $service]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = request()->validate([
            'cost'=> 'required',
            'paymentmethod' => 'required',
            'fk_service' => 'required',
            'fk_user' => 'required',

        ]);

        //save info
        Payment::create($data);

        return redirect('/payment/show');
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
    public function edit($id_payment)
    {
        //
        $payment = Payment::select(
            "payment.id_payment",
            "payment.cost",
            "payment.paymentmethod",
            "payment.fk_user",
            "payment.fk_service"
        )
        ->join("users", "users.user_id", "=", "payment.fk_user")
        ->join("service", "service.id_service", "=", "payment.fk_service")
        ->find($id_payment);

        $users = User::all();
        $service = Service::all();

        return view('/payment/PaymentUpdate')->with([
            'payment' => $payment, 
            'users' => $users,
            'service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payments)
    {
        //
        $data = request()->validate([
            'cost'=> 'required',
            'paymentmethod' => 'required',
            'fk_service' => 'required',
            'fk_user' => 'required',

        ]);
        $payments->cost=$data['cost'];
        $payments->paymentmethod=$data['paymentmethod'];
        $payments->fk_user=$data['fk_user'];
        $payments->fk_service=$data['fk_service'];
        
        $payments->updated_at = now();
        $payments->save();

        return redirect('/payment/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Payment::destroy($id);
        return response()->json(array('res' => true));
    }
}

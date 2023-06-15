<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CustomerController extends Controller
{
    //

    public function index()
    {
        try {

        $students = Customer::all();

        return response()->json([
            "success" => true,
            "message" => "Student List",
            "data" => $students
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function store(Request $request)
    {
        try {

        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => ['required', 'string', 'email'],
            'address' => 'required',
            'rating' => 'required',
            'balance' => 'required',
            'date' => 'required'
        ]);
        // dd($data);

        // $input = $request->all();
        // $validator = Validator::make($input, [
        //     'name' => 'required',
        //     'phone' => 'required',
        //     'email' => ['required','string', 'email'],
        //     'address' => 'required',
        //     'rating' => 'required',
        //     'balance' => 'required',
        //     'date' => 'required'
        // ]);
        // if ($validator->fails()) {
        //     return  $validator->errors();
        // }
        $customer = Customer::create($data);
        return response()->json([
            "success" => true,
            "message" => "Customer created successfully.",
            "data" => $customer
        ], 201);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function update(Request $request, Customer $customer)
    {
        try {

        $input = $request->all();
        dd($request->get('name'));
        $customer->name = $input['name'];
        $customer->detail = $input['detail'];
        $customer->save();
      

        // $customer = Customer::find($id);
        $customer->update($request->all());
        
        return $customer->save();

        $validator = Validator::make($input, [
            'name' => 'required',
            'phone' => 'required',
            'email' => ['required', 'string', 'email'],
            'address' => 'required',
            'rating' => 'required',
            'balance' => 'required',
            'date' => 'required'
        ]);

        // if ($validator->fails()) {
        //     return  $validator->errors();
        // }

        $customer->name = $input['name'];
        $customer->phone = $input['phone'];
        $customer->email = $input['email'];
        $customer->address = $input['address'];
        $customer->rating = $input['rating'];
        $customer->balance = $input['balance'];
        $customer->date = $input['date'];
        $customer->save();

        return response()->json([
            "success" => true,
            "message" => "Student updated successfully.",
            "data" => $customer
        ]);

        // $request->validate([
        //     'name' => 'required',
        //     'phone' => 'required',
        //     'email' => ['required', 'string', 'email'],
        //     'address' => 'required',
        //     'rating' => 'required',
        //     'balance' => 'required',
        //     'date' => 'required'
        // ]);

        // $customer = Customer::find($id);
        // $customer->name = $request->get('name');
        // $customer->phone = $request->get('phone');
        // $customer->email = $request->get('email');
        // $customer->address = $request->get('address');
        // $customer->rating = $request->get('rating');
        // $customer->balance = $request->get('balance');
        // $customer->date = $request->get('date');

        // // dd($customer);
        // $customer->save();

        // return response()->json([
        //     "success" => true,
        //     "message" => "Product updated successfully.",
        //     "data" => $customer
        // ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    public function show($id)
    {
        try {

        $customer = Customer::find($id);
        return $customer;
        if (is_null($customer)) {
            return $this->sendError('Product not found.');
        }
        return response()->json([
            "success" => true,
            "message" => "Product retrieved successfully.",
            "data" => $customer
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

        $customer = Customer::find($id);
        $customer->delete();

        return response()->json([
            "success" => true,
            "message" => "Customer deleted successfully."
        ]);
    }
    catch (\Exception $e) {

                throw new \App\Exceptions\LogData($e);    
       }
    }
}

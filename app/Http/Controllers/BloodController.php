<?php

namespace App\Http\Controllers;

use App\Models\Blood;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BloodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blood = Blood::all();
        $a = Blood::where('blood', 'A')->count();
        $b = Blood::where('blood', 'B')->count();
        $ab = Blood::where('blood', 'AB')->count();
        $o = Blood::where('blood', 'O')->count();

        return view('dashboard', compact('blood','a','b','ab','o'));
    }

    public function dashboard()
    {
        $blood = Blood::all();
        $a = Blood::where('blood', 'A')->count();
        $b = Blood::where('blood', 'B')->count();
        $ab = Blood::where('blood', 'AB')->count();
        $o = Blood::where('blood', 'O')->count();

        return view('dashboard', compact('blood','a','b','ab','o'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([
            'nik' => 'required|min:4',
            'age' => 'required',
            'name' => 'required',
            'address' => 'required',
        ]);
        Blood::create([
            'nik'=> $request->nik,
            'age' => $request->age,
            'name' => $request->name,
            'address' => $request->address,
        ]);
        Alert::success('You have successfully added data !');
        return redirect('/dashboard');
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
        $blood = Blood::where('id', $id)->first();
        return view('edit', compact('blood'));
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
        $request ->validate([
            'nik' => 'required|min:4',
            'age' => 'required',
            'name' => 'required',
            'address' => 'required',
            'blood' => 'required',
            'cc' => 'required',
        ]);
        Blood::where('id', $id)->update([
            'nik'=> $request->nik,
            'age' => $request->age,
            'name' => $request->name,
            'address' => $request->address,
            'blood' => $request->blood,
            'cc' => $request->cc*350,
        ]);
        Alert::success('Successfully deleted data!');

        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blood::where('id', $id)->delete();
        Alert::success('Successfully deleted data!');

        return redirect('/dashboard');
    }
}

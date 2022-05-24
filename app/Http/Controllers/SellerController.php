<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::paginate(5);
        return view('welcome',['sellers' => $sellers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {

        $validated = $req->validate([
            'id'=>'required',
            'full_name'=>'required',
            'email'=>'required',
            'telephone'=>'required|max:10|min:10',
            'joined_date'=>'required',
            'current_routes'=>'required',
            'comments'=>'required:max:190',
        ]);

        if ($validated){
            $seller = new Seller();
            $seller-> id=$req->id;
            $seller-> full_name=$req->full_name;
            $seller-> email=$req->email;
            $seller-> telephone=$req->telephone;
            $seller-> joined_date=$req->joined_date;
            $seller-> current_routes=$req->current_routes;
            $seller-> comments=$req->comments;
            $seller->save();
            if ($seller){
                return redirect()->back()->with('Seller Created Successfully');
            }
            return redirect()->back()->with('Seller Created Failed');

        }
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
      $seller = Seller::find($id);
//
//      if (!$seller){
//          return back()->with('Error', 'Seller Not Found');
//      }
//      $seller->update($request->all());
//      return back()->with('Success', 'Seller Updated');
        $seller->full_name=$request->input('full_name');
        $seller->email=$request->input('email');
        $seller->telephone=$request->input('telephone');
        $seller->joined_date=$request->input('joined_date');
        $seller->current_routes=$request->input('current_routes');
        $seller->comments=$request->input('comments');
        $seller->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seller = Seller::find($id);

        $seller->delete();
        return redirect('/');
//        if (!$seller){
//            return back()->with('Error', 'Seller Not Found');
//        }
//        $seller->delete();
//        return back()->with('Success', 'Seller Deleted');
    }
}

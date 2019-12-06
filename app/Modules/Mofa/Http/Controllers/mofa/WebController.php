<?php

namespace App\Modules\Mofa\Http\Controllers\mofa;

use App\Models\Mofa\Mofa;
use App\Models\Recruit\Recruitorder;
use App\Modules\Mofa\Http\Requests\mofa\CreatePostRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mofa =Mofa::all();

        return view('mofa::mofa.index')->with('mofa',$mofa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pax= Recruitorder::all();

        return view('mofa::mofa.create')->with('pax',$pax);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $mofa = new Mofa();

        $mofa->pax_id =$request->pax_ref;
        $mofa->mofaNumber =$request->mofa_number;
        $mofa->iqamaNumber =$request->iqamaNumber;
        $mofa->mofaDate =$request->mofa_date;
        $mofa->status =$request->status;
        $mofa->comment =$request->comments;
        $mofa->created_by = Auth::id();
        $mofa->updated_by = Auth::id();


        if( $mofa->save())
        {
            return Redirect::route('mofa')->withInput()->with('alert.status', 'success')
                ->with('alert.message', 'Mofa added successfully!');
        }else{
            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
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
        $pax= Recruitorder::all();
        $mofa = Mofa::find($id);
        return view('mofa::mofa.edit')->with(array('pax'=>$pax,'mofa'=>$mofa));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePostRequest $request, $id)
    {
        $mofa = Mofa::find($id);

        $mofa->pax_id =$request->pax_ref;
        $mofa->mofaNumber =$request->mofa_number;
        $mofa->iqamaNumber =$request->iqamaNumber;
        $mofa->mofaDate =$request->mofa_date;
        $mofa->status =$request->status;
        $mofa->comment =$request->comments;
        $mofa->updated_by = Auth::id();


        if( $mofa->save())
        {
            return Redirect::route('mofa')->withInput()->with('alert.status', 'success')
                ->with('alert.message', 'Mofa updated successfully!');
        }else
        {
            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Sorry, something went wrong! Data cannot be saved.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
            $mofa= Mofa::find($id);
            $mofa->delete();
            return back()->withInput()->with('alert.status', 'danger')
                ->with('alert.message', 'Visa deleted.');
    }
}

<?php

namespace App\Http\Controllers\Account;

use App\Reference;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CreateReferenceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! Auth::guest()) {
            return Response::json(
                Auth::user()->references()->get(),
                200
            );
        }

        return Response::json(null, 201);
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
     * @param CreateReferenceRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateReferenceRequest $request)
    {
        $user = Auth::user();
        $user->references()->create($request->all());

        return redirect()->back()->with('messages',  ['Reference successfully created']);
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
        return Response::json([
            'success' => false,
            'messages' => [
                'Reference was not found'
            ],
        ], 400);

        try {
            $reference = Reference::findOrFail($id);

            $reference->delete();
        }
        catch (ModelNotFoundException $ex) {

        }

        return Response::json([
            'success' => true,
            'messages' => [
                'Reference successfully deleted'
            ],
        ], 200);
    }
}

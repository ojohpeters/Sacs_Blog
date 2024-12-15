<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreApiBlogRequest;
use App\Http\Requests\UpdateApiBlogRequest;
use Illuminate\Http\Request;
use App\Models\ApiBlog;
use Exception;

class ApiBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $BlogPosts = ApiBlog::all();
            if ($BlogPosts->isEmpty()) {
                return response()->json([
                    'Message' => 'No Post Found On DataBase',
                ]);
            } else {
                return response()->json([
                    'Message' => 'Welcome',
                    'Posts' => $BlogPosts,
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $data = $request->validate([
                'Title' => 'required',
                'MainPost' => 'required|min:2|max:255',
            ]);
            ApiBlog::create($data);
            return response()->json([
                'Message' => 'Successfully Added Data to the Database',
                'Data' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'Error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ApiBlog $apiBlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApiBlog $apiBlog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApiBlogRequest $request, ApiBlog $apiBlog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApiBlog $apiBlog)
    {
        //
    }
}

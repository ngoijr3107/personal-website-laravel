<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EducationsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = "Dashboard - Education";
        $educations = Education::all();

        return view('admin.pages.educations.index', [
            'title'      => $title,
            'educations' => $educations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $title = "Dashboard - Create Education";

        return view('admin.pages.educations.create', [
            'title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'education_title'       => 'required',
            'starting_date'         => 'required',
            'ending_date'           => 'nullable',
            'education_description' => 'required'
        ]);

        Education::create([
            'education_title'       => $request->education_title,
            'starting_date'          => $request->starting_date,
            'ending_date'            => $request->ending_date,
            'education_description' => $request->education_description,
            'created_at'             => Carbon::now()
        ]);
        toast('Education Created!', 'success');

        return redirect()->route('educations.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $title = "Dashboard - Edit Education";
        $education = Education::find($id);

        return view('admin.pages.educations.edit', [
            'title'     => $title,
            'education' => $education
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'education_title'       => 'required',
            'starting_date'         => 'required',
            'ending_date'           => 'nullable',
            'education_description' => 'required'
        ]);

        Education::find($id)->update([
            'education_title'       => $request->education_title,
            'starting_date'          => $request->starting_date,
            'ending_date'            => $request->ending_date,
            'education_description' => $request->education_description
        ]);
        toast('Education Updated!', 'success');

        return redirect()->route('educations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Education::find($id)->delete();
        toast('Education Deleted!', 'warning');

        return redirect()->route('educations.index');
    }
}

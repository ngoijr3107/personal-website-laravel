<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExperiencesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = "Dashboard - Experiences";
        $experiences = Experience::all();

        return view('admin.pages.experiences.index', [
            'title'       => $title,
            'experiences' => $experiences
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $title = "Dashboard - Create Experience";

        return view('admin.pages.experiences.create', [
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
            'experience_title'       => 'required',
            'starting_date'          => 'required',
            'ending_date'            => 'nullable',
            'experience_description' => 'required'
        ]);

        Experience::create([
            'experience_title'       => $request->experience_title,
            'starting_date'          => $request->starting_date,
            'ending_date'            => $request->ending_date,
            'experience_description' => $request->experience_description,
            'created_at'             => Carbon::now()
        ]);
        toast('Experience Created!', 'success');

        return redirect()->route('experiences.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $title = "Dashboard - Edit Experience";
        $experience = Experience::find($id);

        return view('admin.pages.experiences.edit', [
            'title'      => $title,
            'experience' => $experience
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
            'experience_title'       => 'required',
            'starting_date'          => 'required',
            'ending_date'            => 'nullable',
            'experience_description' => 'required'
        ]);

        Experience::find($id)->update([
            'experience_title'       => $request->experience_title,
            'starting_date'          => $request->starting_date,
            'ending_date'            => $request->ending_date,
            'experience_description' => $request->experience_description
        ]);
        toast('Experience Updated!', 'success');

        return redirect()->route('experiences.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Experience::find($id)->delete();
        toast('Experience Deleted!', 'warning');

        return redirect()->route('experiences.index');
    }
}

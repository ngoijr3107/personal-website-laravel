<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SkillsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = "Dashboard - Skills";
        $skills = Skill::all();

        return view('admin.pages.skills.index', [
            'title' => $title,
            'skills' => $skills
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $title = "Dashboard - Create Skill";

        return view('admin.pages.skills.create', [
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
            'skill_name' => 'required',
            'skill_icon' => 'required'
        ]);

        Skill::create([
            'skill_name' => $request->skill_name,
            'skill_icon' => $request->skill_icon,
            'created_at' => Carbon::now()
        ]);
        toast('Skill Created!', 'success');

        return redirect()->route('skills.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $title = "Dashboard - Edit Skill";
        $skill = Skill::find($id);

        return view('admin.pages.skills.edit', [
            'title' => $title,
            'skill' => $skill
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
            'skill_name' => 'required',
            'skill_icon' => 'required'
        ]);

        Skill::find($id)->update([
            'skill_name' => $request->skill_name,
            'skill_icon' => $request->skill_icon
        ]);
        toast('Skill Updated!', 'success');

        return redirect()->route('skills.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Skill::find($id)->delete();
        toast('Skill Deleted!', 'warning');

        return redirect()->route('skills.index');
    }
}

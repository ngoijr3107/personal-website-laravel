<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = "Dashboard - Stats";
        $stats = Stat::latest()->get();

        return view('admin.pages.stats.index', [
            'title' => $title,
            'stats' => $stats
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $title = "Dashboard - Create Stat";

        return view('admin.pages.stats.create', [
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
            'stat_title' => 'required',
            'stat_icon' => 'required',
            'stat_number' => 'required'
        ]);

        Stat::create([
            'stat_title' => $request->stat_title,
            'stat_icon' => $request->stat_icon,
            'stat_number' => $request->stat_number,
            'created_at' => Carbon::now()
        ]);
        toast('Stat Created!', 'success');

        return redirect()->route('stats.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $title = "Dashboard - Edit Stat";
        $stat =  Stat::find($id);

        return view('admin.pages.stats.edit', [
            'title' => $title,
            'stat' => $stat
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
            'stat_title' => 'required',
            'stat_icon' => 'required',
            'stat_number' => 'required'
        ]);

        Stat::find($id)->update([
            'stat_title' => $request->stat_title,
            'stat_icon' => $request->stat_icon,
            'stat_nubmer' => $request->stat_nubmer
        ]);
        toast('Stat Updated!', 'success');

        return redirect()->route('stats.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Stat::find($id)->delete();
        toast('Stat Deleted!', 'warning');

        return redirect()->route('stats.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = "Dashboard - Services";
        $services = Service::latest()->get();

        return view('admin.pages.services.index', [
            'title'    => $title,
            'services' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $title = "Dashboard - Create Service";

        return view('admin.pages.services.create', [
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
            'service_title'       => 'required',
            'service_icon'        => 'required',
            'service_description' => 'required'
        ]);

        Service::create([
            'service_name'        => $request->service_title,
            'service_icon'        => $request->service_icon,
            'service_description' => $request->service_description,
            'created_at'          => Carbon::now()
        ]);
        toast('Service Created!', 'success');

        return redirect()->route('services.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $title = "Dashboard - Edit Service";
        $service = Service::find($id);

        return view('admin.pages.services.edit', [
            'title'   => $title,
            'service' => $service
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
            'service_title'       => 'required',
            'service_icon'        => 'required',
            'service_description' => 'required'
        ]);

        Service::find($id)->update([
            'service_name'        => $request->service_title,
            'service_icon'        => $request->service_icon,
            'service_description' => $request->service_description
        ]);
        toast('Service Updated!', 'success');

        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Service::find($id)->delete();
        toast('Service Deleted!', 'warning');

        return redirect()->route('services.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProjectsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = "Dashboard - Projects";
        $projects = Project::latest()->get();

        return view('admin.pages.projects.index', [
            'title'    => $title,
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $title = "Dashboard - Create Project";
        $categories = Category::all();

        return view('admin.pages.projects.create', [
            'title'      => $title,
            'categories' => $categories
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
            'project_name'        => 'required',
            'category_id'         => 'required',
            'project_description' => 'required',
            'project_image'       => 'required|image|mimes:jpg,jpeg,png',
            'code_link'           => 'nullable',
            'live_link'           => 'nullable'
        ]);

        $project_id = Project::insertGetId([
            'project_name'        => $request->project_name,
            'category_id'         => $request->category_id,
            'project_description' => $request->project_description,
            'code_link'           => $request->code_link,
            'live_link'           => $request->live_link,
            'created_at'          => Carbon::now()
        ]);

        $uploaded_img = $request->file('project_image');

        $img_name_high = 'project_' . $project_id . '_high' . '.' . $uploaded_img->getClientOriginalExtension();
        $img_name_low = 'project_' . $project_id . '_low' . '.' . $uploaded_img->getClientOriginalExtension();

        $image_high = Image::make($uploaded_img)->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($uploaded_img->getClientOriginalExtension());
        $image_low = Image::make($uploaded_img)->resize(100, null, function ($constraint) {
            $constraint->aspectRatio();
        })->blur()->encode($uploaded_img->getClientOriginalExtension(), 10);

        Storage::put('public/project_images/' . $img_name_high, $image_high);
        Storage::put('public/project_images/' . $img_name_low, $image_low);

        Project::find($project_id)->update([
            'project_image' => $img_name_low
        ]);
        toast('Project Created!', 'success');

        return redirect()->route('projects.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $title = "Dashboard - Edit Project";
        $project = Project::find($id);
        $categories = Category::all();

        return view('admin.pages.projects.edit', [
            'title'      => $title,
            'project'    => $project,
            'categories' => $categories
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
            'project_name'        => 'required',
            'category_id'         => 'required',
            'project_description' => 'required',
            'project_image'       => 'nullable|image|mimes:jpg,jpeg,png',
            'code_link'           => 'nullable',
            'live_link'           => 'nullable'
        ]);

        if ($request->hasFile('project_image')) {
            $uploaded_img = $request->file('project_image');

            $img_name_high = 'project_' . $id . '_high' . '.' . $uploaded_img->getClientOriginalExtension();
            $img_name_low = 'project_' . $id . '_low' . '.' . $uploaded_img->getClientOriginalExtension();

            Storage::delete('public/project_images/' . $img_name_low);
            Storage::delete('public/project_images/' . $img_name_high);

            $image_high = Image::make($uploaded_img)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode($uploaded_img->getClientOriginalExtension());
            $image_low = Image::make($uploaded_img)->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->blur()->encode($uploaded_img->getClientOriginalExtension(), 10);

            Storage::put('public/project_images/' . $img_name_high, $image_high);
            Storage::put('public/project_images/' . $img_name_low, $image_low);

            Project::find($id)->update([
                'project_name'        => $request->project_name,
                'category_id'         => $request->category_id,
                'project_description' => $request->project_description,
                'code_link'           => $request->code_link,
                'live_link'           => $request->live_link,
                'project_image'       => $img_name_low
            ]);
        } else {
            Project::find($id)->update([
                'project_name'        => $request->project_name,
                'category_id'         => $request->category_id,
                'project_description' => $request->project_description,
                'code_link'           => $request->code_link,
                'live_link'           => $request->live_link
            ]);
        }
        toast('Project Updated!', 'success');

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $project = Project::find($id);

        Storage::delete('public/project_images/'.$project->project_image);
        Storage::delete('public/project_images/'.str_replace('low', 'high', $project->project_image));

        $project->delete();

        toast('Project Deleted!', 'warning');

        return redirect()->route('projects.index');
    }
}

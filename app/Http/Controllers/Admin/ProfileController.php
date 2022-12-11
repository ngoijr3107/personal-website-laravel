<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function index() {
        $title = "Dashboard - Profile";
        $profile = Profile::where('id', 1)->first();

        return view('admin.pages.profile.index', [
            'title'   => $title,
            'profile' => $profile
        ]);
    }


    public function update(Request $request) {
        $request->validate([
            'full_name'           => 'required',
            'email'               => 'email|required',
            'designation'         => 'required',
            'phone'               => 'required',
            'location'            => 'required',
            'cv_link'             => 'required',
            'hire_link'           => 'nullable',
            'facebook_link'       => 'nullable',
            'github_link'         => 'nullable',
            'linkedin_link'       => 'nullable',
            'twitter_link'        => 'nullable',
            'profile_description' => 'required',
            'profile_image'       => 'nullable|image|mimes:jpeg,jpg,png'
        ]);

        if ($request->hasFile('profile_image')) {
            $uploaded_img = $request->file('profile_image');

            $img_name_high = 'profile_high.' . $uploaded_img->getClientOriginalExtension();
            $img_name_low = 'profile_low.' . $uploaded_img->getClientOriginalExtension();

            $image_high = Image::make($uploaded_img)->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode($uploaded_img->getClientOriginalExtension());
            $image_low = Image::make($uploaded_img)->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->blur()->encode($uploaded_img->getClientOriginalExtension(), 10);

            Storage::put('public/profile_image/' . $img_name_high, $image_high);
            Storage::put('public/profile_image/' . $img_name_low, $image_low);

            Profile::find(1)->update([
                'full_name'           => $request->full_name,
                'email'               => $request->email,
                'designation'         => $request->designation,
                'phone'               => $request->phone,
                'location'            => $request->location,
                'cv_link'             => $request->cv_link,
                'hire_link'           => $request->hire_link,
                'facebook_link'       => $request->facebook_link,
                'github_link'         => $request->github_link,
                'linkedin_link'       => $request->linkedin_link,
                'twitter_link'        => $request->twitter_link,
                'profile_description' => $request->profile_description,
                'profile_image'       => $img_name_low
            ]);
        } else {
            Profile::find(1)->update([
                'full_name'           => $request->full_name,
                'email'               => $request->email,
                'designation'         => $request->designation,
                'phone'               => $request->phone,
                'location'            => $request->location,
                'cv_link'             => $request->cv_link,
                'hire_link'           => $request->hire_link,
                'facebook_link'       => $request->facebook_link,
                'github_link'         => $request->github_link,
                'linkedin_link'       => $request->linkedin_link,
                'twitter_link'        => $request->twitter_link,
                'profile_description' => $request->profile_description
            ]);
        }

        toast('Profile Updated!', 'info');

        return redirect()->route('profile');
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageNofify;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;

class MessagesController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = "Dashboard - Messages";
        $messages = Message::latest()->get();

        return view('admin.pages.messages.index', [
            'title'    => $title,
            'messages' => $messages
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
            'guest_name'    => 'required|max:190',
            'guest_email'   => 'required|email|max:190',
            'guest_subject' => 'nullable|max:190',
            'guest_message' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ], [
            'guest_name.required'    => 'Please enter your name!',
            'guest_email.required'   => 'Please enter your valid email!',
            'guest_message.required' => 'Please enter your message!',
            'guest_subject.max'      => 'Subject can\'t be that much long!',
            'guest_name.max'         => 'Your name can\'t be that much long!',
            'guest_email.max'        => 'Your email can\'t be that much long!',
            'g-recaptcha-response.required' => 'Re-captcha is required!',
            'g-recaptcha-response.captcha' => 'Something went wrong with the Re-captcha!'
        ]);

        $message = Message::create([
            'guest_name'    => $request->guest_name,
            'guest_email'   => $request->guest_email,
            'guest_subject' => $request->guest_subject,
            'guest_message' => $request->guest_message,
            'created_at'    => Carbon::now()
        ]);

        $user = User::first();
        $user->notify(new MessageNofify($message));

        Alert::success('Thank You!', 'I received your message. Will contact you soon.');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $title = "Dashboard - Message Details";
        $message = Message::find($id);

        return view('admin.pages.messages.show', [
            'title'   => $title,
            'message' => $message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Message::find($id)->delete();
        toast('Message Deleted!', 'warning');

        return redirect()->route('messages.index');
    }


    public function read($id) {
        Message::find($id)->update([
            'read' => 1
        ]);
        toast('Marked as Read!', 'info');

        return redirect()->route('messages.index');
    }
}

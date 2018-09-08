<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationController extends Controller
{
    public function index(Request $request)
    {
        $notifications = $request->user()->notifications;

        return view('user.notification', compact('notifications'));
    }

    public function readNotification(Request $request)
    {
        $notification = $request->user()->notifications->find($request->notification_id);

        $notification->markAsRead();

        return redirect($request->redirect);
    }
}

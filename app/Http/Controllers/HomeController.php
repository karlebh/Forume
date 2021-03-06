<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function notifications()
    {
      auth()->user()->unreadNotifications->markAsRead();

      return view('notifications')->withNotifications(auth()->user()->notifications);
    }

    public function notificationsCount()
    {
      return auth()->user()->unreadNotifications->count();
    }

    public function deleteNotification($id)
    {
      // $this->authorize('delete', $id);
      DB::table('notifications')->whereId($id)->delete();
    }
}

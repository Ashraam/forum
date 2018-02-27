<?php

namespace App\Http\Controllers;

use App\Channel;

class ChannelController extends Controller
{
    public function index($slug)
    {
        $channel = Channel::with('threads')->where('slug', $slug)->first();

        return view('channels.index', compact('channel'));
    }
}

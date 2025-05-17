<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function store(StoreApplicationRequest $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs('files', $file, 'public');
        }

        $application = Application::create([
            'user_id' => Auth::user()->id,
            'subject' => $request->subject,
            'message' => $request->message,
            'file_url' => $path ?? null
        ]);

        return redirect()->back();
    }
}

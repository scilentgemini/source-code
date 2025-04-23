<?php

namespace App\Http\Controllers;

use App\Mail\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    public function submit(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'full_name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'email' => 'nullable|email|max:255',
                'cv' => 'required|file|mimes:pdf,png,jpg,jpeg|max:5120', // 5MB max
                'message' => 'nullable|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => $validator->errors()->first()
                ], 422);
            }

            Mail::to('info@royaljobsuae.com')
                ->send(new JobApplication($request->all(), $request->file('cv')));

            return response()->json([
                'message' => 'Application submitted successfully!'
            ]);

        } catch (\Exception $e) {
            \Log::error('Application Error: ' . $e->getMessage());
            return response()->json([
                'message' => 'Failed to send application. Please try again.'
            ], 500);
        }
    }
}

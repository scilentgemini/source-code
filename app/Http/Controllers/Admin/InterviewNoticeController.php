<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InterviewNotice;
use Illuminate\Http\Request;
use File;

class InterviewNoticeController extends Controller
{
    public function index()
    {
        $notices = InterviewNotice::orderBy('sort_order', 'asc')->get();
        return view('admin.interview-notices.index', compact('notices'));
    }

    public function create()
    {
        return view('admin.interview-notices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'status' => 'required|boolean',
            'sort_order' => 'required|integer|min:0'
        ]);

        $notice = new InterviewNotice();
        $notice->title = $request->title;
        $notice->status = $request->status;
        $notice->sort_order = $request->sort_order;

        if ($request->hasFile('image')) {
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = 'interview-notice-' . time() . '.' . $extension;
            $file->move('uploads/interview-notices/', $filename);
            $notice->image = 'uploads/interview-notices/' . $filename;
        }

        $notice->save();

        return redirect()->route('admin.interview-notices.index')
            ->with('success', 'Interview notice created successfully.');
    }

    public function edit(InterviewNotice $interviewNotice)
    {
        return view('admin.interview-notices.edit', compact('interviewNotice'));
    }

    public function update(Request $request, InterviewNotice $interviewNotice)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'status' => 'required|boolean',
            'sort_order' => 'required|integer|min:0'
        ]);

        $interviewNotice->title = $request->title;
        $interviewNotice->status = $request->status;
        $interviewNotice->sort_order = $request->sort_order;

        if ($request->hasFile('image')) {
            if ($interviewNotice->image && File::exists(public_path($interviewNotice->image))) {
                File::delete(public_path($interviewNotice->image));
            }

            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = 'interview-notice-' . time() . '.' . $extension;
            $file->move('uploads/interview-notices/', $filename);
            $interviewNotice->image = 'uploads/interview-notices/' . $filename;
        }

        $interviewNotice->save();

        return redirect()->route('admin.interview-notices.index')
            ->with('success', 'Interview notice updated successfully.');
    }

    public function destroy(InterviewNotice $interviewNotice)
    {
        if ($interviewNotice->image && File::exists(public_path($interviewNotice->image))) {
            File::delete(public_path($interviewNotice->image));
        }

        $interviewNotice->delete();

        return redirect()->route('admin.interview-notices.index')
            ->with('success', 'Interview notice deleted successfully.');
    }
}

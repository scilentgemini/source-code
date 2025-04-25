<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\YoutubeVideo;
use Illuminate\Http\Request;
use App\DataTables\YoutubeVideoDataTable;

class YoutubeVideoController extends Controller
{
    public function index(YoutubeVideoDataTable $dataTable)
    {
        return $dataTable->render('admin.youtube-videos.index');
    }

    public function create()
    {
        return view('admin.youtube-videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video_url' => 'required|string|url',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'sort_order' => 'required|integer'
        ]);

        YoutubeVideo::create($request->all());

        return redirect()->route('admin.youtube-videos.index')->with('success', 'Video added successfully');
    }

    public function edit(YoutubeVideo $youtubeVideo)
    {
        return view('admin.youtube-videos.edit', compact('youtubeVideo'));
    }

    public function update(Request $request, YoutubeVideo $youtubeVideo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video_url' => 'required|string|url',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'sort_order' => 'required|integer'
        ]);

        $youtubeVideo->update($request->all());

        return redirect()->route('admin.youtube-videos.index')->with('success', 'Video updated successfully');
    }

    public function destroy(YoutubeVideo $youtubeVideo)
    {
        try {
            $youtubeVideo->delete();
            return response(['status' => 'success', 'message' => 'Video deleted successfully']);
        } catch(\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}

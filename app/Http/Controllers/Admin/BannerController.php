<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerImage;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $heroImages = BannerImage::all();
        return view('admin.banner.index', compact('heroImages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->move(public_path('uploads'), $filename);
                BannerImage::create(['url' => 'uploads/' . $filename]);
            }
        }

        return redirect()->back()->with('success', 'Images uploaded successfully.');
    }

    public function destroy(BannerImage $bannerImage)
    {
        if (file_exists(public_path('storage/' . $bannerImage->url))) {
            unlink(public_path('storage/' . $bannerImage->url));
        }
        $bannerImage->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ListingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ListingStoreRequest;
use App\Http\Requests\Admin\ListingUpdateRequest;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Listing;
use App\Models\ListingAmenity;
use App\Models\Location;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str;

class ListingController extends Controller
{
    use FileUploadTrait;

    function __construct()
    {
        $this->middleware(['permission:listing index'])->only(['index']);
        $this->middleware(['permission:listing create'])->only(['create', 'store']);
        $this->middleware(['permission:listing update'])->only(['edit', 'update']);
        $this->middleware(['permission:listing delete'])->only(['destroy']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(ListingDataTable $dataTable) : View | JsonResponse
    {
        return $dataTable->render('admin.listing.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $categories = Category::all();
        $locations = Location::all();
        $amenities = Amenity::all();
        return view('admin.listing.create', compact('categories', 'locations', 'amenities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ListingStoreRequest $request)
    {
        $validated = $request->validated();
        
        $imagePath = $this->uploadImage($request, 'image');
        $thumbnailPath = $this->uploadImage($request, 'thumbnail_image');
        $attachmentPath = $this->uploadImage($request, 'attachment');

        $listing = new Listing();
        $listing->user_id = Auth::user()->id;
        $listing->package_id = 0;
        $listing->image = $imagePath;
        $listing->thumbnail_image = $thumbnailPath;
        $listing->title = $validated['title'];
        $listing->slug = Str::slug($validated['title']);
        $listing->category_id = $validated['category'];
        $listing->location_id = $validated['location'] ?? null;
        $listing->address = $validated['address'] ?? null;
        $listing->phone = $validated['phone'] ?? null;
        $listing->email = $validated['email'] ?? null;
        $listing->website = $validated['website'] ?? null;
        $listing->facebook_link = $validated['facebook_link'] ?? null;
        $listing->x_link = $validated['x_link'] ?? null;
        $listing->linkedin_link = $validated['linkedin_link'] ?? null;
        $listing->whatsapp_link = $validated['whatsapp_link'] ?? null;
        $listing->file = $attachmentPath;
        $listing->description = $validated['description'];
        $listing->google_map_embed_code = $validated['google_map_embed_code'] ?? null;
        $listing->seo_title = $validated['seo_title'] ?? null;
        $listing->seo_description = $validated['seo_description'] ?? null;
        $listing->status = $validated['status'];
        $listing->is_featured = $validated['is_featured'];
        $listing->is_verified = $validated['is_verified'];
        $listing->expire_date = date('Y-m-d');
        $listing->is_approved = 1;
        $listing->save();

        if (isset($validated['amenities'])) {
            foreach($validated['amenities'] as $amenityId) {
                $amenity = new ListingAmenity();
                $amenity->listing_id = $listing->id;
                $amenity->amenity_id = $amenityId;
                $amenity->save();
            }
        }

        toastr()->success('Created Successfully!');
        return to_route('admin.listing.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : View
    {
        $listing = Listing::findOrFail($id);
        $listingAmenities = ListingAmenity::where('listing_id', $listing->id)->pluck('amenity_id')->toArray();
        $categories = Category::all();
        $locations = Location::all();
        $amenities = Amenity::all();

        return view('admin.listing.edit', compact('categories', 'locations', 'amenities', 'listing', 'listingAmenities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ListingUpdateRequest $request, string $id) : RedirectResponse
    {
        $listing = Listing::findOrFail($id);
        $validated = $request->validated();

        $imagePath = $this->uploadImage($request, 'image', $validated['old_image'] ?? null);
        $thumbnailPath = $this->uploadImage($request, 'thumbnail_image', $validated['old_thumbnail_image'] ?? null);
        $attachmentPath = $this->uploadImage($request, 'attachment', $validated['old_attachment'] ?? null);

        $listing->user_id = Auth::user()->id;
        $listing->package_id = 0;
        $listing->image = !empty($imagePath) ? $imagePath : ($validated['old_image'] ?? null);
        $listing->thumbnail_image = !empty($thumbnailPath) ? $thumbnailPath : ($validated['old_thumbnail_image'] ?? null);
        $listing->title = $validated['title'];
        $listing->slug = Str::slug($validated['title']);
        $listing->category_id = $validated['category'];
        $listing->location_id = $validated['location'] ?? null;
        $listing->address = $validated['address'] ?? null;
        $listing->phone = $validated['phone'] ?? null;
        $listing->email = $validated['email'] ?? null;
        $listing->website = $validated['website'] ?? null;
        $listing->facebook_link = $validated['facebook_link'] ?? null;
        $listing->x_link = $validated['x_link'] ?? null;
        $listing->linkedin_link = $validated['linkedin_link'] ?? null;
        $listing->whatsapp_link = $validated['whatsapp_link'] ?? null;
        $listing->file = !empty($attachmentPath) ? $attachmentPath : ($validated['old_attachment'] ?? null);
        $listing->description = $validated['description'];
        $listing->google_map_embed_code = $validated['google_map_embed_code'] ?? null;
        $listing->seo_title = $validated['seo_title'] ?? null;
        $listing->seo_description = $validated['seo_description'] ?? null;
        $listing->status = $validated['status'];
        $listing->is_featured = $validated['is_featured'];
        $listing->is_verified = $validated['is_verified'];
        $listing->expire_date = date('Y-m-d');
        $listing->save();

        ListingAmenity::where('listing_id', $listing->id)->delete();

        if (isset($validated['amenities'])) {
            foreach($validated['amenities'] as $amenityId) {
                $amenity = new ListingAmenity();
                $amenity->listing_id = $listing->id;
                $amenity->amenity_id = $amenityId;
                $amenity->save();
            }
        }

        toastr()->success('Updated Successfully!');
        return to_route('admin.listing.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Listing::findOrFail($id)->delete();

            return response(['status' => 'success', 'message' => 'Deleted successfully!']);
        }catch(\Exception $e){
            logger($e);
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}

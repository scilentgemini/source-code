<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyService;
use Illuminate\Http\Request;
use File;

class CompanyServiceController extends Controller
{
    public function index()
    {
        $services = CompanyService::orderBy('sort_order', 'asc')->get();
        return view('admin.company-services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.company-services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,pdf|max:10240',
            'type' => 'required|in:service,legal',
            'status' => 'required|boolean',
            'sort_order' => 'required|integer|min:0'
        ]);

        $service = new CompanyService();
        $service->title = $request->title;
        $service->description = $request->description;
        $service->type = $request->type;
        $service->status = $request->status;
        $service->sort_order = $request->sort_order;

        if ($request->hasFile('image')) {
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = 'company-service-' . time() . '.' . $extension;
            $file->move('uploads/company-services/', $filename);
            $service->image = 'uploads/company-services/' . $filename;
        }

        $service->save();

        return redirect()->route('admin.company-services.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(CompanyService $companyService)
    {
        return view('admin.company-services.edit', compact('companyService'));
    }

    public function update(Request $request, CompanyService $companyService)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,pdf|max:10240',
            'type' => 'required|in:service,legal',
            'status' => 'required|boolean',
            'sort_order' => 'required|integer|min:0'
        ]);

        $companyService->title = $request->title;
        $companyService->description = $request->description;
        $companyService->type = $request->type;
        $companyService->status = $request->status;
        $companyService->sort_order = $request->sort_order;

        if ($request->hasFile('image')) {
            if ($companyService->image && File::exists(public_path($companyService->image))) {
                File::delete(public_path($companyService->image));
            }

            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = 'company-service-' . time() . '.' . $extension;
            $file->move('uploads/company-services/', $filename);
            $companyService->image = 'uploads/company-services/' . $filename;
        }

        $companyService->save();

        return redirect()->route('admin.company-services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(CompanyService $companyService)
    {
        if ($companyService->image && File::exists(public_path($companyService->image))) {
            File::delete(public_path($companyService->image));
        }

        $companyService->delete();

        return redirect()->route('admin.company-services.index')
            ->with('success', 'Service deleted successfully.');
    }
}

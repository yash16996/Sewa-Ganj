<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\NotificationService;
use App\Traits\FileUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller implements HasMiddleware
{

    use FileUpload;

    public static function middleware(): array
    {
        return [
            new Middleware('permission:manage category'),
        ];
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        // $category->is_active = $request->has('is_active') ? true : false;
        if ($request->hasFile('avatar')) {
            $avatarPath = $this->handleUploadFile($request->file('avatar'));
            $category->avatar = $avatarPath;
            $category->save();
        }
        $category->save();

        NotificationService::CREATED('Category created successfully.');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->except(['avatar', 'is_active']));
        // $category->is_active = $request->has('is_active') ? true : false;
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($category->avatar) {
                $this->handleDeleteFile($category->avatar);
            }
            $avatarPath = $this->handleUploadFile($request->file('avatar'));
            $category->avatar = $avatarPath;
            $category->save();
        }
        $category->save();

        NotificationService::UPDATED('Category updated successfully.');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        // Delete avatar if exists
        if ($category->avatar) {
            $this->handleDeleteFile($category->avatar);
        }
        $category->delete();

        NotificationService::DELETED('Category deleted successfully.');
        return redirect()->route('admin.categories.index');
    }
}

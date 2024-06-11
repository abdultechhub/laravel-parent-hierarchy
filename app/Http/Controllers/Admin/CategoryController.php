<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->has('start_date') && !empty($request->input('start_date'))) {
            $query->whereDate('created_at', '>=', $request->input('start_date'));
        }

        if ($request->has('end_date') && !empty($request->input('end_date'))) {
            $query->whereDate('created_at', '<=', $request->input('end_date'));
        }

        // Custom search filter
        if ($request->filled('s_query')) {
            $s_query = $request->input('s_query');
            $query->where(function ($qry) use ($s_query) {
                $qry->where('name',  'like', '%' . $s_query . '%');
            });
        }


        // Paginate the results
        if ($request->has('show_item_at_once')  && !empty($request->input('show_item_at_once'))) {
            $show_item_at_once = $request->input('show_item_at_once');
        } else {
            $show_item_at_once = 5;
        }

        $categories = $query->orderby('id', 'desc')->paginate(intval($show_item_at_once));

        // Append filters to pagination links
        $categories->appends($request->all());

        $categories->transform(function ($category) {
            $category->parentHierarchy = $this->getParentHierarchy($category);
            return $category;
        });

        // dd($categories);

        return  view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();

        $categories->transform(function ($category) {
            $category->parentHierarchy = $this->getParentHierarchy($category);
            return $category;
        });
        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|min:2',
            'parent_category' => 'required',
        ]);

        $category = new Category();

        $category->name = $request->input('category_name');

        $category->status =  $request->input('status');
        $category->parent_id =  $request->input('parent_category')  ?? 0;


        $category->save();


        $notification = array(
            'message' => 'Category created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('category.index')->with($notification);
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
    public function edit(string $id)
    {
        // $parent_category = Category::where('parent_id', 0)->get();
        $category = Category::find($id);

        $categories_all = Category::get();

        $categories_all->transform(function ($category) {
            $category->parentHierarchy = $this->getParentHierarchy($category);
            return $category;
        });
        return view('admin.category.edit', compact('categories_all', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required|min:2',
            'parent_category' => 'required',
        ]);

        $category = Category::find($id);

        $category->name = $request->input('category_name');

        $category->status =  $request->input('status');
        $category->parent_id =  $request->input('parent_category')  ?? 0;


        $category->save();


        $notification = array(
            'message' => 'Category updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $childrenCategories = Category::where('parent_id', $id)->get();

        //updating parent_id
        if ($childrenCategories->isNotEmpty()) {
            foreach ($childrenCategories as $childCategory) {
                $childCategory->parent_id = $category->parent_id;
                $childCategory->save();
            }
        }
        $category->delete();

        $notification = array(
            'status' => 'success',
            'message' => 'Category deleted successfully',
        );

        return redirect()->route('category.index')->with($notification);
    }

    private function getParentHierarchy($category)
    {
        $parentHierarchy = '';
        $parent = $category->parent;

        // Traverse the parent relationships recursively
        while ($parent) {
            $parentHierarchy = $parent->name . ' > ' . $parentHierarchy;
            $parent = $parent->parent;
        }

        return rtrim($parentHierarchy, ' > '); // Remove trailing ' > '
    }


    public function changestatus(Request $request)
    {
        // dd($request->all());

        $category = Category::findOrFail($request->id);
        $category->status = $request->input('status');
        $category->save();

        return  response()->json([
            'status' => 'success',
            'message' => 'Category status change successfully.'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CreateCategoryRequest;
// use App\Http\Requests\User\CreateUserRequest;
// use App\Http\Requests\User\UpdateUserRequest;
// use App\Http\Requests\User\UpdateUserProfileRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Services\CategoryService;
use Spatie\Permission\Models\Permission;

use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Services\RoleService;
use App\Services\UserService;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;
    protected RoleService $roleService;

    public function __construct(CategoryService $categoryService, RoleService $roleService)
    {
        $this->categoryService = $categoryService;
        $this->roleService = $roleService;
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);



        // Permission::create(['name' => 'category-list', 'guard_name' => 'web', 'module_name' => 'Categories']);
        // Permission::create(['name' => 'category-create', 'guard_name' => 'web', 'module_name' => 'Categories']);
        // Permission::create(['name' => 'category-edit', 'guard_name' => 'web', 'module_name' => 'Categories']);
        // Permission::create(['name' => 'category-delete', 'guard_name' => 'web', 'module_name' => 'Categories']);

        // Permission::create(['name' => 'category-permission', 'guard_name' => 'web', 'module_name' => 'Categories']);


    }


    public function index()
    {
        return view('content.apps.category.list',);
    }


    public function create()
    {
        // dd('create');

        $page_data['form_title'] = 'Add New Category';
        $page_data['page_title'] = ' Category';
        $category = '';

        return view('content.apps.category.create-edit', compact('page_data', 'category'));
    }

    public function store(CreateCategoryRequest $request)
    {

        try {
            $category_data['name'] = $request->input('name');
            $category_data['description'] = $request->input('description');
            $category_data['status'] = $request->input('status') ? 'active' : 'inactive';
            $category_data['add_to_home'] = $request->input('add_to_home') ? '1' : '0';
            $category_data['created_by'] = auth()->user()->id;
            $category_data['updated_by'] = auth()->user()->id;


            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName, 'public');

                $category_data['file'] = $filePath;
            }

            // dd($category_data);

            $category = $this->categoryService->create($category_data);



            if (!empty($category)) {
                return redirect()->route("app-categories-list")->with('success', 'Category Added Successfully');
            } else {
                return redirect()->back()->with('error', 'Error while Adding Category');
            }
        } catch (\Exception $error) {
            dd($error->getMessage());
            return redirect()->route("app-categories-list")->with('error', 'Error while adding Category');
        }
    }


    public function getAll()
    {
        $categories = $this->categoryService->getAll();

        return DataTables::of($categories)
            ->addColumn('actions', function ($categories) {
                $encrypt_id = encrypt($categories->id);
                if (auth()->user()->can('category-edit')) {
                    $updateButton = "<a data-bs-toggle='tooltip' title='Edit' data-bs-delay='400' class='btn-sm border-warning'  href='" . route('app-category-edit', $encrypt_id) . "'><i class='text-warning' data-feather='edit'></i></a>";
                } else {
                    $updateButton = '';
                }


                if (auth()->user()->can('category-delete') == true) {
                    $deleteButton = "<a data-bs-toggle='tooltip' title='Delete' data-bs-delay='400' class=' btn-sm border-danger confirm-delete' data-idos='$encrypt_id' id='confirm-color  href='" . route('app-category-destroy', $encrypt_id) . "'><i class='text-danger' data-feather='trash-2'></i></a>";
                } else {
                    $deleteButton = '';
                }

                return $updateButton . " " . $deleteButton;
            })->addColumn('status', function ($categories) {
                if ($categories->status == 'active') {
                    return "<span class='badge badge-light-success'>Active</span>";
                } else {
                    return "<span class='badge badge-light-danger'>Inactive</span>";
                }
            })
            ->addColumn('description', function ($products) {
                return $products->description ? strip_tags($products->description) : '';
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);
    }


    public function edit($encrypted_id)
    {
        $page_data['form_title'] = 'Edit Category';
        $page_data['page_title'] = ' Category';
        $id = decrypt($encrypted_id);
        $category = Category::find($id);
        return view('content.apps.category.create-edit', compact('page_data', 'category'));
    }

    public function update(UpdateCategoryRequest $request, $encrypt_id)
    {
        $id  = decrypt($encrypt_id);
        $category_data['name'] = $request->input('name');
        // $category_data['description'] = $request->input('description');
        $category_data['status'] = $request->input('status') ? 'active' : 'inactive';
        $category_data['add_to_home'] = $request->input('add_to_home') ? '1' : '0';
        $category_data['updated_by'] = auth()->user()->id;


        $description = $request->input('description');

        if ($description != null) {
            $category_data['description'] = $request->input('description');
        }


        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $category_data['file'] = $filePath;
        }

        $category = $this->categoryService->update($category_data, $id);


        if (!empty($category)) {

            return redirect()->route('app-categories-list')->with('success', 'Category Updated successfully');
        } else {

            return redirect()->route('app-categories-list')->with('error', 'Error while Updating Category');
        }
    }

    public function destroy($encrypted_id)
    {
        $id = decrypt($encrypted_id);
        $category = $this->categoryService->destroy($id);

        if (!empty($category)) {
            return redirect()->route('app-categories-list')->with('success', 'Category Deleted Successfully');
        } else {
            return redirect()->route('app-categories-list')->with('error', 'Error while Deleting Category');
        }
    }


    public function destroy_file($id)
    {

        $category = Category::findOrFail($id);

        if ($category->file) {
            // Storage::delete('public/' . $category->cover_image);

            $category->update(['file' => null]);

            return response()->json(['success' => true, 'message' => 'Image deleted successfully!']);
        }
    }


    public function updateCategoryStatus(Request $request)
    {
        $id = $request->input('category_id');
        $category = Category::where('id', $id)->first();
        $category->update([
            'status' => 'inactive',
        ]);
        // $products = Product::where('category_id', $id)->where('status', 'active')->get();

        // foreach ($products as $product) {
        //     $product->update([
        //         'status' => 'inactive',
        //     ]);
        // }
        return response()->json(['success' => true, 'message' => 'Category Disable successfully!']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    function createCategory(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required'
            ]);
            $user = Auth::id();
            Category::create([
                'name' => $request->name,
                'user_id' => $user
            ]);

            return response()->json(['status' => 'success', 'message' => 'Category created successfully']);
        }
        catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    function categoryList(Request $request)
    {
        try{
            $user_id = Auth::id();
            $category = Category::where('user_id', $user_id)->get();
            return $category;
        }
        catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }

    }

    function updateCategory(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required',
                'name' => 'required'
            ]);
            $category_id = $request->input('id');
            $user_id = Auth::id();

            Category::where('id', $category_id)->where('user_id', $user_id)->update([
                'name' => $request->input('name')
            ]);
            return response()->json(['status' => 'success', 'message' => 'Category updated successfully']);
        }
        catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    function deleteCategory(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required'
            ]);
            $user_id = Auth::id();
            $category_id = $request->input('id');

            Category::where('id', $category_id)->where('user_id', $user_id)->delete();
            return response()->json(['status' => 'success', 'message' => 'Category deleted successfully']);
        }
        catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    function categoryById(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required'
            ]);
            $user_id = Auth::id();
            $category_id = $request->input('id');
            $rows = Category::where('id', $category_id)->where('user_id', $user_id)->first();

            return response()->json(['status' => 'success', 'rows' => $rows]);
        }
        catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}

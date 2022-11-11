<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('manager.categories', ['categories' => $categories]);
    }

    public function getCategoriesByAjax()
    {
        $categories = Category::all();

        $formResult = static function (string $message, bool $isSuccess, array $data = []){
            return [
                'message' => $message,
                'success' => $isSuccess,
                'data' => $data
            ];
        };

        if ($categories->isEmpty()) {
            return response()->json($formResult('No data', false))->setStatusCode(404);
        }

        return response()->json($formResult('Successful',true, array_values($categories->toArray())));
    }
}

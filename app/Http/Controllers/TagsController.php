<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(20);

        return view('manager.tags', ['tags' => $tags]);
    }

    public function getTagsByAjax()
    {
        $tags = Tag::all();

        $formResult = static function (string $message, bool $isSuccess, array $data = []){
            return [
                'message' => $message,
                'success' => $isSuccess,
                'data' => $data
            ];
        };

        if ($tags->isEmpty()) {
            return response()->json($formResult('No data', false))->setStatusCode(404);
        }

        return response()->json($formResult('Successful',true, array_values($tags->toArray())));
    }
}

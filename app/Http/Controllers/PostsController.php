<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('publish_at', 'desc')->limit(1)->get();

        foreach ($posts as $post) {
            $post->getCategory($post->id);
        }

        return view('manager.posts.index', ['posts' => $posts]);
    }

    public function getPostsByAjax()
    {
        $posts = Post::orderBy('publish_at', 'desc')->limit(50)->get();

        foreach ($posts as $post) {
            $post['category'] = $post->getCategory($post->id);

            if (!empty($post->employee->firstname_ru_RU) && !empty($post->employee->lastname_ru_RU)) {
                $post['author'] = $post->employee->firstname_ru_RU . ' ' . $post->employee->lastname_ru_RU;
            }else {
                $post['author'] = '-';
            }

            if (!empty($post->publisher->firstname_ru_RU) && !empty($post->publisher->lastname_ru_RU)) {
                $post['last_publisher'] = $post->publisher->firstname_ru_RU . ' ' . $post->publisher->lastname_ru_RU;
            } else {
                $post['last_publisher'] = '-';
            }
        }

        $formResult = static function (string $message, bool $isSuccess, array $data = []){
            return [
                'message' => $message,
                'success' => $isSuccess,
                'data' => $data
            ];
        };

        if ($posts->isEmpty()){
            return response()->json($formResult('No data', false))->setStatusCode(404);
        }

        return response()->json($formResult('Successful',true, array_values($posts->toArray())));
    }



    public function create()
    {
        return view('manager.posts.create');
    }

}

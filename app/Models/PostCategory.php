<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $table = 'posts_rel_categories';

    public function getCategoryId(int $postId)
    {
        return $this->where('post_id', $postId)->first()->posts_category_id;
    }
}

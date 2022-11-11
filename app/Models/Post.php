<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    public string $category;

    /**
     * @return BelongsTo
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    /**
     * @return BelongsTo
     */
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'last_publish_emp_id');
    }

    public function getCategory(int $id)
    {
        $relCategory = PostCategory::where('post_id', $id)->first();

        if (empty($relCategory)) {
            return $this->category = '-';
        }
        $category = Category::where('id', $relCategory->posts_category_id)->first();

        if (empty($category)) {
            return $this->category = '-';
        }

        return $this->category = $category->title;
    }


    public function getLastPublisher(int $id = NULL)
    {
        $last_publisher = Employee::where('id', $id)->first();

        if (empty($last_publisher)) {
            return $this->last_publisher = '-';
        }

        return $this->last_publisher = $last_publisher->firstname_ru_RU  . ' ' . $last_publisher->lastname_ru_RU;
    }

}

<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Category;

class CategoryQuestionController extends Controller
{
    public function index(Category $category)
    {
        return Question::whereHas('categories', function($q) use($category) {
            $q->where('category_id', $category->id);
        })->get();
    }
}

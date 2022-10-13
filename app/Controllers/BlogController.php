<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function index()
    {
        $latestPosts = Blog::getInstance()->query()->latest()->limit(5)->get();
        $categories = Category::getInstance()->get();

        $queries = Request::getQuery();
        if ($categoryId = $queries['category_id']) {
            $posts = Blog::getInstance()->where('category_id', $categoryId)->latest()->get();
        } else {
            $posts = Blog::getInstance()->query()->latest()->get();
        }

        return $this->render('blogs.list', [
            'latestPosts' => $latestPosts,
            'categories' => $categories,
            'posts' => $posts,
            'currentCategoryId' => $categoryId,
        ]);
    }

    public function show(Request $request, array $params = [])
    {
        $post = Blog::getInstance()->where('id', $params['id'])->first();

        if (!$post) {
            return $this->renderPageNotFound();
        }

        $latestPosts = Blog::getInstance()->query()->latest()->limit(5)->get();
        $categories = Category::getInstance()->get();

        return $this->render('blogs.detail', [
            'latestPosts' => $latestPosts,
            'categories' => $categories,
            'post' => $post,
        ]);
    }
}

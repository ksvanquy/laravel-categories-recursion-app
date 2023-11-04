<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // 
    public function index()
    {
        // $data = Category::all()->toArray();
        // $categories = Category::toTree2($data, 0);

        // $categories = Category::toHtml($data);

        // $categories = Category::toTree2($data, 0);
        // $lastDepth = Category::lastDepth($categories);

        // echo "<pre>";
        // print_r($categories);
        // echo "</pre>";

        // echo "<pre>";
        // print_r($lastDepth);
        // echo "</pre>";
        $categories = Category::tree()->get()->toTree();

        return view('home', compact('categories'));
    }

    public function getCategoryItem(int $id)
    {
        // dd($id);
        // check category item has children
        $has_children = Category::find($id)->descendants()->count();

        // dd($has_children);
        if ($has_children == 0) {
            return redirect()->route('detail', ['id' => $id]);
        } else {
            return redirect()->route('topic', ['id' => $id]);
        }
    }

    public function getTopic(int $id)
    {
        return 'tim topic';
    }
    public function getDetail(int $id)
    {
        return 'tim detail';
    }
}

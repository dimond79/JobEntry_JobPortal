<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ContactController extends Controller
{
    public function addContact(Request $request)
    {
        $rules = array(
            'name' => 'required | min:2 | max:10'
        );
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return $validation->errors();
        } else {

            $category = new Category();
            $category->name = $request->name;
            if ($category->save()) {
                return ["message" => "Category added."];
            } else {
                return ["message" => "Category nto added."];
            }
        }
    }

    public function updateContact(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        if ($category->save()) {
            return ["message" => "Category updated."];
        } else {
            return ["message" => "Category nto updated."];
        }
    }

    public function deleteContact(Request $request)
    {
        $category = Category::destroy($request->id);

        if ($category) {
            return ["message" => "Category Deleted."];
        } else {
            return ["message" => "Category not Deleted."];
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function all()
    {
        $sql = "SELECT * FROM products";
        $products = DB::select($sql);
        return $products;
    }
    public function cctv()
    {
        $sql = "SELECT * FROM products WHERE `type` = 'CCTV' AND is_show = 'show'";
        $products = DB::select($sql);
        return $products;
    }

    public function solarcell()
    {
        $sql = "SELECT * FROM products WHERE `type` = 'Solarcell' AND is_show = 'show'";
        $products = DB::select($sql);
        return $products;
    }
    public function evcharge()
    {
        $sql = "SELECT * FROM products WHERE `type` = 'EVCharge' AND is_show = 'show'";
        $products = DB::select($sql);
        return $products;
    }
    public function accesscontrol()
    {
        $sql = "SELECT * FROM products WHERE `type` = 'AccessControl' AND is_show = 'show'";
        $products = DB::select($sql);
        return $products;
    }
    public function network()
    {
        $sql = "SELECT * FROM products WHERE `type` = 'Network' AND is_show = 'show'";
        $products = DB::select($sql);
        return $products;
    }

    public function update(Request $request)
    {
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = public_path('images');
                $imagePath = $this->moveFile($image, $path);
                $sql = "UPDATE products SET `name` = '{$request->name}', `description` = '{$request->description}', `price` = '{$request->price}', `type` = '{$request->type}', `image` = '{$imagePath}', `type` = '{$request->type}', `is_show` = '{$request->is_show}' WHERE `id` = '{$request->productId}'";
                $result = DB::update($sql);
                return $result ? ['message' => 'Update success'] : ['message' => 'Update failed', 'sql' => $sql];
            }
            $sql = "UPDATE products SET `name` = '{$request->name}', `description` = '{$request->description}', `price` = '{$request->price}', `type` = '{$request->type}', `is_show` = '{$request->is_show}' WHERE `id` = '{$request->productId}'";
            $result = DB::update($sql);
            return $result ? ['message' => 'Update success'] : ['message' => 'Update failed', 'sql' => $sql];
        } catch (\Exception $e) {
            return ['message' => 'Update failed', 'error' => $e->getMessage(), 'sql' => $sql];
        }

    }

    public function getProductById(Request $request)
    {
        $sql = "SELECT * FROM products WHERE `id` = '{$request->id}'";
        $product = DB::select($sql);
        return $product;
    }
    public function store(Request $request)
    {
        $image = $request->file('image');
        $path = public_path('images');
        $imagePath = $this->moveFile($image, $path);
        $sql = "INSERT INTO products (`name`, `description`, `price`, `type`, `image`, `is_show`) VALUES ('{$request->name}','{$request->description}' , '{$request->price}', '{$request->type}', '{$imagePath}', '{$request->is_show}')";
        DB::insert($sql);
        return redirect()->back()->with(['message' => 'Insert success']);
    }
    private function moveFile($file, $path)
    {
        $randomName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $randomName);
        return $randomName;
    }
    private function deleteFile($id)
    {
        $sql = "SELECT image FROM products WHERE `id` = '{$id}'";
        $path = public_path('images/' . DB::select($sql)[0]->image);
        if (file_exists($path)) {
            unlink($path);
        }
        return true;
    }

    public function delete(Request $request)
    {
        $id = $request->params['id'];
        $this->deleteFile($id);
        $sql = "DELETE FROM products WHERE `id` = '{$id}'";
        try {
            $result = DB::delete($sql);
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => "Delete failed {$id}" ,
                'error' => $e->getMessage()
            ];
        }
        return $result ? ['status' => true, 'message' => 'Delete success'] : ['status' => false, 'message' => 'Delete failed', 'sql'=> $sql];
    }
}
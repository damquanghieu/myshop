<?php

namespace App\Http\Controllers;

use App\Components\CategoryRecusive;
use App\Http\Requests\StoreProduct;
use App\Product;
use App\ProductImage;
use App\Tag;
use App\Traits\TraitUploadImage;
use App\Traits\TraitUploadMutipleImage;
use DB;
use Illuminate\Http\Request;
use Log;

class ProductController extends Controller
{
    use TraitUploadImage;
    use TraitUploadMutipleImage;

    private $product;
    private $productImage;
    private $tags;

    public function __construct(Product $product, ProductImage $productImage, Tag $tags)
    {
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tags = $tags;
    }

    public function index()
    {
        if (session('success')) {
            toast(session("success"), "success");
        }
        $getProducts = $this->product::paginate(5);
        return view('admin.pages.product.view_product', compact('getProducts'));
    }
    public function create()
    {
        if (session('success')) {
            toast(session('success'), 'success');
        }
        $recusive = new CategoryRecusive();
        $getCategory = $recusive->getParentCategory(0, "");
        return view('admin.pages.product.add_product', compact('getCategory'));
    }

    public function store(StoreProduct $request)
    {
        $request->validated();
        try {

            DB::beginTransaction();

            $product = new Product;
            $data = $this->storageTraitUploadFile($request, "feature_image_path", "product");
            $product->name = $request->name;
            $product->price = $request->price;
            $product->feature_image_path = $data;
            $product->content = $request->content;
            $product->user_id = $request->user_id;
            $product->category_id = $request->category_id;
            $product->save();

            $uploadMutipleImage = $this->storageTraitMutipleUploadFile($request, 'product', $product->id);
            $this->product->images()->insert($uploadMutipleImage);

            foreach ($request->tags as $tag) {
                $tagInstance = $this->tags->firstOrCreate(
                    [
                        'name' => $tag,
                    ]
                );
                $ids[] = $tagInstance->id;
            }
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message:' . $exception->getMessage() . "line" . $exception->getLine());
        }
        $product->tags()->attach($ids);
        return redirect()->back()->withSuccess('Add success');
    }

    public function edit(Request $request, $id)
    {
        $findProductId = $this->product::find($id);
        $categoryId = $findProductId->category_id;

        $recusive = new CategoryRecusive();
        $html = $recusive->getParentCategory(0, "", $categoryId);

        return view('admin.pages.product.edit_product', compact("findProductId", "html"));

    }
    public function update(Request $request, $id)
    {
        // $test = $this->product->tags()->firstOrCreate(['name'=>"asassas"]);
        // dd($test);
        // $this->validate($request, [
        //     'name' => "required",
        //     'price' => 'required',
        //     'content' => 'required',
        //     'feature_image_path' => 'required',
        // ], [
        //     'name.required' => "Tên sản phẩm không để trống!",
        //     'price.required' => "Giá sản phẩm không để trống!",
        //     "content.required" => "Nội dung sản phẩm không được để trống!",
        //     'feature_image_path.required' => "Không có ảnh à!",
        // ]);
        try {

            DB::beginTransaction();

            $product = $this->product::find($id);
            $product->name = $request->name;
            $product->price = $request->price;
            $product->content = $request->content;
            if ($request->user_id) {
                $product->user_id = $request->user_id;
            }
            $product->category_id = $request->category_id;
            if ($request->hasFile("feature_image_path")) {
                $data = $this->storageTraitUploadFile($request, "feature_image_path", "product");
                $product->feature_image_path = $data;
            }
            $product->save();

            if ($request->image_detail) {
                $product->images()->delete();
                $uploadMutipleImage = $this->storageTraitMutipleUploadFile($request, 'product', $product->id);
                $this->product->images()->insert($uploadMutipleImage);
            }

            foreach ($request->tags as $tag) {
                $tagInstance = $this->tags->firstOrCreate(
                    [
                        'name' => $tag,
                    ]
                );
                $ids[] = $tagInstance->id;
            }
            $product->tags()->sync($ids);
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('message:' . $exception->getMessage() . "line" . $exception->getLine());
        }

        return redirect(route('product.index'))->withSuccess('Edit success');
    }
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $findId = $this->product::find($id);
            $findId->images()->delete();
            $findId->tags()->detach();
            $findId->delete();

            DB::commit();
            return response()->json([
                'code' => 200,
                'message' => "succcess",

            ], 200);
        } catch (\exception $exception) {
            return response()->json([
                'code' => 500,
                'message' => "fail",

            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Slide;
use App\Traits\TraitUploadImage;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    use TraitUploadImage;

    private $slide;

    public function __construct(Slide $slide)
    {
        $this->slide = $slide;
    }

    public function index()
    {
        $getSlides = $this->slide->paginate(5);
        return view('admin.pages.slide.view_slide', compact('getSlides'));
    }

    public function create()
    {
        if (session('success')) {
            toast(session('success'), "success");
        }
        return view('admin.pages.slide.add_slide');
    }

    public function store(Request $request)
    {

        $slide = new $this->slide();
        $slide->title = $request->title;
        $slide->description = $request->description;
        if ($request->hasFile('image')) {
            $imageUrl = $this->storageTraitUploadFile($request, "image", "slides");
            $slide->image = $imageUrl;
        }

        $slide->save();
        return redirect()->back()->withSuccess("Thêm slide thành công");

    }
}

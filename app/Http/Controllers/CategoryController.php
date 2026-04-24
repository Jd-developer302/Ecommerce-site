<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(50);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'order' => 'required',
    //         'image' => 'required'
    //     ]);

    //     $input = $request->all();

    //     if ($request->featured == '') {
    //         $input['featured'] = 0;
    //     }
    //     if ($request->listing == '') {
    //         $input['listing'] = 0;
    //     }

    //     if ($image = $request->file('image')) {
    //         $destinationPath = 'image/';
    //         $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //         $image->move($destinationPath, $profileImage);
    //         $input['image'] = "$profileImage";
    //     }
    //     if ($request->hasfile('brochure')) {
    //         $banner = $request->file('banner');
    //         $destinationPath = 'banner/';
    //         $profileImage = date('YmdHis') . "." . $banner->getClientOriginalExtension();
    //         $banner->move($destinationPath, $profileImage);
    //         $input['banner'] = "$profileImage";
    //     }
    //     if ($request->hasfile('ad_banner')) {
    //         $banner = $request->file('ad_banner');
    //         $destinationPath = 'ad_banner/';
    //         $profileImage = date('YmdHis') . "." . $banner->getClientOriginalExtension();
    //         $banner->move($destinationPath, $profileImage);
    //         $input['ad_banner'] = "$profileImage";
    //     }

    //     $category = Category::create($input);

    //     return redirect()->route('categories.index')
    //         ->with('success', 'Category created successfully.');
    // }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'order' => 'required',
            'image' => 'required'
        ]);

        try {
            $input = $request->all();

            $input['featured'] = $request->featured ?? 0;
            $input['listing'] = $request->listing ?? 0;

            if ($image = $request->file('image')) {
                $destinationPath = 'image/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = $profileImage;
            }

            if ($request->hasFile('brochure')) {
                $brochure = $request->file('brochure');
                $destinationPath = 'brochure/';
                $profileImage = date('YmdHis') . "." . $brochure->getClientOriginalExtension();
                $brochure->move($destinationPath, $profileImage);
                $input['brochure'] = $profileImage;
            }

            if ($request->hasFile('ad_banner')) {
                $adBanner = $request->file('ad_banner');
                $destinationPath = 'ad_banner/';
                $profileImage = date('YmdHis') . "." . $adBanner->getClientOriginalExtension();
                $adBanner->move($destinationPath, $profileImage);
                $input['ad_banner'] = $profileImage;
            }

            Category::create($input);

            return redirect()->route('categories.index')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('error', 'Error creating category: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'order' => 'required',
        ]);

        $input = $request->all();
        if ($request->featured == '') {
            $input['featured'] = 0;
        }
        if ($request->listing == '') {
            $input['listing'] = 0;
        }
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        if ($image = $request->file('banner')) {
            $destinationPath = 'banner/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['banner'] = "$profileImage";
        }
        if ($image = $request->file('ad_banner')) {
            $destinationPath = 'ad_banner/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['ad_banner'] = "$profileImage";
        }
        $category->update($input);

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }
    // public function update(Request $request, Category $category)
    // {
    //     try {
    //         $request->validate([
    //             'name' => 'required',
    //             'order' => 'required',
    //         ]);

    //         $input = $request->all();

    //         $input['featured'] = $request->featured ?? 0;
    //         $input['listing'] = $request->listing ?? 0;

    //         if ($image = $request->file('image')) {
    //             $destinationPath = 'image/';
    //             $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //             $image->move($destinationPath, $profileImage);
    //             $input['image'] = $profileImage;
    //         }

    //         if ($image = $request->file('banner')) {
    //             $destinationPath = 'banner/';
    //             $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //             $image->move($destinationPath, $profileImage);
    //             $input['banner'] = $profileImage;
    //         }

    //         if ($image = $request->file('ad_banner')) {
    //             $destinationPath = 'ad_banner/';
    //             $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //             $image->move($destinationPath, $profileImage);
    //             $input['ad_banner'] = $profileImage;
    //         }

    //         $category->update($input);

    //         return redirect()->route('categories.index')
    //             ->with('success', 'Category updated successfully.');
    //     } catch (\Exception $e) {
    //         return redirect()->route('categories.index')
    //             ->with('error', 'Something went wrong: ' . $e->getMessage());
    //     }
    // }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->withSuccess(__('Category deleted successfully.'));
    }
}

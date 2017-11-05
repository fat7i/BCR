<?php

namespace App\Http\Controllers;

use Auth;
use App\Category;
use App\Location;
use App\Product;
use App\Photo;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }

    public function create($barcode = null)
    {
        $product = Product::findByBarcode($barcode);

        if ($product)
            return redirect()->action('ProductController@show', ['id' => $barcode])->with('toast', 'Product is Exist');

        $locations = Location::pluck('title', 'id');
        $categories = Category::pluck('title', 'id');
        return view('product.create',
            [
                'barcode' => $barcode,
                'locations' => $locations,
                'categories' => $categories
            ]);
    }


    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        Input::merge(['user_id' => $user_id]);


        $product = Product::create(
            Input::except('_method', '_token', 'photos', 'photo', 'location')
        );

        if ($request->location)
            $product->location()->attach($request->location, ['user_id' => $user_id, 'price' => $request->price]);

        if ($request->categories) {
            foreach ($request->categories as $category)
            $product->category()->attach($category, ['user_id' => $user_id]);
        }

        if ($request->photos) {
            $photos = [];
            foreach (explode(',', $request->photos) as $path) {
                $photo = new Photo;
                $photo->user_id = $user_id;
                $photo->path = $path;

                $photos[] = $photo;
            }
            $product->photos()->saveMany($photos);
        }


        return redirect()
            ->action('ProductController@show', ['id' => $product->barcode])
            ->with('toast', 'Thanks a lot for your contribution!');
    }

    public function upload(Request $request)
    {
        $file = $request->file('photo');
        $imagename = uniqid(Auth::user()->id . "_", false) . '.' . $file->getClientOriginalExtension();
        $photoPath = '/uploads/' . date('Y/m/d/Y-m-d_H-i-s');
        $destinationPath = public_path($photoPath);
        $file->move($destinationPath, $imagename);
        $output['path'] = url("/") . $photoPath . "/" . $imagename;

        return response()->json($output, 200);
    }

    public function show($id)
    {
        $product = Product::findByBarcode($id);

        if ($product)
            return view('product.show', ['product' => $product]);
        else
            return redirect()->action('ProductController@create', ['id' => $id]);
    }

    public function report($id)
    {

    }

    public function addPrice($id)
    {
        $product = Product::findByBarcode($id);
        $locations = Location::pluck('title', 'id');
        return view('product.add_price', ['product' => $product, 'locations' => $locations]);
    }

    public function postPrice (Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'location' => 'required',
            'price' => 'required',
        ]);

        $product = Product::find($request->product_id);
        $product->location()->attach($request->location, ['user_id' => Auth::user()->id, 'price' => $request->price]);

        //-- maintain the price
        $min_price = $product->location()->orderBy('price', 'asc')->pluck('price')->first();
        $product->price = $min_price;
        $product->save();

        return  redirect()->action('ProductController@show', ['id' => $product->barcode])
            ->with('toast', 'Thanks a lot for your contribution!');
    }

    public function postComment (Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'rate' => 'required',
        ]);

        $product = Product::find($request->product_id);

        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->rate = $request->rate;
        $comment->message = $request->message;

        $product->comments()->save($comment);

        //-- maintain the star rating
        $product->rate = ceil( $product->comments()->avg('rate') );

        $product->save();

        return  redirect()->action('ProductController@show', ['id' => $product->barcode])
            ->with('toast', 'Thanks a lot for your contribution!');
    }

    public function addPhoto ($id)
    {
        $product = Product::findByBarcode($id);
        return view('product.add_photo', ['product' => $product]);
    }

    public  function postPhoto (Request $request)
    {

        $request->validate([
            'product_id' => 'required',
        ]);

        $product = Product::find($request->product_id);
        if ($request->photos) {
            $photos = [];
            foreach (explode(',', $request->photos) as $path) {
                $photo = new Photo;
                $photo->user_id = Auth::user()->id;
                $photo->path = $path;

                $photos[] = $photo;
            }
            $product->photos()->saveMany($photos);
        }

        return  redirect()->action('ProductController@show', ['id' => $product->barcode])
            ->with('toast', 'Thanks a lot for your contribution!');
    }
}

<?php

namespace App\Http\Controllers;

use App\About;
use App\Banner;
use App\Card;
use App\Cat;
use App\Cook;
use App\Language;
use App\Main;
use App\Product;
use App\Setting;
use Spatie\Searchable\ModelSearchAspect;
use Spatie\Searchable\Search;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function __construct()
    {
        $setting = Setting::first();
        $banner = Banner::first();
        \View::share('setting',$setting);
        \View::share('banner',$banner);
    }

    public function changeLang($lang)
    {
        $language = Language::where('language', $lang)->exists();
        if ($language) session(['locale' => $lang]);
        return redirect()->back();
    }

    public function index()
    {
        $main = Main::all()->first();
        $cook = Cook::all()->first();
        $about = About::all()->first();
        $products = Product::all();
        return view('index',compact('main','cook','about','products'));
    }

    public function about()
    {
        $abouts = Card::orderBy('id','asc')->get();
        return view('about',compact('abouts'));
    }

    public function catalog()
    {
        $cats = Cat::all();
        $products = Product::where('add_catalog', 1)->paginate(6);
        return view('catalog', compact('cats', 'products'));

    }

    public function shop()
    {
        $cats = Cat::all();
        $products = Product::where('add_shop', 1)->paginate(6);
        return view('shop', compact('cats', 'products'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function shopProduct(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $randoms = Product::inRandomOrder(9)->get();
        $cart = $request->session()->get('cart');
        $session_item = null;
        if (!empty($cart)) {
            foreach ($cart as $key => $value) {
                if ($value->id == $product->id) {
                    $session_item = $value;
                }
            }
        }
        return view('product', compact('product', 'randoms', 'session_item'));
    }

    public function catalogProduct(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $randoms = Product::inRandomOrder()->limit(3)->get();
        $cart = $request->session()->get('cart', []);
        $session_item = null;
        if (!empty($cart)) {
            foreach ($cart as $key => $value) {
                if ($value->id == $product->id) {
                    $session_item = $value;
                }
            }
        }
        return view('product', compact('product', 'randoms', 'session_item'));
    }

    public function basket(Request $request)
    {
        $product = Product::find($request->id);
        \Session::push('cart', $product);
        return response()->json($request->session()->get('cart'));
    }

    public function remove(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        if (!empty($cart)) {
            foreach ($cart as $key => $value) {
                if ($value->id == $request->id) {
                    unset($cart[$key]);
                }
            }
        }
        session()->put('cart', $cart);
        return response()->json($cart);
    }
    public function searchCats($name)
    {
        $cats = Cat::all();
        $cat = Cat::where('cat_name',$name)->first();
        $products = Product::where([
            ['cat_name', '=', $cat->id],
            ['add_catalog', '=', 1]
        ])->paginate(6);
        return view('catalog', compact('cats', 'products'));
    }
    public function searchShopCats($name)
    {
        $cats = Cat::all();
        if($name === 'chip'){
            $products = Product::where('add_shop', '=', 1)->orderBy('price')->paginate(6);
        }else if($name === 'expensive'){
            $products = Product::where('add_shop', '=', 1)->orderBy('price')->paginate(6);
        }else {
            $cat = Cat::where('cat_name', $name)->first();
            $products = Product::where([
                ['cat_name', '=', $cat->id],
                ['add_shop', '=', 1]
            ])->paginate(6);
        }
        return view('shop', compact('cats', 'products'));
    }
    public function searchData(Request $request)
    {

        $searchResults = (new Search())
            ->registerModel(Product::class, ['title','price','text','subtitle','composition'])
            ->perform($request->name);

        return view('result',compact('searchResults'));
    }
}


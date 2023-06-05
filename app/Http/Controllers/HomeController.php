<?php 
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Attribute;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\PasswordReset;
use Alert;

class HomeController extends Controller
{
   
    public function index()
    {
        $products= Product::orderBy('id','DESC')->limit(6)->get();
        

        $productroll=Product::orderBy('id','DESC')->limit(2)->get();
        $newProducts = Product::orderBy('id','DESC')->limit(8)->get();
        $randomProducts = Product::inRandomOrder()->limit(8)->get();
        
        return view('home', compact('newProducts','randomProducts','products','productroll'));
    }

    
    public function product(Request $request)
    {

        $cate = Category::all();
        $sizes = Attribute::where('name', 'size')->get();
        $weights = Attribute::where('name', 'wieght')->get();
        $min_price = Product::min('price');
        $max_price = Product::max('price');
        $categoryId = $request->categoryId;
        $product = DB::table('products');
        
        if($request->sort_by){
            $sort = $request->sort_by;
            if(in_array($sort,['giam_dan', 'tang_dan'])){
                $product->orderBy('price', $sort == 'giam_dan'? 'DESC': 'ASC' );
            }
            if(in_array($sort,['za', 'az'])){
                $product->orderBy('name', $sort == 'za' ? 'DESC' : 'ASC');
            }
        }
        
        if ($categoryId) $product->where('category_id', $categoryId);
        
        $size = $request->size;
        $weight = $request->weight;
        if ($size) {
            
            $product->join('product_attris', 'products.id', '=', 'product_attris.id_product')
            ->join('attributes', 'product_attris.id_attr', '=', 'attributes.id')
            ->where('attributes.id' , $size)->select('products.id','products.name', 'products.price', 'products.image' );
        }

        if ($weight) {

            $product->join('product_attris', 'products.id', '=', 'product_attris.id_product')
            ->join('attributes', 'product_attris.id_attr', '=', 'attributes.id')
            ->where('attributes.id', $weight)->select('products.id', 'products.name', 'products.price', 'products.image');
        }

        $start_price = floatval($request->start_price);
        $end_price = floatval($request->end_price);
        $range = [$start_price, $end_price];
        if ( $start_price && $end_price ){
            if ($start_price > 0 && $end_price > 0){
                $products = $product->whereBetween('price', $range);
            } 
        }


        $product = $product->get();
        return view('product', compact('product', 'cate' , 'sizes', 'weights', 'min_price', 'max_price', 'start_price', 'end_price'));
    }

    public function category(Category $cat)
    {

        $cate = Category::all();
        $products = $cat->products()->paginate(12);
       
        return view('category', compact('cat','products','cate'));
    }

    public function productDetail(Product $product)
    {
        $size = Attribute::where('name', 'size')->get();
        $weight = Attribute::where('name', 'wieght')->get();
        return view('product-detail', compact('product', 'weight', 'size'));
    }


    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;

        $search_product = Product::query()->where('name', 'like', '%' .$keywords. '%')->get();

        return view('search',compact('search_product'));
    }

    

    public function verifyAccount($token)
    {
        $info = PasswordReset::where('token', $token)->firstOrFail();
        
        $check = Customer::where('email', $info->email)->update([
            "email_verified_at" => date('Y-m-d H:i:s')
        ]);

        if ($check) {

            PasswordReset::where('token', $token)->delete();

            return redirect()->route('index.login')->with('yes', 'Account activation successful, You can login');
        }

        return redirect()->route('index.home')->with('no', 'Account activation failed, please try again');
    }

    public function check_register(Request $req)
    {
        $form_data = $req->only('name', 'email', 'gender', 'address', 'phone');
        $form_data['password'] = bcrypt($req->password);

        $req->validate([
            'name' => 'required|min:6',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:10',
            'password' => 'required|min:6',
            'address' => 'required'

        ],
            [
                'numeric' => '*Chỗ này phải là số',
                'name.required' => '*Tên không được để trống',
                'name.min' => '*Tên phải tối thiểu :min ký tự',
                'email.required' => '*Email không được để trống',
                'email.email' => '*Không đúng định dạng email',
                'phone.required' => '*Số điện thoại không được để trống',
                'phone.min' => '*Số điện thoại phải tối thiểu là :min số',
                'password.required' => '*Mật khẩu không được để trống',
                'password.min' => '*Mật khẩu không được nhỏ hơn 6 chữ số',
                'address.required' => '*Địa chỉ không được để trống'
            ]
        );
        if (Customer::create($form_data)) {
            
            return redirect()->route('home.login')->with('yes', 'Đăng ký thành công, bạn có thể đăng nhập');
        }
        return redirect()->back()->with('no', 'Đăng ký không thành công, hãy thử đăng ký lại thông tin');
    }



    public function checkLogin(Request $req)
    {
        
        $form_data = $req->only('email', 'password');
        
        $check = Auth::guard('cus')->attempt($form_data, true);
    

        if ($check) {
            alert('Oh nooo!', 'Your account does not exist', 'success');
            return redirect()->route('home.index');
        }
        alert()->error('Oh nooo!', 'Your account does not exist');
        return redirect()->back();
    }


    public function logout()
    {
        Auth::guard('cus')->logout();
        return redirect()->route('home.index');
    }

    public function contact()
    {
        return view('contact');
    }
    public function register()
    {
        return view('register');
    }

    public function checkout()
    {
        return view('check-out');
    }

    public function about()
    {
        return view('about');
    }

    public function login()
    {
        return view('login-register');
    }
}
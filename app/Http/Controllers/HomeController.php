
<?php 
namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products= Product::orderBy('id','DESC')->limit(6)->get();
        $productroll=Product::orderBy('id','DESC')->limit(2)->get();
        $newProducts = Product::orderBy('id','DESC')->limit(8)->get();
        $randomProducts = Product::inRandomOrder()->limit(8)->get();
        // $saleProducts = Product::orderBy('sale_price','ASC')->where('sale_price','>',0)->limit(8)->get();
        return view('home', compact('newProducts','randomProducts','products','productroll'));
    }

    public function about()
    {
        return view('about');
    }

    public function login()
    {
        return view('login-register');
    }

    public function check_login(Request $req)
    {
       $form_data = $req->only('email','password');
       $check = Auth::guard('cus')->attempt($form_data, $req->has('remember'));

       if ($check) {
            return redirect()->route('home.index')->with('yes', 'Chào mừng trở lại');
       }

       return redirect()->back()->with('no', 'Tài khoản hoặc mật khảu không chính xác');

    }

    public function check_register(Request $req)
    {
        $form_data = $req->only('name','email','gender','address','phone');
        $form_data['password'] = bcrypt($req->password);
        if (Customer::create($form_data)) {
            return redirect()->route('home.login')->with('Yes', 'Đăng ký thành công, bạn có thể đăng nhập');
        }
        return redirect()->back()->with('No', 'Đăng ký không thành công, hãy thử đăng ký lại thông tin');
    }
    public function logout()
    {
        Auth::guard('cus')->logout();
        return redirect()->route('home.login')->with('yes', 'Đăng xuất thành công, vui lòng đăng nhập lại');
    }

    public function profile()
    {
        $auth = Auth::guard('cus')->user();
        // dd ($auth);
        return view('home.profile', compact('auth'));
    }
 

    public function category(Category $cat)
    {
        $products = $cat->products()->paginate(12);
        return view('category', compact('cat','products'));
    }

    public function product()
    {
       
    }

    public function contact()
    {
        return view('contact');
    }
    public function register()
    {
        return view('register');
    }

    public function productDetail(Product $product)
    {
        return view('product-detail', compact('product'));
    }
}


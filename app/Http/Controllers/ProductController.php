<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class ProductController extends Controller
{
    // ================= TRANG CHỦ =================
    public function index()
{
    // ĐỒNG HỒ ĐEO TAY
    $products = Product::where(function ($q) {
            $q->whereNull('category')
              ->orWhere('category', '!=', 'treo-tuong');
        })
        ->latest()
        ->paginate(8, ['*'], 'watch_page');

    // ĐỒNG HỒ TREO TƯỜNG
    $wallClocks = Product::where('category', 'treo-tuong')
        ->latest()
        ->paginate(8, ['*'], 'wall_page');

    return view('home', compact('products', 'wallClocks'));
}

    // ================= CHI TIẾT SẢN PHẨM =================
    public function show($id)
    {
        $product = Product::findOrFail($id);

        $related = Product::where('id', '!=', $id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('detail', compact('product', 'related'));
    }

    // ================= THÊM VÀO GIỎ HÀNG   =================
    public function addToCart($id)
    {
        // 🔒 CHƯA LOGIN KHÔNG CHO THÊM GIỎ
        if (!auth()->check()) {
            return redirect('/login')
                ->with('error', 'Vui lòng đăng nhập!');
        }

        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } else {

            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Đã thêm vào giỏ hàng');
    }

    // ================= MUA NGAY  =================
    public function buyNow($id)
    {
        if (!auth()->check()) {
            return redirect('/login')
                ->with('error', 'Vui lòng đăng nhập!');
        }

        $this->addToCart($id);

        return redirect('/cart');
    }

    // ================= GIỎ HÀNG =================
    public function cart()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        return view('cart');
    }

    // ================= XOÁ SẢN PHẨM TRONG GIỎ =================
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            unset($cart[$id]);

            session()->put('cart', $cart);
        }

        return back();
    }

    // ================= XÓA GIỎ HÀNG =================
    public function clear()
    {
        session()->forget('cart');

        return back();
    }

    // ================= TĂNG SỐ LƯỢNG =================
    public function increase($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);
        }

        return back();
    }

    // ================= GIẢM SỐ LƯỢNG =================
    public function decrease($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['quantity']--;

            if ($cart[$id]['quantity'] <= 0) {
                unset($cart[$id]);
            }

            session()->put('cart', $cart);
        }

        return back();
    }

    // ================= TÌM KIẾM =================
   public function search(Request $request)
{
    $query = trim($request->input('query', ''));

    $products = Product::query()

        ->when($query, function ($q) use ($query) {

            $q->where('name', 'LIKE', "%{$query}%")
              ->orWhere('brand', 'LIKE', "%{$query}%");

        })

        ->paginate(8);

    // THÊM ĐOẠN NÀY
    $wallClocks = Product::where('category', 'treo-tuong')
        ->latest()
        ->paginate(8, ['*'], 'wall_page');

    $suggestions = [];

    if ($query) {

        $suggestions = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('brand', 'LIKE', "%{$query}%")
            ->limit(5)
            ->get();
    }

    return view('home', compact(
        'products',
        'wallClocks',
        'suggestions',
        'query'
    ));
}

    // ================= DANH MỤC =================
    public function category($type)
{
    // ĐỒNG HỒ TREO TƯỜNG
    if ($type == 'treo-tuong') {

        $products = Product::where('category', 'treo-tuong')
            ->latest()
            ->paginate(8);

        $wallClocks = Product::where('category', 'treo-tuong')
    ->latest()
    ->paginate(8, ['*'], 'wall_page');
        return view('home', compact('products', 'wallClocks'));
    }

    // NAM / NỮ
    $products = Product::where('gender', $type)
        ->latest()
        ->paginate(8);

    // KHÔNG ĐỂ LỖI BIẾN
    $wallClocks = Product::where('category', 'treo-tuong')
    ->latest()
    ->paginate(8, ['*'], 'wall_page');

    return view('home', compact('products', 'wallClocks'));
}

    // ================= HÃNG =================
    public function brand($brand)
    {
        $products = Product::where('brand', $brand)
            ->paginate(8);

        return view('home', compact('products'));
    }

    // ================= ĐẶT HÀNG =================
    public function placeOrder(Request $request)
{
    $request->validate([
        'name' => 'required|min:2|max:50',
        'phone' => 'required|regex:/^[0-9]{10,11}$/',
        'address' => 'required|min:5|max:255',
        'payment' => 'required'
    ]);

    $cart = session('cart', []);

    if (empty($cart)) {
        return back()->with('error', 'Giỏ hàng trống!');
    }

    try {

        Order::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'payment' => $request->payment,
            'items' => json_encode($cart),
            'status' => 'pending'
        ]);

        session()->forget('cart');

        return redirect()->route('order.success');

    } catch (\Exception $e) {

        dd($e->getMessage());
    }
}
    // ================= ĐẶT HÀNG THÀNH CÔNG =================
    public function orderSuccess()
    {
        return view('order_success');
    }

    // ================= ĐƠN HÀNG CỦA NGƯỜI DÙNG =================
    public function orders()
    {
        $orders = Order::latest()->get();

        return view('orders', compact('orders'));
    }

    // ================= ADMIN DASHBOARD =================
    public function admin()
    {
        return view('admin.dashboard', [

            'totalOrders' => Order::count(),

            'totalProducts' => Product::count()

        ]);
    }

    // ================= QUẢN LÝ SẢN PHẨM =================
    public function adminProducts()
    {
        $products = Product::latest()->get();

        return view('admin.products', compact('products'));
    }

    // ================= QUẢN LÝ ĐƠN HÀNG =================
    public function adminOrders()
    {
        $orders = Order::latest()->get();

        return view('admin.orders', compact('orders'));
    }

    // ================= XOÁ SẢN PHẨM =================
    public function delete($id)
    {
        Product::destroy($id);

        return back()->with(
            'success',
            'Đã xóa sản phẩm'
        );
    }

    // ================= CẬP NHẬT TRẠNG THÁI ĐƠN HÀNG =================
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = $request->status;

        $order->save();

        return back()->with(
            'success',
            'Cập nhật trạng thái thành công'
        );
    }

    // ================= XOÁ ĐƠN HÀNG =================
    public function deleteOrder($id)
    {
        Order::destroy($id);

        return back()->with(
            'success',
            'Đã xóa đơn hàng'
        );
    }

    // ================= HỦY ĐƠN HÀNG =================
    public function cancelOrder($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();

        return back()->with(
            'success',
            'Đã hủy đơn hàng'
        );
    }

    // ================= THÊM SẢN PHẨM =================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        Product::create($request->all());

        return redirect('/admin/products')
            ->with('success', 'Thêm sản phẩm thành công');
    }

    // ================= TẠO VIEW SẢN PHẨM =================
    public function createProduct()
    {
        return view('admin.add-product');
    }

    // ================= REVENUE =================
    public function revenue()
    {
        $orders = Order::where('status', 'done')->get();

        $totalRevenue = 0;

        foreach ($orders as $order) {

            $items = json_decode($order->items, true);

            foreach ($items as $item) {

                $totalRevenue +=
                    $item['price'] * $item['quantity'];
            }
        }

        return view('admin.revenue', compact(
            'totalRevenue',
            'orders'
        ));
    }
}
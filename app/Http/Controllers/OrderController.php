<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\GeneralRequest;
use App\Http\Requests\OrderRequest;
use App\Category;
use App\Order;
use Mail;

use Laracasts\Flash\Flash;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Order::select();
        if (!empty($_GET['name'])){
            $name = $_GET['name'];
            $query->where('name', 'LIKE', '%'.$name.'%');           
        }
        $order = $query->paginate(15);
        $category = Category::all();
        return view('backend.order.list', compact('order', 'category'));
    }

    /**
     * Search a listing of the resource.
     *
     * @return Response
     */
    public function operations(GeneralRequest $request)
    {
        $order = '';
        if($request->input('delete')) {  
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $order_id) {
                    $order .= $order_id . '-';
                }
                return redirect('admin/order/all/' . $order . '/delete');
            }
            else{
                Flash::warning('No choose', 'alert-class');
                return redirect('admin/order');
            }
            
        }
        else if($request->input('search')){
            $name = $request->input('name');
            return redirect('admin/order?name='. $name);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_category()
    {
        $query = Category::select();
        if (!empty($_GET['title'])){
            $title = $_GET['title'];
            $query->where('title', 'LIKE', '%'.$title.'%');           
        }
        $category = $query->paginate(15);
        return view('backend.category.list', compact('category'));
    }


    /**
     * Search a listing of the resource.
     *
     * @return Response
     */
    public function operations_category(GeneralRequest $request)
    {
        $category = '';
        if($request->input('delete')) {  
            if(!empty($_POST['check_list'])) {
                foreach($_POST['check_list'] as $category_id) {
                    $category .= $category_id . '-';
                }
                return redirect('admin/category/all/' . $category . '/delete');
            }
            else{
                Flash::warning('No choose', 'alert-class');
                return redirect('admin/category');
            }
            
        }
        else if($request->input('search')){
            $title = $request->input('title');
            return redirect('admin/category?title='. $title);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_id = 0;
        $category = Category::all();
        if (!empty($_GET['product'])){
            $category_id = $_GET['product'];
        }
        return view('frontend.order.index', compact('category', 'category_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_category()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order = new Order;
        $user_name = $request->name;
        $order->name = $request->name;
        $user_mail = $request->mail;
        $order->mail = $request->mail;
        $order->mobile = $request->mobile;
        $order->address = $request->address;
        $order->category_id = $request->category;
        $order->quantity = $request->quantity;
        $order->comment = $request->comment;
        $category = Category::find($request->category);
        $total_cost = $request->quantity * $category->price;
        $order->total_cost = $request->quantity * $category->price;

        $info_arr = array();
        $info_arr[] = $request->name;
        $info_arr[] = $request->mobile;
        $info_arr[] = $request->address;
        $category_name = Category::find($request->category);
        $info_arr[] = $category_name['title'];
        $info_arr[] = $request->quantity;
        $info_arr[] = $total_cost;
        $info_arr[] = $category->price;
        Mail::send('mail.contact', ['info_arr' => $info_arr], function($message) use($user_name, $user_mail)
        {
            $message->to($user_mail, $user_name)->subject('Order Information!');
        });
        $order->save();
        Flash::success("Saved Successfully, Please check your E-mail to know Total Cost of your order");
        return redirect('orders');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_category(CategoryRequest $request)
    {
        $category = new Category;
        $category->title = $request->title;
        $category->quantity = $request->quantity;
        $category->price = $request->price;
        $category->save();
        Flash::success("Saved Successfully");
        return redirect('admin/category');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_category($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_category(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->title = $request->title;
        $category->quantity = $request->quantity;
        $category->price = $request->price;
        $category->update();
        Flash::success("Updated Successfully");
        return redirect('admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_category($id)
    {
        $category = Category::find($id);
        return view('backend.category.delete', compact('category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_all_category($id)
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $category = $tokens[4];
        $explode = explode('-', $category);
        $arr = array();
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                array_push($arr, $value);
            }
        }
        $category = Category::whereIn('id', $arr)->get();
        return view('backend.category.delete_all', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        Flash::success("Deleted Successfully");
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy_all_category()
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $category = $tokens[4];
        $explode = explode('-', $category);
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                $mycategory = Category::find($value);
                $mycategory->delete();
                Flash::success("Deleted Successfully");
            }
        }
        return redirect('admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('backend.order.delete', compact('order'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_all($id)
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $order = $tokens[4];
        $explode = explode('-', $order);
        $arr = array();
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                array_push($arr, $value);
            }
        }
        $order = Order::whereIn('id', $arr)->get();
        return view('backend.order.delete_all', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        Flash::success("Deleted Successfully");
        return redirect('admin/order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy_all()
    {
        $url = $_SERVER['REQUEST_URI'];
        $tokens = explode('/', $url);
        $order = $tokens[4];
        $explode = explode('-', $order);
        foreach ($explode as $key => $value) {
            if (!empty($value)){
                $myorder = Order::find($value);
                $myorder->delete();
                Flash::success("Deleted Successfully");
            }
        }
        return redirect('admin/order');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_coming()
    {
        return view('frontend.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print_invoice($id)
    {
        $category = Category::all();
        $order = Order::find($id);
        $today = date('Y-m-d');
        return view('backend.order.print', compact('order', 'category', 'today'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($id){
        $category = Category::all();
        $order = Order::find($id);
        return view('backend.order.show', compact('order', 'category'));
    }
}

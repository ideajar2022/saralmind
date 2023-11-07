<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductsController extends Controller
{
	private $product;
    public function __construct(Product $product)
    {
        $this->middleware('auth:admin');
        $this->product  = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if(!auth()->user()->can('view-product'))
            abort(403, 'Unauthorized action.');

        $product        = $this->product;

        if (request()->has('q')) {
            $name           = request('q');
            $product        = $product->where('name','LIKE',"%{$name}%");
        }
        if (request()->has('status') AND !empty(request('status'))) {
            $product        = $product->where('status',request('status'));
        }
        $products           = $product->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.product.index',compact('products'))->with('title','Products');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	if(!auth()->user()->can('create-product'))
            abort(403, 'Unauthorized action.');

        $product        = $this->product;
        return view('backend.product.create',compact('product'))->with('title','Create Product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
    	if(!auth()->user()->can('create-product'))
            abort(403, 'Unauthorized action.');
       
        $this->product->name            = $request->name;
        $this->product->slug            = $request->slug;
        $this->product->image           = $request->image;
        $this->product->description     = $request->description;
        $this->product->price           = $request->price;
        $this->product->status          = $request->status;
        $this->product->created_by      = auth()->id();
    
        if( $this->product->save() ){
            session()->flash('success','Product Created');
            return redirect()->route('product.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	if(!auth()->user()->can('edit-product'))
            abort(403, 'Unauthorized action.');

        $product    = $this->product->find($id);
        return view('backend.product.edit',compact('product'))->with('title','Edit product');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
    	if(!auth()->user()->can('edit-product'))
            abort(403, 'Unauthorized action.');

        $product                 = $this->product->find($id);
        $product->name           = $request->name;
        $product->slug           = $request->slug;
        $product->image          = $request->image;
        $product->description    = $request->description;
        $product->price          = $request->price;
        $product->status         = $request->status;
   
        if( $product->save() ){
            session()->flash('success', 'Product Updated');
            return redirect()->route('product.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	if(!auth()->user()->can('delete-product'))
            abort(403, 'Unauthorized action.');

        $bool = $this->product->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "product Deleted Successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-product'))
            abort(403, 'Unauthorized action.');

        $product        = $this->product->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $product        = $product->where('name','LIKE',"%{$name}%");
        }
        $products           = $product->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.product.trash',compact('products'))->with('title','Soft Deleted Products');
    }

    public function restore($id)
    {
        $bool = $this->product->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Product restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->product->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "product deleted successfully",
            ]);
        }
    }

}

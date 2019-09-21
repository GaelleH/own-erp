<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Product;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'asc')
            ->paginate(10);

        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    public function search(Request $request)
    {
        if($request->ajax()) {
            $output = "";
            $allProducts = DB::table('products')->get();
            $products = DB::table('products')
                ->where('name','LIKE','%'.$request->search."%")
                ->get();

            if($products) {
                foreach ($products as $key => $product) {
                    $output.='<tr>'.
                    '<td>' . $product->id .'</td>'.
                    '<td>' . $product->name . '</td>'.
                    '<td class="text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="products/'. $product->id .'">Show</a>
                                <a class="dropdown-item" href="products/edit/'. $product->id .'">Edit</a>
                            </div>
                        </div>
                    </td>' .
                    '</tr>';
                }
            } else {
                foreach ($allProducts as $product) {
                    $output .= '<tr>' .
                    '<td>' . $product->id . '</td>' .
                    '<td>' . $product->name . '</td>' .
                    '<td class="text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="products/'. $product->id .'">Show</a>
                                <a class="dropdown-item" href="products/edit/'. $product->id .'">Edit</a>
                            </div>
                        </div>
                    </td>' .
                    '</tr>';
                }
            }

            return Response($output);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Product $model)
    {
        $validated = $request->validated();

        $product = new Product;
        $product->name = $request->input('name');
        $product->sale_price = $request->input('sale_price');
        $product->description = $request->input('description');
        $product->remarks = $request->input('remarks');
        $product->save();

        return redirect()->route('products.index')->withStatus(__('Het product werd succesvol aangemaakt.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->description = $request->input('description');
        $product->name = $request->input('name');
        $product->remarks = $request->input('remarks');
        $product->sale_price = $request->input('sale_price');
        $product->save();

        return redirect()->route('products.index')->withStatus(__('Het product werd succesvol aangepast.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index')->withStatus(__('Het product werd verwijderd.'));
    }
}

<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Catalog;
use App\Product;
 
class IndexController extends Controller
{
    public function index(Request $request)
    {
        $catalog_id = $request->get('catalog_id');
        $page = $request->get('page');
        $catalogs = Catalog::all();
        $products_query = Product::query();
        $products_query->leftJoin('catalogs', function($join) {
            $join->on('products.catalog_id', '=', 'catalogs.id');
          });
        $products_query->select('products.id', 'products.name', 'catalogs.name as catalog_name');
        $products_query->orderBy('products.id', 'desc');
        if ($request->has('catalog_id')) {
            $products_query->whereIn('catalog_id', $catalog_id);
        }
        $products = $products_query->paginate(5);
        return view('index', ['catalogs' => $catalogs, 'products' => $products, 'catalog_id' => $catalog_id, "page" => $page]);
    }
}
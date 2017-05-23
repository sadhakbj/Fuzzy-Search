<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    /**
     * @var Product
     */
    protected $product;

    /**
     * ProductsController constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->with('metaTexts')->get();

        return view('products.index', compact('products'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $descriptionMeta = metaphone($request->description);
        $newProduct      = $this->product->create($request->all());
        $metaPhone       = $newProduct->metaTexts()->create(
            ['sound' => $descriptionMeta]
        );

        return redirect('/products')->with('flash_message', 'Successfully added new product.');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query          = $request->search;
        $searchProducts = $this->searchProduct($query);

        if (count($searchProducts) == 0) {
            $searchBits   = preg_split('/(?<=[^0-9])[. & @*](?<![0-9])/', $query, 0);
            $descriptions = [];
            foreach ($searchBits as $key => $searchBit) {
                $searchVal = $this->searchProduct($searchBit);
                if (count($searchVal) > 0) {
                    $descriptions[] = $searchVal;
                }
            }
            $check = [];
            foreach ($descriptions as $description) {
                foreach ($description as $item) {
                    $check[] = $item;
                }
            }
            $searchProducts = array_unique($check);

        }

        return view('products.search', compact(['searchProducts', 'query']));

    }

    /**
     *  Search the product when query parameter is provided.
     * @param $query
     */
    private function searchProduct($query)
    {
        $searchValue = metaphone($query);

        return $this->product
            ->join('metaPhoneText', 'products.id', 'metaPhoneText.product_id')
            ->select('products.description')
            ->where('metaPhoneText.sound', 'LIKE', "%$searchValue%")
            ->get();
    }
}

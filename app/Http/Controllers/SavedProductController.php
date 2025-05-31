<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedProductController extends Controller
{
    public function store(Request $request)
    {
        $productId = $request->input('product_id');
        $user = Auth::user();

        if ($productId && $user) {
            $user->savedProducts()->syncWithoutDetaching([$productId]);
        }

        return back(); //return response()->json(['status' => 'saved']);
    }

    public function destroy(Product $product)
    {
        $user = Auth::user();

        if ($user) {
            $user->savedProducts()->detach($product->id);
        }

        return back(); //return response()->json(['status' => 'removed']); for the real deal?
    }
}


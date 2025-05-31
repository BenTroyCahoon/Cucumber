<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
        ]);

        $user = Auth::user();
        $user->savedProducts()->syncWithoutDetaching([$request->input('product_id')]);

        return response()->json(['status' => 'saved']);
    }

    public function destroy(Product $product)
    {
        $user = Auth::user();
        $user->savedProducts()->detach($product->id);

        return response()->json(['status' => 'removed']);
    }
}



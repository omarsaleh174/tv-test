<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromoCode;

class PromoCodeController extends Controller
{
    public function index()
    {
        $promoCodes = PromoCode::latest()->get();

        return view('admin.promo-codes.index', compact('promoCodes'));
    }

    public function create()
    {
        return view('admin.promo-codes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:promo_codes',
            'discount_percentage' => 'required|numeric|min:1|max:100',
            'max_usage' => 'required|integer|min:1',
            'expires_at' => 'required|date',
        ]);

        PromoCode::create([
            'code' => strtoupper($request->code),
            'discount_percentage' => $request->discount_percentage,
            'max_usage' => $request->max_usage,
            'used_count' => 0,
            'expires_at' => $request->expires_at,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('promo-codes.index')
            ->with('message', 'Promo Code Added Successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $promoCode = PromoCode::findOrFail($id);

        return view('admin.promo-codes.edit', compact('promoCode'));
    }

    public function update(Request $request, $id)
    {
        $promoCode = PromoCode::findOrFail($id);

        $request->validate([
            'code' => 'required|unique:promo_codes,code,' . $promoCode->id,
            'discount_percentage' => 'required|numeric|min:1|max:100',
            'max_usage' => 'required|integer|min:1',
            'expires_at' => 'required|date',
        ]);

        $promoCode->update([
            'code' => strtoupper($request->code),
            'discount_percentage' => $request->discount_percentage,
            'max_usage' => $request->max_usage,
            'expires_at' => $request->expires_at,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('promo-codes.index')
            ->with('message', 'Promo Code Updated Successfully');
    }

    public function destroy($id)
    {
        PromoCode::findOrFail($id)->delete();

        return redirect()->route('promo-codes.index')
            ->with('message', 'Promo Code Deleted Successfully');
    }
}
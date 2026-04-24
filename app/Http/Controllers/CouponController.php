<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::latest()->paginate(50);
        return view('coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => '',
            'price' => 'required'
        ]);

        $input = $request->all();

        if ($request->is_active == '') {
            $input['is_active'] = 0;
        }
        $input['code'] = Str::upper(Str::random(8, 'alpha_num'));

        $Coupon = Coupon::create($input);

        return redirect()->route('coupons.index')
            ->with('success', 'Coupon created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $Coupon)
    {
        return view('coupons.show', [
            'Coupon' => $Coupon
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::find($id);

        return view('coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $Coupon)
    {
        $request->validate([
            'code' => 'required',
            'price' => 'required'
        ]);

        $input = $request->all();
        if ($request->is_active == '') {
            $input['is_active'] = 0;
        }
        $Coupon->update($input);

        return redirect()->route('coupons.index')
            ->with('success', 'Coupon updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $Coupon)
    {
        $Coupon->delete();

        return redirect()->route('coupons.index')
            ->withSuccess(__('Coupon deleted successfully.'));
    }

    public function getCouponDetails(Request $request)
    {
        $code = $request->code;
        $data['details'] = Coupon::where('code', $code)->where('is_active', 1)->first();
        if (isset($data['details'])) {
            $created_at = $data['details']->created_at;
            $formatted_date = $created_at->format('Y-m-d H:i:s');
            $expiration_time = date("Y-m-d H:i:s", strtotime($formatted_date) + (5 * 60)); // Calculate the expiration time (5 minutes from created_at)
            $current_time = Carbon::now();
            // Format the current date and time
            $formattedDateTime = $current_time->format('Y-m-d H:i:s');
            if ($formattedDateTime < $expiration_time) {
                $data['success'] = true;
            } else {
                $data['success'] = false;
            }
        } else {
            $data['success'] = false;
        }
        return response()->json($data);
    }
}

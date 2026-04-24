<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\AdsReportImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\AdsReport;
use Carbon\Carbon;

class AdsReportController extends Controller
{
    public function index(Request $request)
    {
        $todayDate = now()->toDateString();
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $dateType = $request->date_type ?? 'created_at';
        $query = AdsReport::query();

        if ($request->order_id) {
            $query->where('order_id', 'like', "%{$request->order_id}%");
        }

        if ($request->order_ids) {
            $query->whereIn('order_id', explode(',', $request->order_ids));
        }

        if ($request->product_code) {
            $query->where('product_code', 'like', "%{$request->product_code}%");
        }

        if ($request->sku_code) {
            $query->where('sku_code', 'like', "%{$request->sku_code}%");
        }

        if ($from_date || $to_date) {
            $from_date = $from_date ? Carbon::parse($from_date)->toDateString() : null;
            $to_date = $to_date ? Carbon::parse($to_date)->toDateString() : null;

            $query->where(function ($q) use ($from_date, $to_date, $dateType) {
                if ($from_date && $to_date) {
                    if ($from_date === $to_date) {

                        $q->whereDate($dateType, $from_date);
                    } else {
                        $q->whereBetween($dateType, [$from_date, $to_date]);
                    }
                } elseif ($from_date) {
                    $q->where($dateType, '>=', $from_date);
                } elseif ($to_date) {
                    $q->where($dateType, '<=', $to_date);
                }
            });
        }



        $adsReports = $query->latest('created_at')->paginate(50)->withQueryString();


        return view('reports.ads_report', compact('adsReports'));
    }

    public function upload(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        // Import the data from the Excel sheet using the AdsReportImport class
        Excel::import(new AdsReportImport, $request->file('file'));

        return redirect()->route('ads_report.index')->with('success', 'Ads Report Uploaded Successfully');
    }
}

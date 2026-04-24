<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Attributevalue;
use App\Models\Image;
use Illuminate\Http\Request;

class AttributeValuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Attributes = Attributevalue::latest()->paginate(50);

        return view('attributes.index', compact('Attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attributes.create');
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
            'name' => 'required'
        ]);

        $input = $request->all();

        $Attributevalue = Attributevalue::create($input);
        /*Insert your data*/



        return redirect()->route('attributes.index')
            ->with('success', 'Attributevalue created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($attribute_id)
    {
        $attributedetail = Attributevalue::find($attribute_id);
        $values = Attributevalue::where('attribute_id', $attribute_id)->get();
        return view('attributes.show', compact('values', 'attributedetail', 'attribute_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Attributevalue $Attributevalue)
    {
        return view('attributes.editvalue', [
            'attribute' => $Attributevalue
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attributevalue $Attributevalue)
    {
        $attribute_id = $Attributevalue->attribute_id;
        $request->validate([
            'value' => 'required'
        ]);

        $input = $request->all();

        $Attributevalue->update($input);



        return redirect()->route('attributes.show', $attribute_id)
            ->withSuccess(__('Attribute value updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attributevalue $Attributevalue)
    {
        $attribute_id = $Attributevalue->attribute_id;
        $Attributevalue->delete();

        $attributedetail = Attribute::find($attribute_id);
        $values = Attributevalue::where('attribute_id', $attribute_id)->get();
        return view('attributes.show', compact('values', 'attributedetail', 'attribute_id'));
    }

    public function getCombinations(Request $request)
    {
        $attribute_ids = $request['attributes'];
        $attribute_value_ids = $request['attribute_values'];
        $arr = array();
        $i = 0;
        // cc is for checking the array size if single or multiple 
        $cc = 0;
        foreach ($attribute_ids as $item) {
            $arrOne[$i] = Attributevalue::select('*')->where('attribute_id', $item)->get();
            if (count($arrOne[$i]) > 0) {
                foreach ($arrOne[$i] as $object) {
                    if (in_array($object->id, $attribute_value_ids)) {
                        $arr[$i][] = $object->value;
                        $arrid[$i][] = $object->id;
                    }
                }
                $cc = $cc + 1;
                $valid_attributes[$i] = $item;
            } else {
                $i--;
            }
            //$arr[$i] = array_values($arrOne[$i]['value']);
            $i++;
        }

        function combinations($arrays, $i = 0)
        {
            if (!isset($arrays[$i])) {
                return array();
            }
            if ($i == count($arrays) - 1) {
                return $arrays[$i];
            }

            // get combinations from subsequent arrays
            $tmp = combinations($arrays, $i + 1);

            $result = array();

            // concat each array from tmp with each element from $arrays[$i]
            foreach ($arrays[$i] as $v) {
                foreach ($tmp as $t) {
                    $result[] = is_array($t) ?
                        array_merge(array($v), $t) :
                        array($v, $t);
                }
            }

            return $result;
        }

        $resp =
            combinations($arr);
        $resp1 = combinations($arrid);

        ////////////////////////////////////////////////////////


        // Fetch all records
        $response['data'] = $resp;
        $response['cc'] = $cc;
        $response['attributes_values'] = $resp1;

        return response()->json($response);
    }

    public function getValues(Request $request)
    {
        $attribute_ids = $request['attributes'];
        $i = 0;
        foreach ($attribute_ids as $item) {
            $arrOne[$i] = Attributevalue::select('*')->where('attribute_id', $item)->get();
        }
        $i++;

        return response()->json($arrOne[0]);
    }
}

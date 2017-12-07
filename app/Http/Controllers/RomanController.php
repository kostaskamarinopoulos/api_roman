<?php

namespace App\Http\Controllers;

use App\IntegerConversionInterface;
use Illuminate\Http\Request;
use App\Roman;
use App\Http\Resources\RomanResource;
use App\Http\Resources\RomanCollection;
use Illuminate\Support\Facades\Validator;

class RomanController extends Controller
{
    private $int_con;

    public function __construct(IntegerConversionInterface $int_con_interface)
    {
        $this->int_con = $int_con_interface;  //initialise the interface
    }

    /**
     * Display a listing of all the roman codes.
     *
     */
    public function index()
    {
        return new RomanCollection(Roman::orderBy('updated_at', 'desc')->get());
    }

    /**
     * Display top ten converted numbers
     *
     */
    public function top_ten()
    {
        return new RomanCollection(Roman::orderBy('times_converted', 'desc')->limit(10)->get());
    }


    /**
     * Store a newly created Roman code
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // the rules
        $rules = array(
            'number'    => 'required|Integer|min:1|max:3999'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) 
        {
            return 'Validation errors';
        }
        else
        {
            $roman = Roman::where('number' , $request->number)->first();
            //if already exist in DB update 'times_converted' and 'updated_at'
            if($roman)
            {
                $roman->times_converted += 1;
                $roman->save();
                return new RomanResource($roman);
            }

            $roman = new Roman;
            $resp = $this->int_con->toRomanNumerals($request->number);

            $roman->number = $request->number;
            $roman->roman_code = $resp;
 
            if($roman->save()) {
                RomanResource::withoutWrapping();

                return new RomanResource($roman);
            } 
        }
    }

}

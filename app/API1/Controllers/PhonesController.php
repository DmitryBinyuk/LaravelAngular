<?php

namespace App\API1\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Phone;
use App\Models\Brand;
use App\Http\Transformers\PhoneTransformer;
use App\Http\Transformers\BrandTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class PhonesController extends Controller
{
     /** @var \App\Models\Phone */
    private $phoneRepository;

    /**
     * @param \App\Models\Phone $phoneRepository
     */
    public function __construct(Phone $phoneRepository)
    {
        $this->phoneRepository = $phoneRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

	$phones = Phone::all();

	$data = fractal()
	    ->collection($phones)
	    ->transformWith(new PhoneTransformer())
	    ->toArray();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $employee = new Employee;

        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->contact_number = $request->input('contact_number');
        $employee->position = $request->input('position');
        $employee->save();

        return 'Employee record successfully created with id ' . $employee->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Phone::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $employee = Employee::find($id);

        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->contact_number = $request->input('contact_number');
        $employee->position = $request->input('position');
        $employee->save();

        return "Sucess updating user #" . $employee->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request) {
        $employee = Employee::find($request->input('id'));

        $employee->delete();

        return "Employee record successfully deleted #" . $request->input('id');
    }

    /**
     * Display a listing of brands.
     *
     * @return Response
     */
    public function brands() {

	$brands = Brand::all();

	$namesArray = [];

        return $brands;
    }
}

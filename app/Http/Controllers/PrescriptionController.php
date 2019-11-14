<?php

namespace App\Http\Controllers;

use App\Prescription;
use App\Http\Resources\PrescriptionResource;
use App\Http\Resources\PrescriptionResourceCollection;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * @return PrescriptionResourceCollection
     */
    public function index(): PrescriptionResourceCollection // GET all list
    {
        //return new PrescriptionResourceCollection(Prescription::paginate());
        return new PrescriptionResourceCollection(Prescription::all());
    }

    /**
     * @param Request $request
     * @return PrescriptionResource
     */
    public function store(Request $request) // POST to create
    {
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'description'   => 'required',
        ]);

        $prescription = Prescription::create($request->all());
        return new PrescriptionResource ($prescription);
    }

    /**
     * @param Prescription $prescription
     * @return PrescriptionResource
     */
    public function show(Prescription $prescription): PrescriptionResource // GET one by id
    {
        return new PrescriptionResource($prescription);
    }

    /**
     * @param Prescription $prescription
     * @param Request $request
     * @return PrescriptionResource
     */
    public function update(Prescription $prescription, Request $request): PrescriptionResource // PUT to update
    {

        $prescription->update($request->all());

        return new PrescriptionResource($prescription);
    }

    /**
     * @param Prescription $prescription
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Prescription $prescription) // DELETE
    {
        $prescription->delete();

        return response()->json();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index2()
    {
        $data = PrescriptionController::index();

        return view ('prescription', compact('data'));
    }
}

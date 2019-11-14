<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\EmployeeResourceCollection;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * @return EmployeeResourceCollection
     */
    public function index(): EmployeeResourceCollection // GET all list
    {
        //return new EmployeeResourceCollection(Employee::paginate());
        return new EmployeeResourceCollection(Employee::all());
        //$emp = new EmployeeResourceCollection(Employee::paginate());
        //return view('employees', compact('emp'));
    }

    /**
     * @param Request $request
     * @return EmployeeResource
     */
    public function store(Request $request) // POST to create
    {
        $request->validate([
            'first_name'        => 'required',
            'last_name'         => 'required',
            'phone'             => 'required',
            'email'             => 'required',
            'working_years'     => 'required',
        ]);

        $employee = Employee::create($request->all());
        return new EmployeeResource ($employee);
    }

    /**
     * @param Employee $employee
     * @return EmployeeResource
     */
    public function show(Employee $employee): EmployeeResource // GET one by id
    {
        return new EmployeeResource($employee);
    }

    /**
     * @param Employee $employee
     * @param Request $request
     * @return EmployeeResource
     */
    public function update(Employee $employee, Request $request): EmployeeResource // PUT to update
    {

        $employee->update($request->all());

        return new EmployeeResource($employee);
    }

    /**
     * @param Employee $employee
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Employee $employee) // DELETE
    {
        $employee->delete();

        return response()->json();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index2()
    {
        //$data = EmployeeController::index();
        //$employees = json_decode($data);
        //$employees = $data->jsonSerialize();

        //$url = urlencode('127.0.0.1:8000/api/employee');
        //$data = json_decode(file_get_contents('/employee'), true);
        return view ('employee', compact('data'));
    }

    public function add()
    {
        return view ('add-employee');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySalaryRequest;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\UpdateSalaryRequest;
use App\Salary;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalaryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salaries = Salary::all();

        return view('admin.salaries.index', compact('salaries'));
    }

    public function create()
    {
        abort_if(Gate::denies('salary_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.salaries.create');
    }

    public function store(StoreSalaryRequest $request)
    {
        $salary = Salary::create($request->all());
        flash()->success('A new salary scale has successfully been created');
        return redirect()->route('admin.salaries.index');
    }

    public function edit(Salary $salary)
    {
        abort_if(Gate::denies('salary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.salaries.edit', compact('salary'));
    }

    public function update(UpdateSalaryRequest $request, Salary $salary)
    {
        $salary->update($request->all());

        return redirect()->route('admin.salaries.index');
    }

    public function show(Salary $salary)
    {
        abort_if(Gate::denies('salary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salary->load('salaryScaleProfiles');

        return view('admin.salaries.show', compact('salary'));
    }

    public function destroy(Salary $salary)
    {
        abort_if(Gate::denies('salary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salary->delete();

        return back();
    }

    public function massDestroy(MassDestroySalaryRequest $request)
    {
        Salary::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

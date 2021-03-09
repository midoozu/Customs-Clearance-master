<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCarslistRequest;
use App\Http\Requests\StoreCarslistRequest;
use App\Http\Requests\UpdateCarslistRequest;
use App\Models\Carslist;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarslistController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('carslist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carslists = Carslist::all();

        return view('admin.carslists.index', compact('carslists'));
    }

    public function create()
    {
        abort_if(Gate::denies('carslist_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carslists.create');
    }

    public function store(StoreCarslistRequest $request)
    {
        $carslist = Carslist::create($request->all());

        return redirect()->route('admin.carslists.index');
    }

    public function edit(Carslist $carslist)
    {
        abort_if(Gate::denies('carslist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carslists.edit', compact('carslist'));
    }

    public function update(UpdateCarslistRequest $request, Carslist $carslist)
    {
        $carslist->update($request->all());

        return redirect()->route('admin.carslists.index');
    }

    public function show(Carslist $carslist)
    {
        abort_if(Gate::denies('carslist_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carslist->load('carPlateReceiptdeliveries');

        return view('admin.carslists.show', compact('carslist'));
    }

    public function destroy(Carslist $carslist)
    {
        abort_if(Gate::denies('carslist_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carslist->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarslistRequest $request)
    {
        Carslist::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

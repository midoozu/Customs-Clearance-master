<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarslistRequest;
use App\Http\Requests\UpdateCarslistRequest;
use App\Http\Resources\Admin\CarslistResource;
use App\Models\Carslist;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarslistApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('carslist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CarslistResource(Carslist::all());
    }

    public function store(StoreCarslistRequest $request)
    {
        $carslist = Carslist::create($request->all());

        return (new CarslistResource($carslist))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Carslist $carslist)
    {
        abort_if(Gate::denies('carslist_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CarslistResource($carslist);
    }

    public function update(UpdateCarslistRequest $request, Carslist $carslist)
    {
        $carslist->update($request->all());

        return (new CarslistResource($carslist))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Carslist $carslist)
    {
        abort_if(Gate::denies('carslist_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carslist->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDriverDataRequest;
use App\Http\Requests\UpdateDriverDataRequest;
use App\Http\Resources\Admin\DriverDataResource;
use App\Models\DriverData;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DriverDataApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('driver_data_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DriverDataResource(DriverData::all());
    }

    public function store(StoreDriverDataRequest $request)
    {
        $driverData = DriverData::create($request->all());

        return (new DriverDataResource($driverData))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DriverData $driverData)
    {
        abort_if(Gate::denies('driver_data_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DriverDataResource($driverData);
    }

    public function update(UpdateDriverDataRequest $request, DriverData $driverData)
    {
        $driverData->update($request->all());

        return (new DriverDataResource($driverData))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DriverData $driverData)
    {
        abort_if(Gate::denies('driver_data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $driverData->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

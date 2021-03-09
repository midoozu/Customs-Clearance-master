<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCarPermissionRequest;
use App\Http\Requests\UpdateCarPermissionRequest;
use App\Http\Resources\Admin\CarPermissionResource;
use App\Models\CarPermission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarPermissionApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('car_permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CarPermissionResource(CarPermission::all());
    }

    public function store(StoreCarPermissionRequest $request)
    {
        $carPermission = CarPermission::create($request->all());

        if ($request->input('attachments', false)) {
            $carPermission->addMedia(storage_path('tmp/uploads/' . $request->input('attachments')))->toMediaCollection('attachments');
        }

        return (new CarPermissionResource($carPermission))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CarPermission $carPermission)
    {
        abort_if(Gate::denies('car_permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CarPermissionResource($carPermission);
    }

    public function update(UpdateCarPermissionRequest $request, CarPermission $carPermission)
    {
        $carPermission->update($request->all());

        if ($request->input('attachments', false)) {
            if (!$carPermission->attachments || $request->input('attachments') !== $carPermission->attachments->file_name) {
                if ($carPermission->attachments) {
                    $carPermission->attachments->delete();
                }

                $carPermission->addMedia(storage_path('tmp/uploads/' . $request->input('attachments')))->toMediaCollection('attachments');
            }
        } elseif ($carPermission->attachments) {
            $carPermission->attachments->delete();
        }

        return (new CarPermissionResource($carPermission))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CarPermission $carPermission)
    {
        abort_if(Gate::denies('car_permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carPermission->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

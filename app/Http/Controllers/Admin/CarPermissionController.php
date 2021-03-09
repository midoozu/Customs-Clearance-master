<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCarPermissionRequest;
use App\Http\Requests\StoreCarPermissionRequest;
use App\Http\Requests\UpdateCarPermissionRequest;
use App\Models\CarPermission;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CarPermissionController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('car_permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carPermissions = CarPermission::with(['media'])->get();

        return view('admin.carPermissions.index', compact('carPermissions'));
    }

    public function create()
    {
        abort_if(Gate::denies('car_permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carPermissions.create');
    }

    public function store(StoreCarPermissionRequest $request)
    {
        $carPermission = CarPermission::create($request->all());

        foreach ($request->input('attachments', []) as $file) {
            $carPermission->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $carPermission->id]);
        }

        return redirect()->route('admin.car-permissions.index');
    }

    public function edit(CarPermission $carPermission)
    {
        abort_if(Gate::denies('car_permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carPermissions.edit', compact('carPermission'));
    }

    public function update(UpdateCarPermissionRequest $request, CarPermission $carPermission)
    {
        $carPermission->update($request->all());

        if (count($carPermission->attachments) > 0) {
            foreach ($carPermission->attachments as $media) {
                if (!in_array($media->file_name, $request->input('attachments', []))) {
                    $media->delete();
                }
            }
        }

        $media = $carPermission->attachments->pluck('file_name')->toArray();

        foreach ($request->input('attachments', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $carPermission->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('admin.car-permissions.index');
    }

    public function show(CarPermission $carPermission)
    {
        abort_if(Gate::denies('car_permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carPermissions.show', compact('carPermission'));
    }

    public function destroy(CarPermission $carPermission)
    {
        abort_if(Gate::denies('car_permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carPermission->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarPermissionRequest $request)
    {
        CarPermission::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('car_permission_create') && Gate::denies('car_permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CarPermission();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

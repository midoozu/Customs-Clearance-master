<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReceiptdeliveryRequest;
use App\Http\Requests\UpdateReceiptdeliveryRequest;
use App\Http\Resources\Admin\ReceiptdeliveryResource;
use App\Models\Receiptdelivery;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReceiptdeliveryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('receiptdelivery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReceiptdeliveryResource(Receiptdelivery::with(['driver_name', 'car_plate'])->get());
    }

    public function store(StoreReceiptdeliveryRequest $request)
    {
        $receiptdelivery = Receiptdelivery::create($request->all());

        return (new ReceiptdeliveryResource($receiptdelivery))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Receiptdelivery $receiptdelivery)
    {
        abort_if(Gate::denies('receiptdelivery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReceiptdeliveryResource($receiptdelivery->load(['driver_name', 'car_plate']));
    }

    public function update(UpdateReceiptdeliveryRequest $request, Receiptdelivery $receiptdelivery)
    {
        $receiptdelivery->update($request->all());

        return (new ReceiptdeliveryResource($receiptdelivery))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Receiptdelivery $receiptdelivery)
    {
        abort_if(Gate::denies('receiptdelivery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $receiptdelivery->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateShippingAndClearanceRequest;
use App\Http\Requests\UpdateShippingAndClearanceRequest;
use App\Http\Resources\Admin\ShippingAndClearanceResource;
use App\Models\ShippingAndClearance;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShippingAndClearanceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shipping_and_clearance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ShippingAndClearanceResource(ShippingAndClearance::with(['customer_name'])->get());
    }

    public function store(UpdateShippingAndClearanceRequest $request)
    {
        $shippingAndClearance = ShippingAndClearance::create($request->all());

        return (new ShippingAndClearanceResource($shippingAndClearance))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ShippingAndClearance $shippingAndClearance)
    {
        abort_if(Gate::denies('shipping_and_clearance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ShippingAndClearanceResource($shippingAndClearance->load(['customer_name']));
    }

    public function update(UpdateShippingAndClearanceRequest $request, ShippingAndClearance $shippingAndClearance)
    {
        $shippingAndClearance->update($request->all());

        return (new ShippingAndClearanceResource($shippingAndClearance))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ShippingAndClearance $shippingAndClearance)
    {
        abort_if(Gate::denies('shipping_and_clearance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shippingAndClearance->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

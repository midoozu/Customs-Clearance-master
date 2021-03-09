<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreReceiptVoucherRequest;
use App\Http\Requests\UpdateReceiptVoucherRequest;
use App\Http\Resources\Admin\ReceiptVoucherResource;
use App\Models\ReceiptVoucher;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReceiptVouchersApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('receipt_voucher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReceiptVoucherResource(ReceiptVoucher::all());
    }

    public function store(StoreReceiptVoucherRequest $request)
    {
        $receiptVoucher = ReceiptVoucher::create($request->all());

        if ($request->input('docs', false)) {
            $receiptVoucher->addMedia(storage_path('tmp/uploads/' . $request->input('docs')))->toMediaCollection('docs');
        }

        return (new ReceiptVoucherResource($receiptVoucher))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ReceiptVoucher $receiptVoucher)
    {
        abort_if(Gate::denies('receipt_voucher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReceiptVoucherResource($receiptVoucher);
    }

    public function update(UpdateReceiptVoucherRequest $request, ReceiptVoucher $receiptVoucher)
    {
        $receiptVoucher->update($request->all());

        if ($request->input('docs', false)) {
            if (!$receiptVoucher->docs || $request->input('docs') !== $receiptVoucher->docs->file_name) {
                if ($receiptVoucher->docs) {
                    $receiptVoucher->docs->delete();
                }

                $receiptVoucher->addMedia(storage_path('tmp/uploads/' . $request->input('docs')))->toMediaCollection('docs');
            }
        } elseif ($receiptVoucher->docs) {
            $receiptVoucher->docs->delete();
        }

        return (new ReceiptVoucherResource($receiptVoucher))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ReceiptVoucher $receiptVoucher)
    {
        abort_if(Gate::denies('receipt_voucher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $receiptVoucher->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

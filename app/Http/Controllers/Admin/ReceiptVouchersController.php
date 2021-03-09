<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyReceiptVoucherRequest;
use App\Http\Requests\StoreReceiptVoucherRequest;
use App\Http\Requests\UpdateReceiptVoucherRequest;
use App\Models\ReceiptVoucher;
use App\Models\ShippingAndClearance;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReceiptVouchersController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('receipt_voucher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ReceiptVoucher::query()->select(sprintf('%s.*', (new ReceiptVoucher)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'receipt_voucher_show';
                $editGate      = 'receipt_voucher_edit';
                $deleteGate    = 'receipt_voucher_delete';
                $crudRoutePart = 'receipt-vouchers';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('cus_acc_number', function ($row) {
                return $row->cus_acc_number ? $row->cus_acc_number : "";
            });
            $table->editColumn('cus_name', function ($row) {
                return $row->cus_name ? $row->cus_name : "";
            });

            $table->editColumn('cons_name', function ($row) {
                return $row->cons_name ? $row->cons_name : "";
            });
            $table->editColumn('bl_no', function ($row) {
                return $row->bl_no ? $row->bl_no : "";
            });

            $table->editColumn('ship_name', function ($row) {
                return $row->ship_name ? $row->ship_name : "";
            });

            $table->editColumn('discharge_company', function ($row) {
                return $row->discharge_company ? $row->discharge_company : "";
            });
            $table->editColumn('authorization_number', function ($row) {
                return $row->authorization_number ? $row->authorization_number : "";
            });

            $table->editColumn('statement_number', function ($row) {
                return $row->statement_number ? $row->statement_number : "";
            });

            $table->editColumn('container_partial_wight', function ($row) {
                return $row->container_partial_wight ? $row->container_partial_wight : "";
            });
            $table->editColumn('docs', function ($row) {
                if (!$row->docs) {
                    return '';
                }

                $links = [];

                foreach ($row->docs as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });
            $table->editColumn('shipment_fee', function ($row) {
                return $row->shipment_fee ? $row->shipment_fee : "";
            });
            $table->editColumn('extra_fee', function ($row) {
                return $row->extra_fee ? $row->extra_fee : "";
            });
            $table->editColumn('total_amount', function ($row) {
                return $row->total_amount ? $row->total_amount : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'docs']);

            return $table->make(true);
        }

        return view('admin.receiptVouchers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('receipt_voucher_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $trx_numbers = ShippingAndClearance::all()->pluck('transaction_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.receiptVouchers.create' , compact('trx_numbers'));
    }

    public function store(StoreReceiptVoucherRequest $request)
    {
        $receiptVoucher = ReceiptVoucher::create($request->all());

        foreach ($request->input('docs', []) as $file) {
            $receiptVoucher->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('docs');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $receiptVoucher->id]);
        }

        return redirect()->route('admin.receipt-vouchers.index');
    }

    public function edit(ReceiptVoucher $receiptVoucher)
    {
        abort_if(Gate::denies('receipt_voucher_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.receiptVouchers.edit', compact('receiptVoucher'));
    }

    public function update(UpdateReceiptVoucherRequest $request, ReceiptVoucher $receiptVoucher)
    {
        $receiptVoucher->update($request->all());

        if (count($receiptVoucher->docs) > 0) {
            foreach ($receiptVoucher->docs as $media) {
                if (!in_array($media->file_name, $request->input('docs', []))) {
                    $media->delete();
                }
            }
        }

        $media = $receiptVoucher->docs->pluck('file_name')->toArray();

        foreach ($request->input('docs', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $receiptVoucher->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('docs');
            }
        }

        return redirect()->route('admin.receipt-vouchers.index');
    }

    public function show(ReceiptVoucher $receiptVoucher)
    {
        abort_if(Gate::denies('receipt_voucher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.receiptVouchers.show', compact('receiptVoucher'));
    }

    public function destroy(ReceiptVoucher $receiptVoucher)
    {
        abort_if(Gate::denies('receipt_voucher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $receiptVoucher->delete();

        return back();
    }

    public function massDestroy(MassDestroyReceiptVoucherRequest $request)
    {
        ReceiptVoucher::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('receipt_voucher_create') && Gate::denies('receipt_voucher_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ReceiptVoucher();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

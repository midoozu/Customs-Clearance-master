<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInvoiceTranslateRequest;
use App\Http\Requests\StoreInvoiceTranslateRequest;
use App\Http\Requests\UpdateInvoiceTranslateRequest;
use App\Models\invoice_translate_items;
use App\Models\InvoicesType;
use App\Models\InvoiceTranslate;
use App\Models\ReceiptVoucher;
use App\Models\ShippingAndClearance;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoiceTranslateController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_translate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceTranslates = InvoiceTranslate::get();

        return view('admin.invoiceTranslates.index', compact('invoiceTranslates'));
    }

    public function create()

    {


        abort_if(Gate::denies('invoice_translate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');





        $receipt_vouchers = ReceiptVoucher::all()->pluck('id', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.invoiceTranslates.create', compact('receipt_vouchers'));
    }

    public function store(StoreInvoiceTranslateRequest $request )
    {
        $invoiceTranslate = InvoiceTranslate::create($request->all());

//        $invoice_translate_items = invoice_translate_items::create($request->all('[$key]'));


        $id = $invoiceTranslate->id ;
        $arabic_desc = $request->arabic_desc ;


            foreach ( $arabic_desc as    $key => $v)
            {
                $data = array(
                    'arabic_desc' => $arabic_desc[$key] ,
                    'en_desc' => $request->en_desc[$key] ,
                    'quantity' => $request->en_desc[$key] ,
                    'unit' => $request->unit[$key] ,
                    'hscode' => $request->hscode[$key] ,
                    'amount' => $request->amount[$key] ,
                    'manufacturing_country' => $request->manufacturing_country[$key] ,

                    'invoice_translate_id' => $id
                );
                invoice_translate_items::insert($data);
            }




        return redirect()->route('admin.invoice-translates.index');
    }

    public function edit(InvoiceTranslate $invoiceTranslate)
    {
        abort_if(Gate::denies('invoice_translate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoice_types = InvoicesType::all()->pluck('invoice_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $invoiceTranslate->load('invoice_type');

        return view('admin.invoiceTranslates.edit', compact('invoice_types', 'invoiceTranslate'));
    }

    public function update(UpdateInvoiceTranslateRequest $request, InvoiceTranslate $invoiceTranslate)
    {
        $invoiceTranslate->update($request->all());

        return redirect()->route('admin.invoice-translates.index');
    }

    public function show(InvoiceTranslate $invoiceTranslate)
    {
        abort_if(Gate::denies('invoice_translate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceTranslate->load('invoice_type');

        return view('admin.invoiceTranslates.show', compact('invoiceTranslate'));
    }

    public function destroy(InvoiceTranslate $invoiceTranslate)
    {
        abort_if(Gate::denies('invoice_translate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceTranslate->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvoiceTranslateRequest $request)
    {
        InvoiceTranslate::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

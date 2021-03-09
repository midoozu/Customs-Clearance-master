<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyShippingAndClearanceRequest;
use App\Http\Requests\UpdateShippingAndClearanceRequest;
use App\Models\CarPlateNumber;
use App\Models\Client;
use App\Models\ContainerNumber;
use App\Models\ShippingAndClearance;
use App\Models\TrxStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ShippingAndClearanceController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('shipping_and_clearance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ShippingAndClearance::select(sprintf('%s.*', (new ShippingAndClearance)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'shipping_and_clearance_show';
                $editGate      = 'shipping_and_clearance_edit';
                $deleteGate    = 'shipping_and_clearance_delete';
                $crudRoutePart = 'shipping-and-clearances';

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
            $table->addColumn('customer_name_name', function ($row) {
                return $row->customer_name ? $row->customer_name->name : '';
            });

            $table->editColumn('int_order_no', function ($row) {
                return $row->int_order_no ? $row->int_order_no : "";
            });
            $table->editColumn('supplier_invoice_number', function ($row) {
                return $row->supplier_invoice_number ? $row->supplier_invoice_number : "";
            });
            $table->editColumn('supplier_name', function ($row) {
                return $row->supplier_name ? $row->supplier_name : "";
            });
            $table->editColumn('shipping_policy_number', function ($row) {
                return $row->shipping_policy_number ? $row->shipping_policy_number : "";
            });
            $table->editColumn('transaction_number', function ($row) {
                return $row->transaction_number ? $row->transaction_number : "";
            });

            $table->editColumn('ship_name', function ($row) {
                return $row->ship_name ? $row->ship_name : "";
            });
            $table->editColumn('discharge_company', function ($row) {
                return $row->discharge_company ? $row->discharge_company : "";
            });
            $table->editColumn('authorization_delivery_number', function ($row) {
                return $row->authorization_delivery_number ? $row->authorization_delivery_number : "";
            });

            $table->editColumn('statement_number', function ($row) {
                return $row->statement_number ? $row->statement_number : "";
            });

            $table->editColumn('shipment_type', function ($row) {
                return $row->shipment_type ? $row->shipment_type : "";
            });
            $table->editColumn('container_partial_wight', function ($row) {
                return $row->container_partial_wight ? $row->container_partial_wight : "";
            });
            $table->editColumn('shipment_fees', function ($row) {
                return $row->shipment_fees ? $row->shipment_fees : "";
            });
            $table->editColumn('policy_replacement_fee', function ($row) {
                return $row->policy_replacement_fee ? $row->policy_replacement_fee : "";
            });
            $table->editColumn('extra_fees', function ($row) {
                return $row->extra_fees ? $row->extra_fees : "";
            });
            $table->editColumn('total_amount', function ($row) {
                return $row->total_amount ? $row->total_amount : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        $clients = Client::get();
        $customer_names = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $trx_statuses = TrxStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.shippingAndClearances.index');
    }

    public function findclearanceajax(Request $request)
    {
        $data = ShippingAndClearance::with('customer_name')->where('id',$request->id)->first();
        return \response($data);
    }


    public function create()
    {
        abort_if(Gate::denies('shipping_and_clearance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer_names = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $trx_statuses = TrxStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');



        return view('admin.shippingAndClearances.create', compact('customer_names','trx_statuses'));
    }

    public function store(UpdateShippingAndClearanceRequest $request)

    {

        $shippingAndClearance = ShippingAndClearance::create($request->all());

        $id = $shippingAndClearance->id ;
        $first_latter = $request->first_latter ;

    if ($id !=0){

        foreach ( $first_latter as    $key => $v)
        {


    $data = array(
    'first_latter' => $first_latter[$key] ,
    'sec_letter' => $request->sec_latter[$key],
    'third_letter' => $request->third_latter[$key],
    'forth_letter' => $request->forth_letter[$key],
    'st_number' => $request->st_number[$key],
    'sec_number' => $request->sec_number[$key],
    'third_number' => $request->third_number[$key],
    'forth_number' => $request->forth_number[$key],
    'fifth_number' => $request->fifth_number[$key],
    'sixth_number' => $request->sixth_number[$key],
    'seventh_number' => $request->seventh_number[$key],

        'con_size' => $request->con_size[$key],
        'clearance_id' => $id
    );
                ContainerNumber::insert($data);

        }
    }

        return redirect()->route('admin.shipping-and-clearances.index');
    }

    public function edit(ShippingAndClearance $shippingAndClearance)
    {
        abort_if(Gate::denies('shipping_and_clearance_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer_names = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shippingAndClearance->load('customer_name');

        return view('admin.shippingAndClearances.edit', compact('customer_names', 'shippingAndClearance'));
    }

    public function update(UpdateShippingAndClearanceRequest $request, ShippingAndClearance $shippingAndClearance)
    {
        $shippingAndClearance->update($request->all());

        return redirect()->route('admin.shipping-and-clearances.index');
    }

    public function show(ShippingAndClearance $shippingAndClearance)
    {
        abort_if(Gate::denies('shipping_and_clearance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shippingAndClearance->load('customer_name');

        return view('admin.shippingAndClearances.show', compact('shippingAndClearance'));
    }

    public function destroy(ShippingAndClearance $shippingAndClearance)
    {
        abort_if(Gate::denies('shipping_and_clearance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shippingAndClearance->delete();

        return back();
    }

    public function massDestroy(MassDestroyShippingAndClearanceRequest $request)
    {
        ShippingAndClearance::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

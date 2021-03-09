<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReceiptdeliveryRequest;
use App\Http\Requests\StoreReceiptdeliveryRequest;
use App\Http\Requests\UpdateReceiptdeliveryRequest;
use App\Models\Carslist;
use App\Models\DriverData;
use App\Models\Receiptdelivery;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReceiptdeliveryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('receiptdelivery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Receiptdelivery::with(['driver_name', 'car_plate'])->select(sprintf('%s.*', (new Receiptdelivery)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'receiptdelivery_show';
                $editGate      = 'receiptdelivery_edit';
                $deleteGate    = 'receiptdelivery_delete';
                $crudRoutePart = 'receiptdeliveries';

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
            $table->editColumn('cus_name', function ($row) {
                return $row->cus_name ? $row->cus_name : "";
            });
            $table->editColumn('cus_acc_number', function ($row) {
                return $row->cus_acc_number ? $row->cus_acc_number : "";
            });
            $table->editColumn('recipient', function ($row) {
                return $row->recipient ? $row->recipient : "";
            });
            $table->editColumn('recipient_address', function ($row) {
                return $row->recipient_address ? $row->recipient_address : "";
            });
            $table->editColumn('contact', function ($row) {
                return $row->contact ? $row->contact : "";
            });
            $table->editColumn('sec_contact', function ($row) {
                return $row->sec_contact ? $row->sec_contact : "";
            });
            $table->editColumn('file_number', function ($row) {
                return $row->file_number ? $row->file_number : "";
            });
            $table->editColumn('p_p_no', function ($row) {
                return $row->p_p_no ? $row->p_p_no : "";
            });

            $table->editColumn('policy_no', function ($row) {
                return $row->policy_no ? $row->policy_no : "";
            });
            $table->editColumn('ship_name', function ($row) {
                return $row->ship_name ? $row->ship_name : "";
            });
            $table->addColumn('driver_name_name', function ($row) {
                return $row->driver_name ? $row->driver_name->name : '';
            });

            $table->editColumn('driver_name.driver_no', function ($row) {
                return $row->driver_name ? (is_string($row->driver_name) ? $row->driver_name : $row->driver_name->driver_no) : '';
            });
            $table->addColumn('car_plate_car_plate', function ($row) {
                return $row->car_plate ? $row->car_plate->car_plate : '';
            });

            $table->editColumn('car_plate.car_type', function ($row) {
                return $row->car_plate ? (is_string($row->car_plate) ? $row->car_plate : $row->car_plate->car_type) : '';
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? Receiptdelivery::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'driver_name', 'car_plate']);

            return $table->make(true);
        }

        return view('admin.receiptdeliveries.index');
    }

    public function create()
    {
        abort_if(Gate::denies('receiptdelivery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $driver_names = DriverData::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $car_plates = Carslist::all()->pluck('car_plate', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.receiptdeliveries.create', compact('driver_names', 'car_plates'));
    }

    public function store(StoreReceiptdeliveryRequest $request)
    {
        $receiptdelivery = Receiptdelivery::create($request->all());

        return redirect()->route('admin.receiptdeliveries.index');
    }

    public function edit(Receiptdelivery $receiptdelivery)
    {
        abort_if(Gate::denies('receiptdelivery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $driver_names = DriverData::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $car_plates = Carslist::all()->pluck('car_plate', 'id')->prepend(trans('global.pleaseSelect'), '');

        $receiptdelivery->load('driver_name', 'car_plate');

        return view('admin.receiptdeliveries.edit', compact('driver_names', 'car_plates', 'receiptdelivery'));
    }

    public function update(UpdateReceiptdeliveryRequest $request, Receiptdelivery $receiptdelivery)
    {
        $receiptdelivery->update($request->all());

        return redirect()->route('admin.receiptdeliveries.index');
    }

    public function show(Receiptdelivery $receiptdelivery)
    {
        abort_if(Gate::denies('receiptdelivery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $receiptdelivery->load('driver_name', 'car_plate');

        return view('admin.receiptdeliveries.show', compact('receiptdelivery'));
    }

    public function destroy(Receiptdelivery $receiptdelivery)
    {
        abort_if(Gate::denies('receiptdelivery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $receiptdelivery->delete();

        return back();
    }

    public function massDestroy(MassDestroyReceiptdeliveryRequest $request)
    {
        Receiptdelivery::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

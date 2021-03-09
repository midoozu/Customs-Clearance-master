<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrxStatus;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Gate;


class TrxStatusController extends Controller
{

    public function index(Request $request)
    {
        abort_if(Gate::denies('trx_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TrxStatus::query()->select(sprintf('%s.*', (new TrxStatus)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'TrxStatus_show';
                $editGate = 'TrxStatus_edit';
                $deleteGate = 'TrxStatus_delete';
                $crudRoutePart = 'trx_status';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.trxstatus.index');
    }

    public function create()
    {
        abort_if(Gate::denies('TrxStatus_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trxstatus.create');
    }

    public function store(StoreTrxStatusRequest $request)
    {
        $trxstatus = TrxStatus::create($request->all());

        return redirect()->route('admin.trxstatus.index');
    }

    public function edit(Trxstatus $trxstatus)
    {
        abort_if(Gate::denies('TrxStatus_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trxstatus.edit', compact('trxstatus'));
    }

    public function update(UpdateTrxStatusRequest $request, TrxStatus $trxstatus)
    {
        $trxstatus->update($request->all());

        return redirect()->route('admin.trxstatus.index');
    }

    public function show(TrxStatus $trxstatus)
    {
        abort_if(Gate::denies('TrxStatus_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trxstatus.show', compact('trxstatus'));
    }

    public function destroy(TrxStatus $trxstatus)
    {
        abort_if(Gate::denies('TrxStatus_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trxstatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrxStatusRequest $request)
    {
        TrxStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }


}

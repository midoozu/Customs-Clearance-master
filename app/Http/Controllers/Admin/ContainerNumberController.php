<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContainerNumber;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContainerNumberController extends Controller
{
    public function index(Request $request)
    {
//        abort_if(Gate::denies('client_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
//
//        if ($request->ajax()) {
//            $query = Client::query()->select(sprintf('%s.*', (new Client)->table));
//            $table = Datatables::of($query);
//
//            $table->addColumn('placeholder', '&nbsp;');
//            $table->addColumn('actions', '&nbsp;');
//
//            $table->editColumn('actions', function ($row) {
//                $viewGate      = 'client_show';
//                $editGate      = 'client_edit';
//                $deleteGate    = 'client_delete';
//                $crudRoutePart = 'clients';
//
//                return view('partials.datatablesActions', compact(
//                    'viewGate',
//                    'editGate',
//                    'deleteGate',
//                    'crudRoutePart',
//                    'row'
//                ));
//            });
//
//            $table->editColumn('id', function ($row) {
//                return $row->id ? $row->id : "";
//            });
//            $table->editColumn('name', function ($row) {
//                return $row->name ? $row->name : "";
//            });
//            $table->editColumn('phone', function ($row) {
//                return $row->phone ? $row->phone : "";
//            });
//            $table->editColumn('acc_number', function ($row) {
//                return $row->acc_number ? $row->acc_number : "";
//            });
//            $table->editColumn('city', function ($row) {
//                return $row->city ? $row->city : "";
//            });
//            $table->editColumn('address', function ($row) {
//                return $row->address ? $row->address : "";
//            });
//            $table->editColumn('area', function ($row) {
//                return $row->area ? $row->area : "";
//            });
//            $table->editColumn('email', function ($row) {
//                return $row->email ? $row->email : "";
//            });
//            $table->editColumn('type', function ($row) {
//                return $row->type ? Client::TYPE_RADIO[$row->type] : '';
//            });
//
//            $table->rawColumns(['actions', 'placeholder']);
//
//            return $table->make(true);
//        }
//
//        return view('admin.clients.index');
    }

    public function create()
    {
        abort_if(Gate::denies('client_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clients.create');
    }

    public function store(Request $request)
    {

        $ContainerNumber = ContainerNumber::create([

            'first_latter'=>$request->first_latter,
            ]
        );

        return redirect()->route('admin.clients.index');
    }

    public function edit(Client $client)
    {
        abort_if(Gate::denies('client_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clients.edit', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->all());

        return redirect()->route('admin.clients.index');
    }

    public function show(Client $client)
    {
        abort_if(Gate::denies('client_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client->load('customerNameShippingAndClearances', 'cusNameInvoices');

        return view('admin.clients.show', compact('client'));
    }

    public function destroy(Client $client)
    {
        abort_if(Gate::denies('client_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientRequest $request)
    {
        Client::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

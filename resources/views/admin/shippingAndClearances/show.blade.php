@extends('layouts.admin')
@section('content')

    @can('invoice_translate_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.invoice-translates.create',['id' => $shippingAndClearance->id])}} ">
                    {{ trans('global.add') }} {{ trans('cruds.invoiceTranslate.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
<div class="A4"id="mido" >
    <div >
        <div class="card-header" style="text-align: center"  >
             {{ trans('cruds.shippingAndClearance.title') }}
        </div>
        <div class="container card-header "  >
            <div class="row">
                <div class="w-100"></div>
                <div class="col text-right ">
                    <span class="text-right" >  {{ trans('cruds.shippingAndClearance.fields.id') }}  {{" : "}}  </span>
{{--                    <span  class="text-left"  >{{ $shippingAndClearance->id }} </span>--}}

                </div>
                <div class="w-100"></div>
                <div class="col text-right">
                    <span>  {{ 'التاريخ' }} {{" : "}} </span>
                    <span>     {{ date('Y-m-d') }}</span>

                </div>
                <div class="w-100"></div>
                <div class="col text-right">

                    <span>   {{ 'الوقت' }}  {{" : "}}</span>
                    <span> {{ date(' H:i:s') }}  </span>
                </div>

            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" style="text-align: center" >
           {{ trans('المرسل و المرسل اليه ') }}
        </div>

        <div class="container card-header "  >
            <div class="row">
                <div class="col text-right"> <span>  {{ trans('cruds.shippingAndClearance.fields.supplier_name') }} {{" : "}}</span>
                    <span>  {{ $shippingAndClearance->supplier_name ?? '' }}  </span>
                </div>
                <div class="col text-right">
                    <span>  {{ trans('cruds.shippingAndClearance.fields.customer_name') }} {{" : "}} </span>
                    <span>     {{ $shippingAndClearance->customer_name->name ?? '' }}</span>
                </div>
                <div class="w-100"></div>
                <div class="col text-right">

                    <span>  {{ trans('cruds.shippingAndClearance.fields.supplier_invoice_number') }} {{" : "}}</span>
                    <span>  {{ $shippingAndClearance->supplier_invoice_number }}  </span>
                </div>
                <div class="col text-right ">

                    <span>  {{ trans('cruds.client.fields.acc_number') }} {{" : "}}</span>
                    <span>     {{ $shippingAndClearance->customer_name->acc_number ?? '' }}</span>
                </div>
            </div>
        </div>

    </div>

    <div class="card">
        <div class="card-header" style="text-align: center" >
            {{ trans('بيان الشحنه ') }}
        </div>

        <div class="container  card-header  " >
            <div class="row">
                <div class="col text-right"> <span>  {{ trans('cruds.shippingAndClearance.fields.int_order_no') }} {{" : "}}</span>
                    <span>  {{ $shippingAndClearance->int_order_no }}  </span>
                </div>
                <div class="col text-right">
                    <span>  {{ trans('cruds.shippingAndClearance.fields.shipping_policy_number') }}{{" : "}}</span>
                    <span>     {{ $shippingAndClearance->shipping_policy_number }}</span>
                </div>
                <div class="w-100"></div>
                <div class="col text-right">

                    <span>  {{ trans('cruds.shippingAndClearance.fields.transaction_number') }} {{" : "}}</span>
                    <span>   {{ $shippingAndClearance->transaction_number }}  </span>
                </div>
                <div class="col text-right ">

                    <span> {{ trans('cruds.shippingAndClearance.fields.transaction_date') }}{{" : "}} </span>
                    <span>     {{ $shippingAndClearance->transaction_date }}</span>
                </div>


            </div>
            <div class="row">
                <div class="col text-right"> <span>  {{ trans('cruds.shippingAndClearance.fields.arrival_date') }} {{" : "}}</span>
                    <span>     {{ $shippingAndClearance->arrival_date }}  </span>
                </div>
                <div class="col text-right">
                    <span> {{ trans('cruds.shippingAndClearance.fields.authorization_delivery_number') }}{{" : "}} </span>
                    <span>    {{ $shippingAndClearance->authorization_delivery_number }}</span>
                </div>
                <div class="w-100"></div>
                <div class="col text-right">

                    <span>  {{ trans('cruds.shippingAndClearance.fields.authorization_date') }} {{" : "}}</span>
                    <span>   {{ $shippingAndClearance->authorization_date }}  </span>
                </div>
                <div class="col text-right ">

                    <span> {{ trans('cruds.shippingAndClearance.fields.statement_number') }} {{" : "}} </span>
                    <span>      {{ $shippingAndClearance->statement_number }}</span>
                </div>

                <div class="w-100"></div>
                <div class="col text-right ">

                    <span>    {{ trans('cruds.shippingAndClearance.fields.ship_name') }} {{" : "}}</span>
                    <span>       {{ $shippingAndClearance->ship_name }}}</span>
                </div>
                <div class="col text-right ">

                    <span>     {{ trans('cruds.shippingAndClearance.fields.discharge_company') }} {{" : "}} </span>
                    <span>       {{ $shippingAndClearance->discharge_company }}</span>
                </div>

                <div class="w-100"></div>
                <div class="col text-right ">

                    <span>     {{ trans('cruds.shippingAndClearance.fields.container_partial_wight') }}{{" : "}}</span>
                    <span>        {{ $shippingAndClearance->container_partial_wight }}</span>
                </div>
                <div class="col text-right ">

                    <span>   {{ trans('cruds.shippingAndClearance.fields.shipment_type') }} {{" : "}}</span>
                    <span>      {{ $shippingAndClearance->shipment_type }}</span>
                </div>



            </div>
        </div>

    </div>


    <div class="card">
        <div class="testborder" style="text-align: center" >
            {{ trans('رسوم الشحن  ') }}
        </div>

        <div class="container card-header "  >
            <div class="row">
                <div class="col text-right"> <span> {{ trans('cruds.shippingAndClearance.fields.shipment_fees') }} {{" : "}}</span>
                    <span>  {{ $shippingAndClearance->shipment_fees }}  </span>
                </div>
                <div class="col text-right"><span>
                    <span> {{ trans('cruds.shippingAndClearance.fields.policy_replacement_fee') }}{{" : "}} </span>
                        {{ $shippingAndClearance->policy_replacement_fee }}</span>
                </div>
                <div class="w-100"></div>
                <div class="col text-right">

                    <span>   {{ trans('cruds.shippingAndClearance.fields.extra_fees') }} {{" : "}}</span>
                    <span>   {{ $shippingAndClearance->extra_fees }} </span>
                </div>
                <div class="col text-right ">

                    <span> {{ trans('cruds.shippingAndClearance.fields.total_amount') }}{{" : "}} </span>

                    <span>     {{ $shippingAndClearance->total_amount }}</span>
                </div>
            </div>
        </div>

    </div>






</div>

<div class="form-group">
    <button class="btn btn-default" id="print" onclick="PrintElem('mido');" >Print</button>
</div>
@endsection


@section('script')
    <script>

        function PrintElem(elem)
        {
            var mywindow = window.open('', 'PRINT', 'height=400,width=600');

            mywindow.document.write('<html><head><title>' + document.title  + '</title>');
            mywindow.document.write('</head><body >');
            mywindow.document.write('<h1>' + document.title  + '</h1>');
            mywindow.document.write(document.getElementById(elem).innerHTML);
            mywindow.document.write('</body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/

            mywindow.print();
            mywindow.close();

            return true;
        }
    </script>

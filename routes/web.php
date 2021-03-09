<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('/print/{id}', 'RandomController@show')->name('print');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Clients
    Route::delete('clients/destroy', 'ClientsController@massDestroy')->name('clients.massDestroy');
    Route::resource('clients', 'ClientsController');

    // Shipping And Clearances
    Route::delete('shipping-and-clearances/destroy', 'ShippingAndClearanceController@massDestroy')->name('shipping-and-clearances.massDestroy');
    Route::resource('shipping-and-clearances', 'ShippingAndClearanceController');
//    Route::get('findclearanceajax','ShippingAndClearanceController@findclearanceajax')->name('findclearanceajax');
    Route::get('findclearanceajax', array('as'=>'findclearanceajax', 'uses'=> 'ShippingAndClearanceController@findclearanceajax'));


    // Receiptdeliveries
    Route::delete('receiptdeliveries/destroy', 'ReceiptdeliveryController@massDestroy')->name('receiptdeliveries.massDestroy');
    Route::resource('receiptdeliveries', 'ReceiptdeliveryController');

    // Driver Datas
    Route::delete('driver-datas/destroy', 'DriverDataController@massDestroy')->name('driver-datas.massDestroy');
    Route::resource('driver-datas', 'DriverDataController');

    // Carslists
    Route::delete('carslists/destroy', 'CarslistController@massDestroy')->name('carslists.massDestroy');
    Route::resource('carslists', 'CarslistController');

    // Invoices
    Route::delete('invoices/destroy', 'InvoicesController@massDestroy')->name('invoices.massDestroy');
    Route::resource('invoices', 'InvoicesController');
    Route::get('findprice', array('as'=>'findprice', 'uses'=> 'ServicesController@findprice'));

    // Invoices Types
    Route::delete('invoices-types/destroy', 'InvoicesTypeController@massDestroy')->name('invoices-types.massDestroy');
    Route::resource('invoices-types', 'InvoicesTypeController');

    // Payment Types
    Route::delete('payment-types/destroy', 'PaymentTypeController@massDestroy')->name('payment-types.massDestroy');
    Route::resource('payment-types', 'PaymentTypeController');

    // Car Permissions
    Route::delete('car-permissions/destroy', 'CarPermissionController@massDestroy')->name('car-permissions.massDestroy');
    Route::post('car-permissions/media', 'CarPermissionController@storeMedia')->name('car-permissions.storeMedia');
    Route::post('car-permissions/ckmedia', 'CarPermissionController@storeCKEditorImages')->name('car-permissions.storeCKEditorImages');
    Route::resource('car-permissions', 'CarPermissionController');
    // Receipt Vouchers
    Route::delete('receipt-vouchers/destroy', 'ReceiptVouchersController@massDestroy')->name('receipt-vouchers.massDestroy');
    Route::post('receipt-vouchers/media', 'ReceiptVouchersController@storeMedia')->name('receipt-vouchers.storeMedia');
    Route::post('receipt-vouchers/ckmedia', 'ReceiptVouchersController@storeCKEditorImages')->name('receipt-vouchers.storeCKEditorImages');
    Route::resource('receipt-vouchers', 'ReceiptVouchersController');


    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::resource('services', 'ServicesController');


// container number
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::resource('ContainerNumber', 'ContainerNumberController');



    // Invoice Translates
    Route::delete('invoice-translates/destroy', 'InvoiceTranslateController@massDestroy')->name('invoice-translates.massDestroy');
    Route::resource('invoice-translates', 'InvoiceTranslateController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

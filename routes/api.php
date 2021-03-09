<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Clients
    Route::apiResource('clients', 'ClientsApiController');

    // Shipping And Clearances
    Route::apiResource('shipping-and-clearances', 'ShippingAndClearanceApiController');
    // Services
    Route::apiResource('services', 'ServicesApiController');
    // Receiptdeliveries
    Route::apiResource('receiptdeliveries', 'ReceiptdeliveryApiController');

    // Driver Datas
    Route::apiResource('driver-datas', 'DriverDataApiController');

    // Carslists
    Route::apiResource('carslists', 'CarslistApiController');
});

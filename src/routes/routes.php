<?php

Route::group(['prefix' => 'ap-murni', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\APMurni\Http\Controllers\APMurniController@index',
        'create'     => 'Bantenprov\APMurni\Http\Controllers\APMurniController@create',
        'store'     => 'Bantenprov\APMurni\Http\Controllers\APMurniController@store',
        'show'      => 'Bantenprov\APMurni\Http\Controllers\APMurniController@show',
        'update'    => 'Bantenprov\APMurni\Http\Controllers\APMurniController@update',
        'destroy'   => 'Bantenprov\APMurni\Http\Controllers\APMurniController@destroy',
    ];

    Route::get('/',$controllers->index)->name('ap-murni.index');
    Route::get('/create',$controllers->create)->name('ap-murni.create');
    Route::post('/store',$controllers->store)->name('ap-murni.store');
    Route::get('/{id}',$controllers->show)->name('ap-murni.show');
    Route::put('/{id}/update',$controllers->update)->name('ap-murni.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('ap-murni.destroy');

});


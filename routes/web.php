<?php

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function()
{
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('pretendentes', 'PretendentesController@index')->name('admin.applicant');
    Route::get('pretendentes/registrar', 'PretendentesController@register')->name('admin.applicant.register');
    Route::post('pretendentes/registrado', 'PretendentesController@registered')->name('admin.applicant.registered');
    Route::get('pretendentes/{id}', 'PretendentesController@delete')->name('admin.applicant.delete');
});

Route::get('/', 'VotingController@index');

Auth::routes();


<?php
/**
 * Created by PhpStorm.
 * User: daibo
 * Date: 2018/12/25
 * Time: 10:33 AM
 */


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::any('/excel/export', 'ExcelController@export')->name('public_excel');
});
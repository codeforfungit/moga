<?php

$namespace = 'Moga\Http\Controllers';

Route::group([
    'namespace' => $namespace,
    'prefix' => 'audit',
    'middleware' => 'web'
], function () {

    Route::get('/', 'SurveyController@index')->name('audits');
    Route::get('/add', 'SurveyController@add')->name('survery-add');
    Route::post('/add', 'SurveyController@store')->name('save-survey');
    Route::get('/view/{audit}', 'SurveyController@view')->name('survey-view');
    Route::post('/audit/checklist/save', 'AuditController@questionSave')->name('checklist-save');

    Route::get('survey/create', 'SurveyController@createNewSurvey')->name('survey-map');
});

Route::get('calculator', function(){
    echo 'Hello from the calculator package!';
});
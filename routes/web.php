<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::controller(App\Http\Controllers\DoctorAppointmentController::class)->group(function () 
{
    //Home Page
    Route::get('index', 'index');

    //Add Appointment View Page
    Route::get('add-appointment-view', 'addAppointmentView');

    //Create Appointment
    Route::post('create-appointment', 'createAppointment');

    //Delete Doctor
    Route::get('delete-doctor/{id}', 'deleteDoctor');

    //Get Doctor Availability Details
    Route::get('get-doctor-availability/{doctor_id}', 'getDoctorAvailability');

});
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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified')->middleware('patient');


Route::get('medcine/register' , 'Auth\Medcine\MedcineRegisterController@ShowRegisterForm')->name('medcine.register');
Route::post('medcine/register' , 'Auth\Medcine\MedcineRegisterController@ShowRegisterForm')->name('medcine.register');
Route::post('medcine/registerR', 'Auth\Medcine\MedcineRegisterController@register')->name('medcine.registerR');

Route::get('medcine/login', 'Auth\Medcine\MedcineLoginController@showLoginForm')->name('medcine.login');
Route::post('medcine/login', 'Auth\Medcine\MedcineLoginController@login')->name('medcine.login');

Route::get('/medcine/homeMS' , 'Auth\Medcine\MedecinDashController@ShowDashboard')->name('medcine.homeMS')->middleware('verified')->middleware('medcineMS');
Route::post('/medcine/homeMS' , 'Auth\Medcine\MedecinDashController@ShowDashboard')->name('medcine.homeMS')->middleware('verified')->middleware('medcineMS'); 

Route::get('/medcine/homeRA' , 'Auth\Medcine\MedecinDashController@ShowDashboardRA')->name('medcine.homeMS')->middleware('verified')->middleware('medcineRA');
Route::post('/medcine/homeRA' , 'Auth\Medcine\MedecinDashController@ShowDashboardRA')->name('medcine.homeMS')->middleware('verified')->middleware('medcineRA'); 

Route::post('/medcine/pharmacien' , 'Auth\Medcine\MedecinDashController@ShowDashboardPH')->name('medcine.pha')->middleware('verified'); 
Route::get('/medcine/pharmacien' , 'Auth\Medcine\MedecinDashController@ShowDashboardPH')->name('medcine.pha')->middleware('verified');

// Route::get('/medcine/homeRA', function () {
//     return view('auth.medcine.homeRA');
// })->middleware('verified')->middleware('medcineRA');

// Route::get('/medcine/homeMS', function () {
//     return view('auth.medcine.homeMS');
// })->middleware('verified')->middleware('medcineMS');
Route::get('patient/register' , 'Auth\Patient\PatientRegisterController@ShowRegisterForm')->name('patient.register');
Route::post('patient/register' , 'Auth\Patient\PatientRegisterController@ShowRegisterForm')->name('patient.register');
Route::post('patient/registerR', 'Auth\Patient\PatientRegisterController@register')->name('patient.registerR');


Route::get('patient/login', 'Auth\Patient\PatientLoginController@showLoginForm')->name('patient.login');
Route::post('patient/login', 'Auth\Patient\PatientLoginController@login')->name('patient.login');
Route::post('changeemail', 'Auth\VerificationController@UpdateEmail')->name('changeemail');


Route::get('/patient/home' , 'Auth\Patient\PatientDashController@ShowDashboard')->name('patient.home')->middleware('verified');
Route::post('/patient/home' , 'Auth\Patient\PatientDashController@ShowDashboard')->name('patient.home')->middleware('verified'); 
Route::post('/DMSP' , 'Auth\Patient\PatientDashController@dmsp')->name('DMSP');
Route::get('/DMSP' , 'Auth\Patient\PatientDashController@dmsp')->name('DMSP');




Route::get('/profile' , 'Auth\profileController@index')->name('profile')->middleware('verified');
Route::post('/profile' , 'Auth\profileController@store')->name('profile')->middleware('verified');
Route::put('/profile' , 'Auth\profileController@update')->name('profile')->middleware('verified');
Route::put('/profilenp' , 'Auth\profileController@updatenp')->name('profile')->middleware('verified');








Route::get('patientms' , 'Patient\Patient@indexMS')->name('patientms');
Route::get('patientra' , 'Patient\Patient@indexRA')->name('patientra');





// Route::get('CDM/{id}' , 'DM\DossierMedicale@create')->name('CDM');
Route::post('HM' , 'DM\Historique@show')->name('HM');
Route::post('DMS' , 'DM\Historique@dms')->name('DMS');
Route::get('DMS' , 'DM\Historique@dms')->name('DMS');

Route::post('cnslt' , 'DM\DossierMedicale@Consulter')->name('cnslt');
Route::post('mdf' , 'DM\DossierMedicale@Modifier')->name('mdf');




Route::post('CreateCDM' , 'DM\DossierMedicale@store')->name('CreateCDM');
Route::get('CreateNewPatient' , 'DM\DossierMedicale@newPatient')->name('CreateNewPatient');
Route::post('registerRDossier' , 'DM\DossierMedicale@register')->name('CreateNewPatient');
Route::put('CreateCDM' , 'DM\DossierMedicale@update')->name('CreateCDM');
// Route::get('X/{objet}{id}{specialite}' , 'DM\DossierMedicale@index')->name('X');

// Route::get('CDM' ,'DM\DossierMedicale@index')->name('CDM');
Route::get('SeeCDM/{id}' , 'DM\DossierMedicale@show')->name('SeeCDM');
Route::get('/RA/{id}' , 'DM\DossierMedicale@RA')->name('RA');
Route::get('/R/{id}' , 'DM\DossierMedicale@R')->name('R');
Route::get('/RE/{id}' , 'DM\DossierMedicale@RE')->name('RE');
Route::get('/OM/{id}' , 'DM\DossierMedicale@OM')->name('OM');
Route::get('/CCC/{id}' , 'DM\DossierMedicale@CCC')->name('CCC');



Route::post('CRA' , 'DM\RadioAnalyseController@storeMS')->name('CRA');
Route::put('CRA' , 'DM\RadioAnalyseController@update')->name('CRA');
Route::put('CRADelete' , 'DM\RadioAnalyseController@supprimer')->name('CRADelete');
Route::put('rdrd' , 'DM\RadioAnalyseController@read')->name('rdrd');




Route::post('rapportCreate' , 'DM\RapportController@store')->name('rapportCreate');
Route::put('rapportCreate' , 'DM\RapportController@update')->name('rapportCreate');
Route::put('rapportDelete' , 'DM\RapportController@supprimer')->name('rapportDelete');


Route::post('CR' , 'DM\RedirectionController@store')->name('CR');
Route::put('CR' , 'DM\RedirectionController@update')->name('CR');
Route::put('CRDelete' , 'DM\RedirectionController@supprimer')->name('CRDelete');



// COMME :  CEATION D ORDONNANCE MEDICAL ET MODE D EMPLOI
Route::post('COMME' , 'DM\OrdenanceController@store')->name('COMME');
Route::put('COMME' , 'DM\OrdenanceController@update')->name('COMME');
Route::put('COMMED' , 'DM\OrdenanceController@supprimer')->name('COMMED');




// Route::post('CC' , 'DM\ConseilController@store')->name('CC');
Route::post('blobmp3' , 'DM\ConseilController@blobmp3')->name('blobmp3');
Route::put('dltmp3' , 'DM\ConseilController@supprimer')->name('dltmp3');
Route::put('rdmp3' , 'DM\ConseilController@read')->name('rdmp3');
Route::post('uploadFile' , 'DM\RadioAnalyseController@storeRA')->name('uploadFile');
Route::get('uploadFile' , 'DM\RadioAnalyseController@axiosGet')->name('uploadFile');
Route::post('updateFile' , 'DM\RadioAnalyseController@updatefileRA')->name('updateFile');
Route::post('deleteFile' , 'DM\RadioAnalyseController@deletefileRA')->name('deleteFile');


Route::get('bannedMeds' , 'DM\bannedMeds@fetch')->name('bannedMeds');



Route::post('CCC' , 'DM\ControlConsultationController@store')->name('CCC');
Route::put('CCC' , 'DM\ControlConsultationController@update')->name('CCC');
Route::put('CCCD' , 'DM\ControlConsultationController@supprimer')->name('CCCD');






// bootman 
Route::match(['get', 'post'], '/botman', 'BotManController@handle');


// diagrames


Route::put('Diagrame' , 'Diagrame@update')->name('Diagrame');
Route::get('Diagrame2' , 'Diagrame@update2')->name('Diagrame2');
Route::get('Diagrame3' , 'Diagrame@update3')->name('Diagrame3');
Route::get('Diagrame4' , 'Diagrame@update4')->name('Diagrame4');
Route::get('Diagrame5' , 'Diagrame@update5')->name('Diagrame5');

Route::put('DiagrameRadio01' , 'Diagrame@updateRadio01')->name('DiagrameRadio01');
Route::get('updateRadio02' , 'Diagrame@updateRadio02')->name('updateRadio02');



Route::post('codeMed' , 'CodeMedicament@store')->name('codeMed');
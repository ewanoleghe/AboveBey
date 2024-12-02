<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\{
    AuthController,
    ContactController,
    ApplyController,
    CnaController,
    HhaController,
    MedController,
    BlsController,
    TakeClassController,
    TakeHhaClassController,
    TakeMedClassController,
    TakeBlsClassController,
    AdminController,
    DashboardEnrollmentController,
    AdminDashboardHhaController,
    AdminDashboardMedController,
    AdminDashboardBlsCprController,

    AdminDashboardClassCnaController,
    AdminDashboardClassHhaController,
    AdminDashboardClassMedController,
    AdminDashboardClassBlsController,
    MakeNewClassController
};

// Home Page
Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

// About Page
Route::inertia('/about', 'About')->name('about');
// Privacy n Policy Page
Route::inertia('/privacy', 'Privacy')->name('privacy');

// Guest Routes
Route::middleware(['guest'])->group(function () {
    // Contact Us
    Route::inertia('/contact', 'Contact')->name('contact');
    Route::post('/contact', [ContactController::class, 'contact']);

    // CNA Routes
    Route::get('/nurseassistant', [TakeClassController::class, 'index'])->name('nurseassistant');   // Nurse Assistant Index Page
    Route::get('/take-a-class/cna', [TakeClassController::class, 'Takeall'])->name('take-a-class.cna');  // CLASSES LIST
    Route::get('/take-a-class/cna/training.application', [ApplyController::class, 'CnaApplicationForm']);   // APPLICATION FORM Called with {id} passed
    Route::post('/cna.submit', [CnaController::class, 'store'])->name('cna.submit');   // POST APPLICATION FOR

    // HHA Routes
    Route::get('/homehealthaid', [TakeHhaClassController::class, 'index'])->name('homehealthaid'); // HHA Index Page
    Route::get('/take-a-class/hha', [TakeHhaClassController::class, 'TakeallHha'])->name('take-a-class.hha'); // CLASSES LIST
    Route::get('/take-a-class/hha/training.application', [ApplyController::class, 'HhaApplicationForm']);   // APPLICATION FORM
    Route::post('/hha.submit', [HhaController::class, 'storeHha'])->name('hha.submit');  // POST APPLICATION FORM

    // CMA (Medication Administration) Routes
    Route::get('/medicationadmini', [TakeMedClassController::class, 'index'])->name('medicationadmini'); // CMA Index Page
    Route::get('/take-a-class/med', [TakeMedClassController::class, 'TakeallMed'])->name('take-a-class.med');  // CLASSES LIST
    Route::get('/take-a-class/med/training.application', [ApplyController::class, 'MedApplicationForm']);    // APPLICATION FORM
    Route::post('/med.submit', [MedController::class, 'storeMed'])->name('med.submit');  // POST APPLICATION FORM

    // BLS/CPR/AED Routes
    Route::get('/bls-cpr-aed', [TakeBlsClassController::class, 'index'])->name('bls-cpr-aed'); // BLS/CPR/AED Index Page
    Route::get('/take-a-class/bls', [TakeBlsClassController::class, 'TakeallBls'])->name('take-a-class.bls');  // CLASSES LIST
    Route::get('/take-a-class/bls/training.application', [ApplyController::class, 'BlsApplicationForm']);    // APPLICATION FORM
    Route::post('/bls.submit', [BlsController::class, 'storeBls'])->name('bls.submit');  // POST APPLICATION FORM

    // Form Submitted Flash Message
    Route::get('/form-message', function () {
        return Inertia::render('take-a-class/Forms/FormMessage');
    })->name('form_message');

    // Authentication Routes    // Admin Registration Form
    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,10');   // Limit the login attempts to 5

    // File Download Routes

    // CNA Files
    Route::get('/download/cna/{file}', function ($file) {
        $path = storage_path("app/public/download/cna/{$file}");
    
        if (!file_exists($path)) {
            abort(404, "File not found.");
        }
    
        return response()->download($path);
    })->name('download.cna');

    // HHA Files
    Route::get('/download/hha/{file}', function ($file) {
        $path = storage_path("app/public/download/hha/{$file}");
        return response()->download($path);
    })->name('download.hha');

    // CMA Files
    Route::get('/download/med/{file}', function ($file) {
        $path = storage_path("app/public/download/med/{$file}");
        return response()->download($path);
    })->name('download.med');

    // BLS Files
    Route::get('/download/bls/{file}', function ($file) {
        $path = storage_path("app/public/download/bls/{$file}");
        return response()->download($path);
    })->name('download.bls');
});

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard'); // admin index page
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');    // Display admin settings page
    Route::post('/admin/settings/update', [AdminController::class, 'storeAdminSettings'])->name('SubmitAdminSettings'); // Handle form submission for updating admin settings


    // CNA Enrollment Management
    Route::get('/admin/cna_all_registration', [DashboardEnrollmentController::class, 'ViewCnaReg'])->name('cna_all_registration'); // ( All CNA Registration Page)
    Route::post('/admin/update_cna_payment_status', [DashboardEnrollmentController::class, 'updatePaymentStatus']); // Make paid or pending
    Route::post('/admin/update-read-status', [DashboardEnrollmentController::class, 'updateReadStatus']);  // Mark read and unread
    Route::post('/admin/delete_cna_application', [DashboardEnrollmentController::class, 'deleteApplication'])->name('admin.delete_cna_application'); // Remove a user
    Route::post('/admin/view_cna_application', [DashboardEnrollmentController::class, 'viewApplication'])->name('admin.view_cna_application');  // View a registration using id
    Route::match(['get', 'post'], '/admin/view_cna_application', [DashboardEnrollmentController::class, 'viewApplication'])->name('admin.view_cna_application'); // take care of broken
    Route::patch('/admin/update_cna_payment_status', [DashboardEnrollmentController::class, 'updatePaymentStatusView'])->name('admin.update_cna_payment_status'); // Update Payment status inside the View User
    Route::get('/admin/update_cna_payment_status', [DashboardEnrollmentController::class, 'viewApplication'])->name('admin.update_cna_payment_status'); // Controller return - Update inside the View User
    Route::get('/admin/all_unred_registration', [DashboardEnrollmentController::class, 'ViewAllUnread'])->name('all_unred_registration'); // ( All UNREAD Registration Page)
    Route::get('/admin/cna_pending_payment', [DashboardEnrollmentController::class, 'ViewAllPaymentPending'])->name('cna_pending_payment'); // ( All Pending Payment Page)

    // CNA Class Management
    Route::get('/admin/cna_all_classes', [AdminDashboardClassCnaController::class, 'ViewCnaClass'])->name('admin.cna_all_classes'); // ( All CNA Class Page)
    Route::post('/admin/delete_cna_class', [AdminDashboardClassCnaController::class, 'deleteClass'])->name('admin.delete_cna_class'); // Remove a user
    Route::get('/admin/cna_all_upcoming_classes', [AdminDashboardClassCnaController::class, 'ViewCnaUpComingClass'])->name('admin.cna_all_upcoming_classes'); // ( All Future CNA Class Page)
    Route::get('/admin/view_enrol_by_cna_class', [AdminDashboardClassCnaController::class, 'ViewEnrolByClassClass'])->name('admin.view_enrol_by_cna_class');

    Route::inertia('/admin/register/register_cna_class', 'Admin/register/Register_Cna_Class')->name('admin.register_cna_class');
    Route::post('/admin/register/register_cna_class', [MakeNewClassController::class, 'StoreRegisterCnaClass'])->name('SubmitRegisterCnaClass'); 


    // HHA Enrollment Management
    Route::get('/admin/hha_all_registration', [AdminDashboardHhaController::class, 'ViewHhaAll'])->name('admin.hha_all_registration'); // ( All HHA Registration Page)
    Route::post('/admin/update_hha_payment_status', [AdminDashboardHhaController::class, 'updatePaymentStatus']); // Make paid or pending
    Route::match(['get', 'post'], '/admin/view_hha_application', [AdminDashboardHhaController::class, 'viewApplication'])->name('admin.view_hha_application'); // take care of broken
    Route::post('/admin/update_hha_read_status', [AdminDashboardHhaController::class, 'updateReadStatus']);  // Mark read and unread
    Route::post('/admin/delete_hha_application', [AdminDashboardHhaController::class, 'deleteApplication'])->name('admin.delete_hha_application'); // Remove a user
    Route::post('/admin/view_hha_application', [AdminDashboardHhaController::class, 'viewApplication'])->name('admin.view_hha_application');  // View a registration using id
    Route::patch('/admin/update_hha_payment_status', [AdminDashboardHhaController::class, 'updatePaymentStatusView'])->name('admin.update_hha_payment_status'); // Update Payment status inside the View User
    Route::get('/admin/update_hha_payment_status', [AdminDashboardHhaController::class, 'viewApplication'])->name('admin.update_hha_payment_status'); // Controller return - Update inside the View User
    Route::get('/admin/hha_unred_registration', [AdminDashboardHhaController::class, 'ViewAllUnread'])->name('hha_unred_registration'); // ( All UNREAD Registration Page)
    Route::get('/admin/hha_pending_payment', [AdminDashboardHhaController::class, 'ViewAllPaymentPending'])->name('hha_pending_payment'); // ( All Pending Payment Page)

    // HHA Class Management
    Route::get('/admin/hha_all_classes', [AdminDashboardClassHhaController::class, 'ViewHhaClass'])->name('admin.hha_all_classes'); // ( All HHA Class Page)
    Route::post('/admin/delete_hha_class', [AdminDashboardClassHhaController::class, 'deleteClass'])->name('admin.delete_hha_class'); // Remove a user
    Route::get('/admin/hha_all_upcoming_classes', [AdminDashboardClassHhaController::class, 'ViewHhaUpComingClass'])->name('admin.hha_all_upcoming_classes'); // ( All Future HHA Class Page)
    Route::get('/admin/view_enrol_by_hha_class', [AdminDashboardClassHhaController::class, 'ViewHhaEnrolByClassClass'])->name('admin.view_enrol_by_hha_class');

    Route::inertia('/admin/register/register_hha_class', 'Admin/register/Register_Hha_Class')->name('admin.register_hha_class');
    Route::post('/admin/register/register_hha_class', [MakeNewClassController::class, 'StoreRegisterHhaClass'])->name('SubmitRegisterHhaClass'); 



    // CMA - MED Enrollment Management
    Route::get('/admin/med_all_registration', [AdminDashboardMedController::class, 'ViewMedAll'])->name('admin.med_all_registration'); // ( All med Registration Page)
    Route::post('/admin/update_med_payment_status', [AdminDashboardMedController::class, 'updatePaymentStatus']); // Make paid or pending
    Route::match(['get', 'post'], '/admin/view_med_application', [AdminDashboardMedController::class, 'viewApplication'])->name('admin.view_med_application'); // take care of broken
    Route::post('/admin/update_med_read_status', [AdminDashboardMedController::class, 'updateReadStatus']);  // Mark read and unread
    Route::post('/admin/delete_med_application', [AdminDashboardMedController::class, 'deleteApplication'])->name('admin.delete_med_application'); // Remove a user
    Route::post('/admin/view_med_application', [AdminDashboardMedController::class, 'viewApplication'])->name('admin.view_med_application');  // View a registration using id
    Route::patch('/admin/update_med_payment_status', [AdminDashboardMedController::class, 'updatePaymentStatusView'])->name('admin.update_med_payment_status'); // Update Payment status inside the View User
    Route::get('/admin/update_med_payment_status', [AdminDashboardMedController::class, 'viewApplication'])->name('admin.update_med_payment_status'); // Controller return - Update inside the View User
    Route::get('/admin/med_unred_registration', [AdminDashboardMedController::class, 'ViewAllUnread'])->name('med_unred_registration'); // ( All UNREAD Registration Page)
    Route::get('/admin/med_pending_payment', [AdminDashboardMedController::class, 'ViewAllPaymentPending'])->name('med_pending_payment'); // ( All Pending Payment Page)

    // CMA Class Management
    Route::get('/admin/med_all_classes', [AdminDashboardClassMedController::class, 'ViewMedClass'])->name('admin.med_all_classes'); // ( All CMA Class Page)
    Route::post('/admin/delete_med_class', [AdminDashboardClassMedController::class, 'deleteClass'])->name('admin.delete_med_class'); // Remove a user
    Route::get('/admin/med_all_upcoming_classes', [AdminDashboardClassMedController::class, 'ViewMedUpComingClass'])->name('admin.med_all_upcoming_classes'); // ( All Future CMA Class Page)
    Route::get('/admin/view_enrol_by_med_class', [AdminDashboardClassMedController::class, 'ViewMedEnrolByClass'])->name('admin.view_enrol_by_med_class');

    Route::inertia('/admin/register/register_med_class', 'Admin/register/Register_Med_Class')->name('admin.register_med_class');
    Route::post('/admin/register/register_med_class', [MakeNewClassController::class, 'StoreRegisterMedClass'])->name('SubmitRegisterMedClass'); 



    // BLS/CPR/AED Enrollment Management
    Route::get('/admin/bls_all_registration', [AdminDashboardBlsCprController::class, 'ViewBlsAll'])->name('admin.bls_all_registration'); // ( All bls Registration Page)
    Route::post('/admin/update_bls_payment_status', [AdminDashboardBlsCprController::class, 'updatePaymentStatus']); // Make paid or pending
    Route::match(['get', 'post'], '/admin/view_bls_application', [AdminDashboardBlsCprController::class, 'viewApplication'])->name('admin.view_bls_application'); // take care of broken
    Route::post('/admin/update_bls_read_status', [AdminDashboardBlsCprController::class, 'updateReadStatus']);  // Mark read and unread
    Route::post('/admin/delete_bls_application', [AdminDashboardBlsCprController::class, 'deleteApplication'])->name('admin.delete_bls_application'); // Remove a user
    Route::post('/admin/view_bls_application', [AdminDashboardBlsCprController::class, 'viewApplication'])->name('admin.view_bls_application');  // View a registration using id
    Route::patch('/admin/update_bls_payment_status', [AdminDashboardBlsCprController::class, 'updatePaymentStatusView'])->name('admin.update_bls_payment_status'); // Update Payment status inside the View User
    Route::get('/admin/update_bls_payment_status', [AdminDashboardBlsCprController::class, 'viewApplication'])->name('admin.update_bls_payment_status'); // Controller return - Update inside the View User
    Route::get('/admin/bls_unred_registration', [AdminDashboardBlsCprController::class, 'ViewAllUnread'])->name('bls_unred_registration'); // ( All UNREAD Registration Page)
    Route::get('/admin/bls_pending_payment', [AdminDashboardBlsCprController::class, 'ViewAllPaymentPending'])->name('bls_pending_payment'); // ( All Pending Payment Page)

    // BLS CPR Class Management
    Route::get('/admin/bls_all_classes', [AdminDashboardClassBlsController::class, 'ViewBlsClass'])->name('admin.bls_all_classes'); // ( All BLS Class Page)
    Route::post('/admin/delete_bls_class', [AdminDashboardClassBlsController::class, 'deleteClass'])->name('admin.delete_bls_class'); // Remove a user
    Route::get('/admin/bls_all_upcoming_classes', [AdminDashboardClassBlsController::class, 'ViewBlsUpComingClass'])->name('admin.bls_all_upcoming_classes'); // ( All Future BLS Class Page)
    Route::get('/admin/view_enrol_by_bls_class', [AdminDashboardClassBlsController::class, 'ViewBlsEnrolByClass'])->name('admin.view_enrol_by_bls_class');

    Route::inertia('/admin/register/register_bls_class', 'Admin/register/Register_Bls_Class')->name('admin.register_bls_class');
    Route::post('/admin/register/register_bls_class', [MakeNewClassController::class, 'StoreRegisterBlsClass'])->name('SubmitRegisterBlsClass'); 



    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// // This catch-all route should be at the bottom

Route::get('/{any}', function () {
    return Inertia::render('NotFound');
})->where('any', '.*');
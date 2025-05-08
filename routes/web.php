<?php
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\AutocompleteController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\MdiIcons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;



Route::get('/', [HomePageController::class, 'index'])->name('accueil');


Route::get('/staff', [HomePageController::class, 'showstaff'])->name('staff');

Route::get('/medical_type/{type}', [HomePageController::class, 'showMedicalType'])->name('medical_type');

Route::get('/companies', [HomePageController::class, 'showcompanies'])->name('companies');


Route::get('/connexion', [LoginBasic::class, 'index'])->name('connexion');



/// Main Page Route
//Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');
/*
// Route for company
Route::get('/profile/{id}', [SearchController::class, 'showprofile'])->name('profile');
Route::get('/pharprofile/{id}', [SearchController::class, 'showpharprofile'])->name('pharprofile');
Route::get('/labprofile/{id}', [SearchController::class, 'showlabprofile'])->name('labprofile');
Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/autocomplete', [SearchController::class,'index']);
Route::post('/autocomplete/fetch', [SearchController::class,'fetch'])->name('autocomplete.fetch');

Route::get('/medicalteams/{id}/timeslots', [SearchController::class, 'showTimeSlots'])->name('medicalteams.timeslots');
Route::get('/', [HomePageController::class, 'index'])->name('accueil');
Route::get('/companies', [HomePageController::class, 'showcompanies'])->name('companies');
 Route::get('/staff', [HomePageController::class, 'showstaff'])->name('staff');
 Route::get('/how-it-works', [HomePageController::class, 'showhit'])->name('howitworks');
 
 // Route for medical type
 Route::get('/medical_type/{type}', [HomePageController::class, 'showMedicalType'])->name('medical_type');
 // Route for company type
Route::get('/company_type/{type}', [HomePageController::class, 'showCompanyType'])->name('company_type');

Route::get('/companies', [HomepageController::class, 'showcompany'])->name('companies');
Route::get('/healthmeds', [HomepageController::class, 'showstaff'])->name('staff');
Route::get('/healthmeds/m-{medical_type_id}', [HomepageController::class, 'showMedicalType'])->name('homepage.healthmed');
Route::get('/api/cities', [HomePageController::class, 'getCities']);
Route::get('/m-{medical_Type_id}/{location}', [HomePageController::class, 'showHealthMeds'])->name('homepage.healthmeds');
Route::get('/m-{medical_Type_id}', [HomePageController::class, 'showHealthMeds'])->name('homepage.healthmeds');
// Route for company types
Route::get('/{companyType}/{location}', [HomePageController::class, 'showcompanies'])->name('homepage.companies');
Route::get('/{companyType}', [HomePageController::class, 'showcompanies'])->name('homepage.companies');
//autocomplete
Route::get('/searchauto', [AutocompleteController::class, 'index']);
 Route::post('/autocomplete', [AutocompleteController::class, 'fetch'])->name('autocomplete.fetch');
 Route::post('/autocomplete/cities', [AutocompleteController::class, 'fetchCities'])->name('autocomplete.fetchCities');
 Route::post('/autocomplete/dependencies', [AutocompleteController::class, 'fetchDependencies'])->name('autocomplete.fetchDependencies');
 Route::post('/autocomplete/states', [AutocompleteController::class, 'fetchStates'])->name('autocomplete.fetchStates');
 Route::post('autocomplete/fetchCategories', [AutocompleteController::class, 'fetchCategories'])->name('autocomplete.fetchCategories');
 Route::post('/autocomplete/fetchMedicalTypes', [AutocompleteController::class, 'fetchMedicalTypes'])->name('autocomplete.fetchMedicalTypes');



Route::get('/howitworks', [HomepageController::class, 'showhiw'])->name('howitworks');
*/

// layout
Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');

// cards
Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

// User Interface
Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

// icons
Route::get('/icons/icons-mdi', [MdiIcons::class, 'index'])->name('icons-mdi');

// form elements
Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', [TablesBasic::class, 'index'])->name('tables-basic');
// Route pour afficher le formulaire d'inscription
Route::get('/inscription', [InscriptionController::class, 'afficherFormulaire'])->name('inscription.formulaire');
Route::get('/getStateList/{country_id}', [InscriptionController::class, 'getStateList']);
Route::get('/getDependencyList/{state_id}', [InscriptionController::class, 'getDependencyList']);
//Route::get('verification/notice', [VerificationController::class, 'showVerificationForm'])->name('verification.notice');
//Route::post('verification/verify', [VerificationController::class, 'verify'])->name('verification.verify');
//Route::get('/verify', [VerificationController::class, 'showVerification'])->name('verify.show');
//Route::post('/verify', [VerificationController::class, 'verifyCode'])->name('verify.code');
//search controller


// Recherche par catégorie
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Affichage du profil d'une équipe médicale



Route::get('/medical-team/{id}', [SearchController::class, 'showProfile'])->name('medicalteam.profile');

Route::get('/pharmacy/{id}', [SearchController::class, 'showpharprofile'])->name('pharmacy.profile');

Route::get('/laboratory/{id}', [SearchController::class, 'showlabprofile'])->name('laboratory.profile');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Home Page
Route::get('/mediplus', function () {
    return view('layouts.mediplus'); 
})->name('mediplus.home');

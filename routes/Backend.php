<?php
use App\Http\Controllers\Dashboard\AppointmentController;
use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\ArticleFileController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\DoctorImageController;
use App\Http\Controllers\Dashboard\HealthCategoryController;
use App\Http\Controllers\Dashboard\IllnessController;
use App\Http\Controllers\Dashboard\NutritionalFactController;
use App\Http\Controllers\Dashboard\NutritionalFactFileController;
use App\Http\Controllers\Dashboard\NutritionProgramController;
use App\Http\Controllers\Dashboard\NutritionProgramMealController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Backend routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Backend" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        ########## dashboard admin ##########
        Route::get('/dashboard/admin', function () {
            return view('Dashboard.Admin.index');
        })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');
        ########## end dashboard admin ##########
    
        ########## dashboard doctor ##########
        Route::get('/dashboard/doctor', function () {
            return view('Dashboard.Doctor.index');

        })->middleware(['auth:doctor', 'verified', 'check.account.status'])->name('dashboard.doctor');
        ########## end dashboard doctor ##########
    
        ########## dashboard user ##########
        Route::get('/dashboard/user', function () {
            return view('Dashboard.User.index');

        })->middleware(['auth', 'verified', 'check.account.status'])->name('dashboard.user');
        ########## end dashboard doctor ##########
    
        // -------------------------------- Start Route Admin --------------------------------
        Route::prefix('admins')->middleware(['auth:admin'])->group(function () {
            // ########## Health Categories route ##########
            Route::get('HealthCategories', [HealthCategoryController::class, 'index'])->name('Admin.HealthCategories.index');
            Route::get('HealthCategories/create', [HealthCategoryController::class, 'create'])->name('Admin.HealthCategories.create');
            Route::post('HealthCategories', [HealthCategoryController::class, 'store'])->name('Admin.HealthCategories.store');
            Route::get('HealthCategories/{HealthCategory}', [HealthCategoryController::class, 'show'])->name('Admin.HealthCategories.show');
            Route::get('HealthCategories/{HealthCategory}/edit', [HealthCategoryController::class, 'edit'])->name('Admin.HealthCategories.edit');
            Route::put('HealthCategories/{HealthCategory}', [HealthCategoryController::class, 'update'])->name('Admin.HealthCategories.update');
            Route::delete('HealthCategories/{HealthCategory}', [HealthCategoryController::class, 'destroy'])->name('Admin.HealthCategories.destroy');
            // ########## End Health Categories route ##########
    
            // ########## Illnesses route ##########
            Route::get('Illnesses', [IllnessController::class, 'index'])->name('Admin.Illnesses.index');
            Route::get('Illnesses/create', [IllnessController::class, 'create'])->name('Admin.Illnesses.create');
            Route::post('Illnesses', [IllnessController::class, 'store'])->name('Admin.Illnesses.store');
            Route::get('Illnesses/{Illness}', [IllnessController::class, 'show'])->name('Admin.Illnesses.show');
            Route::get('Illnesses/{Illness}/edit', [IllnessController::class, 'edit'])->name('Admin.Illnesses.edit');
            Route::put('Illnesses/{Illness}', [IllnessController::class, 'update'])->name('Admin.Illnesses.update');
            Route::delete('Illnesses/{Illness}', [IllnessController::class, 'destroy'])->name('Admin.Illnesses.destroy');
            // ########## End Illnesses route ##########
    
            // ########## Articles route ##########
            Route::get('Articles', [ArticleController::class, 'index'])->name('Admin.Articles.index');
            Route::get('Articles/{Article}', [ArticleController::class, 'show'])->name('Admin.Articles.show');
            Route::get('Articles/{Article}/edit', [ArticleController::class, 'edit'])->name('Admin.Articles.edit');
            Route::put('Articles/{Article}', [ArticleController::class, 'update'])->name('Admin.Articles.update');
            Route::delete('Articles/{Article}', [ArticleController::class, 'destroy'])->name('Admin.Articles.destroy');
            Route::post('Articles/update_status', [ArticleController::class, 'update_status'])->name('Admin.Articles.update_status');
            // ########## End Articles route ##########
    
            // ########## Article Files route ##########
            Route::delete('ArticleFiles/{ArticleFile}', [ArticleFileController::class, 'destroy'])->name('Admin.ArticleFiles.destroy');
            // ########## End Article Files route ##########
    
            // ########## Nutritional Facts route ##########
            Route::get('NutritionalFacts', [NutritionalFactController::class, 'index'])->name('Admin.NutritionalFacts.index');
            Route::get('NutritionalFacts/{NutritionalFact}', [NutritionalFactController::class, 'show'])->name('Admin.NutritionalFacts.show');
            Route::get('NutritionalFacts/{NutritionalFact}/edit', [NutritionalFactController::class, 'edit'])->name('Admin.NutritionalFacts.edit');
            Route::put('NutritionalFacts/{NutritionalFact}', [NutritionalFactController::class, 'update'])->name('Admin.NutritionalFacts.update');
            Route::delete('NutritionalFacts/{NutritionalFact}', [NutritionalFactController::class, 'destroy'])->name('Admin.NutritionalFacts.destroy');
            Route::post('NutritionalFacts/update_status', [NutritionalFactController::class, 'update_status'])->name('Admin.NutritionalFacts.update_status');
            // ########## End Nutritional Facts route ##########
    
            // ########## Nutritional Fact Files route ##########
            Route::delete('NutritionalFactFiles/{NutritionalFactFile}', [NutritionalFactFileController::class, 'destroy'])->name('Admin.NutritionalFactFiles.destroy');
            // ########## End Nutritional Fact Files route ##########
    
            // ########## Doctors route ##########
            Route::get('Doctors', [DoctorController::class, 'index'])->name('Admin.Doctors.index');
            Route::get('Doctors/create', [DoctorController::class, 'create'])->name('Admin.Doctors.create');
            Route::post('Doctors', [DoctorController::class, 'store'])->name('Admin.Doctors.store');
            Route::get('Doctors/{Doctor}', [DoctorController::class, 'show'])->name('Admin.Doctors.show');
            Route::get('Doctors/{Doctor}/edit', [DoctorController::class, 'edit'])->name('Admin.Doctors.edit');
            Route::put('Doctors/{Doctor}', [DoctorController::class, 'update'])->name('Admin.Doctors.update');
            Route::delete('Doctors/{Doctor}', [DoctorController::class, 'destroy'])->name('Admin.Doctors.destroy');
            Route::post('Doctors/update_password', [DoctorController::class, 'update_password'])->name('Admin.Doctors.update_password');
            Route::post('Doctors/update_status', [DoctorController::class, 'update_status'])->name('Admin.Doctors.update_status');
            // ########## End Doctors route ##########
    
            // ########## Doctor Images route ##########
            Route::get('DoctorImages/{DoctorImage}/create', [DoctorImageController::class, 'create'])->name('Admin.DoctorImages.create');
            Route::post('DoctorImages', [DoctorImageController::class, 'store'])->name('Admin.DoctorImages.store');
            Route::delete('DoctorImages/{DoctorImage}', [DoctorImageController::class, 'destroy'])->name('Admin.DoctorImages.destroy');
            // ########## End Doctor Images route ##########
    
            // ########## Users route ##########
            Route::get('Users', [UserController::class, 'index'])->name('Admin.Users.index');
            Route::get('Users/{User}', [UserController::class, 'show'])->name('Admin.Users.show');
            Route::delete('Users/{User}', [UserController::class, 'destroy'])->name('Admin.Users.destroy');
            Route::post('Users/update_password', [UserController::class, 'update_password'])->name('Admin.Users.update_password');
            Route::post('Users/update_status', [UserController::class, 'update_status'])->name('Admin.Users.update_status');
            // ########## End Users route ##########
    
        });

        // -------------------------------- End Start Route Admin --------------------------------
    









        // -------------------------------- Start Route Doctor --------------------------------
        Route::prefix('doctors')->middleware(['auth:doctor', 'check.account.status'])->group(function () {
            // ########## Articles route ##########
            Route::get('Articles', [ArticleController::class, 'index'])->name('Doctor.Articles.index');
            Route::get('Articles/create', [ArticleController::class, 'create'])->name('Doctor.Articles.create');
            Route::post('Articles', [ArticleController::class, 'store'])->name('Doctor.Articles.store');
            Route::get('Articles/{Article}', [ArticleController::class, 'show'])->name('Doctor.Articles.show');
            Route::get('Articles/{Article}/edit', [ArticleController::class, 'edit'])->name('Doctor.Articles.edit');
            Route::put('Articles/{Article}', [ArticleController::class, 'update'])->name('Doctor.Articles.update');
            Route::delete('Articles/{Article}', [ArticleController::class, 'destroy'])->name('Doctor.Articles.destroy');
            // ########## End Articles route ##########
    
            // ########## Article Files route ##########
            Route::get('ArticleFiles/{ArticleFile}/create', [ArticleFileController::class, 'create'])->name('Doctor.ArticleFiles.create');
            Route::post('ArticleFiles', [ArticleFileController::class, 'store'])->name('Doctor.ArticleFiles.store');
            Route::delete('ArticleFiles/{ArticleFile}', [ArticleFileController::class, 'destroy'])->name('Doctor.ArticleFiles.destroy');
            // ########## End Article Files route ##########
    
            // ########## Nutritional Facts route ##########
            Route::get('NutritionalFacts', [NutritionalFactController::class, 'index'])->name('Doctor.NutritionalFacts.index');
            Route::get('NutritionalFacts/create', [NutritionalFactController::class, 'create'])->name('Doctor.NutritionalFacts.create');
            Route::post('NutritionalFacts', [NutritionalFactController::class, 'store'])->name('Doctor.NutritionalFacts.store');
            Route::get('NutritionalFacts/{NutritionalFact}', [NutritionalFactController::class, 'show'])->name('Doctor.NutritionalFacts.show');
            Route::get('NutritionalFacts/{NutritionalFact}/edit', [NutritionalFactController::class, 'edit'])->name('Doctor.NutritionalFacts.edit');
            Route::put('NutritionalFacts/{NutritionalFact}', [NutritionalFactController::class, 'update'])->name('Doctor.NutritionalFacts.update');
            Route::delete('NutritionalFacts/{NutritionalFact}', [NutritionalFactController::class, 'destroy'])->name('Doctor.NutritionalFacts.destroy');
            Route::post('NutritionalFacts/update_status', [NutritionalFactController::class, 'update_status'])->name('Doctor.NutritionalFacts.update_status');
            // ########## End Nutritional Facts route ##########
    
            // ########## Nutritional Fact Files route ##########
            Route::get('NutritionalFactFiles/{NutritionalFactFile}/create', [NutritionalFactFileController::class, 'create'])->name('Doctor.NutritionalFactFiles.create');
            Route::post('NutritionalFactFiles', [NutritionalFactFileController::class, 'store'])->name('Doctor.NutritionalFactFiles.store');
            Route::delete('NutritionalFactFiles/{NutritionalFactFile}', [NutritionalFactFileController::class, 'destroy'])->name('Doctor.NutritionalFactFiles.destroy');
            // ########## End Nutritional Fact Files route ##########
    
            // ########## Appointments route ##########
            Route::get('Appointments/{Appointment}', [AppointmentController::class, 'index'])->name('Doctor.Appointments.index');
            Route::get('Appointments/{Appointment}/edit', [AppointmentController::class, 'edit'])->name('Doctor.Appointments.edit');
            Route::put('Appointments/{Appointment}', [AppointmentController::class, 'update'])->name('Doctor.Appointments.update');
            Route::delete('Appointments/{Appointment}', [AppointmentController::class, 'destroy'])->name('Doctor.Appointments.destroy');
            // ########## End Appointments route ##########
    
            // ########## Users route ##########
            Route::get('Users/{User}', [UserController::class, 'show'])->name('Doctor.Users.show');
            // ########## End Users route ##########
    
            // ########## Nutrition Programs route ##########
            Route::get('NutritionPrograms', [NutritionProgramController::class, 'index'])->name('Doctor.NutritionPrograms.index');
            Route::get('NutritionPrograms/create', [NutritionProgramController::class, 'create'])->name('Doctor.NutritionPrograms.create');
            Route::post('NutritionPrograms', [NutritionProgramController::class, 'store'])->name('Doctor.NutritionPrograms.store');
            Route::get('NutritionPrograms/{NutritionProgram}', [NutritionProgramController::class, 'show'])->name('Doctor.NutritionPrograms.show');
            Route::get('NutritionPrograms/{NutritionProgram}/edit', [NutritionProgramController::class, 'edit'])->name('Doctor.NutritionPrograms.edit');
            Route::put('NutritionPrograms/{NutritionProgram}', [NutritionProgramController::class, 'update'])->name('Doctor.NutritionPrograms.update');
            Route::delete('NutritionPrograms/{NutritionProgram}', [NutritionProgramController::class, 'destroy'])->name('Doctor.NutritionPrograms.destroy');
            // ########## Nutrition Programs route ##########
    
            // ########## Nutrition Program Meals route ##########
            Route::get('NutritionProgramMeals/{NutritionProgramMeal}/create', [NutritionProgramMealController::class, 'create'])->name('Doctor.NutritionProgramMeals.create');
            Route::post('NutritionProgramMeals', [NutritionProgramMealController::class, 'store'])->name('Doctor.NutritionProgramMeals.store');
            Route::get('NutritionProgramMeals/{NutritionProgram}/{NutritionProgramMeal}', [NutritionProgramMealController::class, 'show'])->name('Doctor.NutritionProgramMeals.show');
            Route::delete('NutritionProgramMeals/{NutritionProgramMeal}', [NutritionProgramMealController::class, 'destroy'])->name('Doctor.NutritionProgramMeals.destroy');
            // ########## End Nutrition Program Meals route ##########
    

        });
        // -------------------------------- End Start Route Doctor --------------------------------
    









        // -------------------------------- Start Route User --------------------------------
        Route::prefix('users')->middleware(['auth', 'check.account.status'])->group(function () {
            // ########## Users route ##########
            Route::get('Users/{User}/edit', [UserController::class, 'edit'])->name('User.Users.edit');
            Route::put('Users/{User}', [UserController::class, 'update'])->name('User.Users.update');
            Route::get('Users/{User}/edit_password', [UserController::class, 'edit_password'])->name('User.Users.edit_password');
            Route::post('Users/update_password', [UserController::class, 'update_password'])->name('User.Users.update_password');
            Route::delete('Users/{User}', [UserController::class, 'destroy'])->name('User.Users.destroy');
            // ########## End Users route ##########
    
            // ########## Doctors route ##########
            Route::get('Doctors', [DoctorController::class, 'index'])->name('User.Doctors.index');
            Route::get('Doctors/{Doctor}', [DoctorController::class, 'show'])->name('User.Doctors.show');
            // ########## End Doctors route ##########
    
            // ########## Appointments route ##########
            Route::get('Appointments/{Appointment}', [AppointmentController::class, 'index'])->name('User.Appointments.index');
            Route::get('Appointments/{Appointment}/create', [AppointmentController::class, 'create'])->name('User.Appointments.create');
            Route::post('Appointments', [AppointmentController::class, 'store'])->name('User.Appointments.store');
            Route::delete('Appointments/{Appointment}', [AppointmentController::class, 'destroy'])->name('User.Appointments.destroy');
            // ########## End Appointments route ##########   
    
            // ########## Nutrition Programs route ##########
            Route::get('NutritionPrograms', [NutritionProgramController::class, 'index'])->name('User.NutritionPrograms.index');
            Route::get('NutritionPrograms/{NutritionProgram}', [NutritionProgramController::class, 'show'])->name('User.NutritionPrograms.show');
            // ########## Nutrition Programs route ##########
    
            // ########## Nutrition Program Meals route ##########
            Route::get('NutritionProgramMeals/{NutritionProgram}/{NutritionProgramMeal}', [NutritionProgramMealController::class, 'show'])->name('User.NutritionProgramMeals.show');
            // ########## End Nutrition Program Meals route ##########
    
            // ########## Articles route ##########
            Route::get('Articles', [ArticleController::class, 'index'])->name('User.Articles.index');
            // ########## End Articles route ##########
    

            // ########## Nutritional Facts route ##########
            Route::get('NutritionalFacts', [NutritionalFactController::class, 'index'])->name('User.NutritionalFacts.index');
            // ########## End Nutritional Facts route ##########
    
        });
        // -------------------------------- End Start Route User --------------------------------
    
        require __DIR__ . '/auth.php';
    }
);
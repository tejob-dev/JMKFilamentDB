<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\SlideController;
use App\Http\Controllers\Api\EquipeController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\ActualiteController;
use App\Http\Controllers\Api\FormationController;
use App\Http\Controllers\Api\LienfooterController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\AccueilactuController;
use App\Http\Controllers\Api\AccueilaboutController;
use App\Http\Controllers\Api\AccueilvideoController;
use App\Http\Controllers\Api\AccueilclientController;
use App\Http\Controllers\Api\AccueiltemoinController;
use App\Http\Controllers\Api\TypeformationController;
use App\Http\Controllers\Api\AccueilmanagerController;
use App\Http\Controllers\Api\AccueilserviceController;
use App\Http\Controllers\Api\AccueilformationController;
use App\Http\Controllers\Api\AccueilclientitemController;
use App\Http\Controllers\Api\AccueilmanageritemController;
use App\Http\Controllers\Api\AccueilserviceitemController;
use App\Http\Controllers\Api\AccueiltemoinEquipesController;
use App\Http\Controllers\Api\AccueilactuActualitesController;
use App\Http\Controllers\Api\TypeformationFormationsController;
use App\Http\Controllers\Api\TypeformationActualitesController;
use App\Http\Controllers\Api\AccueilformationFormationsController;
use App\Http\Controllers\Api\AccueilclientAccueilclientitemsController;
use App\Http\Controllers\Api\AccueilmanagerAccueilmanageritemsController;
use App\Http\Controllers\Api\AccueilserviceAccueilserviceitemsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::get('/users', [UserController::class, 'index'])->name(
            'users.index'
        );
        Route::post('/users', [UserController::class, 'store'])->name(
            'users.store'
        );
        Route::get('/users/{user}', [UserController::class, 'show'])->name(
            'users.show'
        );
        Route::put('/users/{user}', [UserController::class, 'update'])->name(
            'users.update'
        );
        Route::delete('/users/{user}', [
            UserController::class,
            'destroy',
        ])->name('users.destroy');

        Route::get('/accueilabouts', [
            AccueilaboutController::class,
            'index',
        ])->name('accueilabouts.index');
        Route::post('/accueilabouts', [
            AccueilaboutController::class,
            'store',
        ])->name('accueilabouts.store');
        Route::get('/accueilabouts/{accueilabout}', [
            AccueilaboutController::class,
            'show',
        ])->name('accueilabouts.show');
        Route::put('/accueilabouts/{accueilabout}', [
            AccueilaboutController::class,
            'update',
        ])->name('accueilabouts.update');
        Route::delete('/accueilabouts/{accueilabout}', [
            AccueilaboutController::class,
            'destroy',
        ])->name('accueilabouts.destroy');

        Route::get('/slides', [SlideController::class, 'index'])->name(
            'slides.index'
        );
        Route::post('/slides', [SlideController::class, 'store'])->name(
            'slides.store'
        );
        Route::get('/slides/{slide}', [SlideController::class, 'show'])->name(
            'slides.show'
        );
        Route::put('/slides/{slide}', [SlideController::class, 'update'])->name(
            'slides.update'
        );
        Route::delete('/slides/{slide}', [
            SlideController::class,
            'destroy',
        ])->name('slides.destroy');

        Route::get('/accueilactus', [
            AccueilactuController::class,
            'index',
        ])->name('accueilactus.index');
        Route::post('/accueilactus', [
            AccueilactuController::class,
            'store',
        ])->name('accueilactus.store');
        Route::get('/accueilactus/{accueilactu}', [
            AccueilactuController::class,
            'show',
        ])->name('accueilactus.show');
        Route::put('/accueilactus/{accueilactu}', [
            AccueilactuController::class,
            'update',
        ])->name('accueilactus.update');
        Route::delete('/accueilactus/{accueilactu}', [
            AccueilactuController::class,
            'destroy',
        ])->name('accueilactus.destroy');

        // Accueilactu Actualites
        Route::get('/accueilactus/{accueilactu}/actualites', [
            AccueilactuActualitesController::class,
            'index',
        ])->name('accueilactus.actualites.index');
        Route::post('/accueilactus/{accueilactu}/actualites', [
            AccueilactuActualitesController::class,
            'store',
        ])->name('accueilactus.actualites.store');

        Route::get('/accueilclients', [
            AccueilclientController::class,
            'index',
        ])->name('accueilclients.index');
        Route::post('/accueilclients', [
            AccueilclientController::class,
            'store',
        ])->name('accueilclients.store');
        Route::get('/accueilclients/{accueilclient}', [
            AccueilclientController::class,
            'show',
        ])->name('accueilclients.show');
        Route::put('/accueilclients/{accueilclient}', [
            AccueilclientController::class,
            'update',
        ])->name('accueilclients.update');
        Route::delete('/accueilclients/{accueilclient}', [
            AccueilclientController::class,
            'destroy',
        ])->name('accueilclients.destroy');

        // Accueilclient Accueilclientitems
        Route::get('/accueilclients/{accueilclient}/accueilclientitems', [
            AccueilclientAccueilclientitemsController::class,
            'index',
        ])->name('accueilclients.accueilclientitems.index');
        Route::post('/accueilclients/{accueilclient}/accueilclientitems', [
            AccueilclientAccueilclientitemsController::class,
            'store',
        ])->name('accueilclients.accueilclientitems.store');

        Route::get('/accueilclientitems', [
            AccueilclientitemController::class,
            'index',
        ])->name('accueilclientitems.index');
        Route::post('/accueilclientitems', [
            AccueilclientitemController::class,
            'store',
        ])->name('accueilclientitems.store');
        Route::get('/accueilclientitems/{accueilclientitem}', [
            AccueilclientitemController::class,
            'show',
        ])->name('accueilclientitems.show');
        Route::put('/accueilclientitems/{accueilclientitem}', [
            AccueilclientitemController::class,
            'update',
        ])->name('accueilclientitems.update');
        Route::delete('/accueilclientitems/{accueilclientitem}', [
            AccueilclientitemController::class,
            'destroy',
        ])->name('accueilclientitems.destroy');

        Route::get('/accueilformations', [
            AccueilformationController::class,
            'index',
        ])->name('accueilformations.index');
        Route::post('/accueilformations', [
            AccueilformationController::class,
            'store',
        ])->name('accueilformations.store');
        Route::get('/accueilformations/{accueilformation}', [
            AccueilformationController::class,
            'show',
        ])->name('accueilformations.show');
        Route::put('/accueilformations/{accueilformation}', [
            AccueilformationController::class,
            'update',
        ])->name('accueilformations.update');
        Route::delete('/accueilformations/{accueilformation}', [
            AccueilformationController::class,
            'destroy',
        ])->name('accueilformations.destroy');

        // Accueilformation Formations
        Route::get('/accueilformations/{accueilformation}/formations', [
            AccueilformationFormationsController::class,
            'index',
        ])->name('accueilformations.formations.index');
        Route::post('/accueilformations/{accueilformation}/formations', [
            AccueilformationFormationsController::class,
            'store',
        ])->name('accueilformations.formations.store');

        Route::get('/accueilmanagers', [
            AccueilmanagerController::class,
            'index',
        ])->name('accueilmanagers.index');
        Route::post('/accueilmanagers', [
            AccueilmanagerController::class,
            'store',
        ])->name('accueilmanagers.store');
        Route::get('/accueilmanagers/{accueilmanager}', [
            AccueilmanagerController::class,
            'show',
        ])->name('accueilmanagers.show');
        Route::put('/accueilmanagers/{accueilmanager}', [
            AccueilmanagerController::class,
            'update',
        ])->name('accueilmanagers.update');
        Route::delete('/accueilmanagers/{accueilmanager}', [
            AccueilmanagerController::class,
            'destroy',
        ])->name('accueilmanagers.destroy');

        // Accueilmanager Accueilmanageritems
        Route::get('/accueilmanagers/{accueilmanager}/accueilmanageritems', [
            AccueilmanagerAccueilmanageritemsController::class,
            'index',
        ])->name('accueilmanagers.accueilmanageritems.index');
        Route::post('/accueilmanagers/{accueilmanager}/accueilmanageritems', [
            AccueilmanagerAccueilmanageritemsController::class,
            'store',
        ])->name('accueilmanagers.accueilmanageritems.store');

        Route::get('/accueilmanageritems', [
            AccueilmanageritemController::class,
            'index',
        ])->name('accueilmanageritems.index');
        Route::post('/accueilmanageritems', [
            AccueilmanageritemController::class,
            'store',
        ])->name('accueilmanageritems.store');
        Route::get('/accueilmanageritems/{accueilmanageritem}', [
            AccueilmanageritemController::class,
            'show',
        ])->name('accueilmanageritems.show');
        Route::put('/accueilmanageritems/{accueilmanageritem}', [
            AccueilmanageritemController::class,
            'update',
        ])->name('accueilmanageritems.update');
        Route::delete('/accueilmanageritems/{accueilmanageritem}', [
            AccueilmanageritemController::class,
            'destroy',
        ])->name('accueilmanageritems.destroy');

        Route::get('/accueilservices', [
            AccueilserviceController::class,
            'index',
        ])->name('accueilservices.index');
        Route::post('/accueilservices', [
            AccueilserviceController::class,
            'store',
        ])->name('accueilservices.store');
        Route::get('/accueilservices/{accueilservice}', [
            AccueilserviceController::class,
            'show',
        ])->name('accueilservices.show');
        Route::put('/accueilservices/{accueilservice}', [
            AccueilserviceController::class,
            'update',
        ])->name('accueilservices.update');
        Route::delete('/accueilservices/{accueilservice}', [
            AccueilserviceController::class,
            'destroy',
        ])->name('accueilservices.destroy');

        // Accueilservice Accueilserviceitems
        Route::get('/accueilservices/{accueilservice}/accueilserviceitems', [
            AccueilserviceAccueilserviceitemsController::class,
            'index',
        ])->name('accueilservices.accueilserviceitems.index');
        Route::post('/accueilservices/{accueilservice}/accueilserviceitems', [
            AccueilserviceAccueilserviceitemsController::class,
            'store',
        ])->name('accueilservices.accueilserviceitems.store');

        Route::get('/accueilserviceitems', [
            AccueilserviceitemController::class,
            'index',
        ])->name('accueilserviceitems.index');
        Route::post('/accueilserviceitems', [
            AccueilserviceitemController::class,
            'store',
        ])->name('accueilserviceitems.store');
        Route::get('/accueilserviceitems/{accueilserviceitem}', [
            AccueilserviceitemController::class,
            'show',
        ])->name('accueilserviceitems.show');
        Route::put('/accueilserviceitems/{accueilserviceitem}', [
            AccueilserviceitemController::class,
            'update',
        ])->name('accueilserviceitems.update');
        Route::delete('/accueilserviceitems/{accueilserviceitem}', [
            AccueilserviceitemController::class,
            'destroy',
        ])->name('accueilserviceitems.destroy');

        Route::get('/accueiltemoins', [
            AccueiltemoinController::class,
            'index',
        ])->name('accueiltemoins.index');
        Route::post('/accueiltemoins', [
            AccueiltemoinController::class,
            'store',
        ])->name('accueiltemoins.store');
        Route::get('/accueiltemoins/{accueiltemoin}', [
            AccueiltemoinController::class,
            'show',
        ])->name('accueiltemoins.show');
        Route::put('/accueiltemoins/{accueiltemoin}', [
            AccueiltemoinController::class,
            'update',
        ])->name('accueiltemoins.update');
        Route::delete('/accueiltemoins/{accueiltemoin}', [
            AccueiltemoinController::class,
            'destroy',
        ])->name('accueiltemoins.destroy');

        // Accueiltemoin Equipes
        Route::get('/accueiltemoins/{accueiltemoin}/equipes', [
            AccueiltemoinEquipesController::class,
            'index',
        ])->name('accueiltemoins.equipes.index');
        Route::post('/accueiltemoins/{accueiltemoin}/equipes', [
            AccueiltemoinEquipesController::class,
            'store',
        ])->name('accueiltemoins.equipes.store');

        Route::get('/accueilvideos', [
            AccueilvideoController::class,
            'index',
        ])->name('accueilvideos.index');
        Route::post('/accueilvideos', [
            AccueilvideoController::class,
            'store',
        ])->name('accueilvideos.store');
        Route::get('/accueilvideos/{accueilvideo}', [
            AccueilvideoController::class,
            'show',
        ])->name('accueilvideos.show');
        Route::put('/accueilvideos/{accueilvideo}', [
            AccueilvideoController::class,
            'update',
        ])->name('accueilvideos.update');
        Route::delete('/accueilvideos/{accueilvideo}', [
            AccueilvideoController::class,
            'destroy',
        ])->name('accueilvideos.destroy');

        Route::get('/actualites', [ActualiteController::class, 'index'])->name(
            'actualites.index'
        );
        Route::post('/actualites', [ActualiteController::class, 'store'])->name(
            'actualites.store'
        );
        Route::get('/actualites/{actualite}', [
            ActualiteController::class,
            'show',
        ])->name('actualites.show');
        Route::put('/actualites/{actualite}', [
            ActualiteController::class,
            'update',
        ])->name('actualites.update');
        Route::delete('/actualites/{actualite}', [
            ActualiteController::class,
            'destroy',
        ])->name('actualites.destroy');

        Route::get('/equipes', [EquipeController::class, 'index'])->name(
            'equipes.index'
        );
        Route::post('/equipes', [EquipeController::class, 'store'])->name(
            'equipes.store'
        );
        Route::get('/equipes/{equipe}', [
            EquipeController::class,
            'show',
        ])->name('equipes.show');
        Route::put('/equipes/{equipe}', [
            EquipeController::class,
            'update',
        ])->name('equipes.update');
        Route::delete('/equipes/{equipe}', [
            EquipeController::class,
            'destroy',
        ])->name('equipes.destroy');

        Route::get('/formations', [FormationController::class, 'index'])->name(
            'formations.index'
        );
        Route::post('/formations', [FormationController::class, 'store'])->name(
            'formations.store'
        );
        Route::get('/formations/{formation}', [
            FormationController::class,
            'show',
        ])->name('formations.show');
        Route::put('/formations/{formation}', [
            FormationController::class,
            'update',
        ])->name('formations.update');
        Route::delete('/formations/{formation}', [
            FormationController::class,
            'destroy',
        ])->name('formations.destroy');

        Route::get('/lienfooters', [
            LienfooterController::class,
            'index',
        ])->name('lienfooters.index');
        Route::post('/lienfooters', [
            LienfooterController::class,
            'store',
        ])->name('lienfooters.store');
        Route::get('/lienfooters/{lienfooter}', [
            LienfooterController::class,
            'show',
        ])->name('lienfooters.show');
        Route::put('/lienfooters/{lienfooter}', [
            LienfooterController::class,
            'update',
        ])->name('lienfooters.update');
        Route::delete('/lienfooters/{lienfooter}', [
            LienfooterController::class,
            'destroy',
        ])->name('lienfooters.destroy');

        Route::get('/partners', [PartnerController::class, 'index'])->name(
            'partners.index'
        );
        Route::post('/partners', [PartnerController::class, 'store'])->name(
            'partners.store'
        );
        Route::get('/partners/{partner}', [
            PartnerController::class,
            'show',
        ])->name('partners.show');
        Route::put('/partners/{partner}', [
            PartnerController::class,
            'update',
        ])->name('partners.update');
        Route::delete('/partners/{partner}', [
            PartnerController::class,
            'destroy',
        ])->name('partners.destroy');

        Route::get('/settings', [SettingController::class, 'index'])->name(
            'settings.index'
        );
        Route::post('/settings', [SettingController::class, 'store'])->name(
            'settings.store'
        );
        Route::get('/settings/{setting}', [
            SettingController::class,
            'show',
        ])->name('settings.show');
        Route::put('/settings/{setting}', [
            SettingController::class,
            'update',
        ])->name('settings.update');
        Route::delete('/settings/{setting}', [
            SettingController::class,
            'destroy',
        ])->name('settings.destroy');

        Route::get('/typeformations', [
            TypeformationController::class,
            'index',
        ])->name('typeformations.index');
        Route::post('/typeformations', [
            TypeformationController::class,
            'store',
        ])->name('typeformations.store');
        Route::get('/typeformations/{typeformation}', [
            TypeformationController::class,
            'show',
        ])->name('typeformations.show');
        Route::put('/typeformations/{typeformation}', [
            TypeformationController::class,
            'update',
        ])->name('typeformations.update');
        Route::delete('/typeformations/{typeformation}', [
            TypeformationController::class,
            'destroy',
        ])->name('typeformations.destroy');

        // Typeformation Formations
        Route::get('/typeformations/{typeformation}/formations', [
            TypeformationFormationsController::class,
            'index',
        ])->name('typeformations.formations.index');
        Route::post('/typeformations/{typeformation}/formations', [
            TypeformationFormationsController::class,
            'store',
        ])->name('typeformations.formations.store');

        // Typeformation Actualites
        Route::get('/typeformations/{typeformation}/actualites', [
            TypeformationActualitesController::class,
            'index',
        ])->name('typeformations.actualites.index');
        Route::post('/typeformations/{typeformation}/actualites', [
            TypeformationActualitesController::class,
            'store',
        ])->name('typeformations.actualites.store');
    });

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\LienfooterController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AccueilactuController;
use App\Http\Controllers\AccueilaboutController;
use App\Http\Controllers\AccueilvideoController;
use App\Http\Controllers\AccueilclientController;
use App\Http\Controllers\AccueiltemoinController;
use App\Http\Controllers\TypeformationController;
use App\Http\Controllers\AccueilmanagerController;
use App\Http\Controllers\AccueilserviceController;
use App\Http\Controllers\AccueilformationController;
use App\Http\Controllers\AccueilclientitemController;
use App\Http\Controllers\AccueilmanageritemController;
use App\Http\Controllers\AccueilserviceitemController;
use App\Http\Controllers\FrontendController;

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
        
// Route::get('/{slug}.html', [FrontendController::class, 'buttonpage']);

Route::get('/nos-services.html', [FrontendController::class, 'services']);
Route::get('/services/{slug}', [FrontendController::class, 'services']);

Route::get('/nos-projetsactivits.html', [FrontendController::class, 'projets']);
Route::get('/projets/{slug}', [FrontendController::class, 'projets']);

Route::get('/notre-mission.html', [FrontendController::class, 'missions']);
Route::get('/missions/{slug}', [FrontendController::class, 'missions']);

Route::get('/notre-vision.html', [FrontendController::class, 'visions']);
Route::get('/visions/{slug}', [FrontendController::class, 'visions']);

Route::get('/nos-valeurs.html', [FrontendController::class, 'valeurs']);
Route::get('/valeurs/{slug}', [FrontendController::class, 'valeurs']);

Route::get('/notre-equipe.html', [FrontendController::class, 'equipes']);
Route::get('/equipes/{slug}', [FrontendController::class, 'equipes']);

Route::get('/nos-produits.html', [FrontendController::class, 'produits']);
Route::get('/produits/{slug}', [FrontendController::class, 'produits']);

Route::get('/notre-impact.html', [FrontendController::class, 'impacts']);
Route::get('/impacts/{slug}', [FrontendController::class, 'impacts']);

Route::get('/notre-culture.html', [FrontendController::class, 'cultures']);
Route::get('/cultures/{slug}', [FrontendController::class, 'cultures']);

Route::get('/nos-opportunits.html', [FrontendController::class, 'opportunits']);
Route::get('/opportunites/{slug}', [FrontendController::class, 'opportunits']);

Route::get('/nos-clients.html', [FrontendController::class, 'clients']);
Route::get('/clients/{slug}', [FrontendController::class, 'clients']);

Route::get('/notre-managers.html', [FrontendController::class, 'managers']);
Route::get('/managers/{slug}', [FrontendController::class, 'managers']);

Route::get('/nos-formations.html', [FrontendController::class, 'formations']);
Route::get('/formations/{slug}', [FrontendController::class, 'formations']);

// Route::get('/nous-rejoindre.html', [FrontendController::class, 'rejoindres']);
// Route::get('/rejoindres/{slug}', [FrontendController::class, 'rejoindres']);

Route::get('/actualites.html', [FrontendController::class, 'actualites']);
Route::get('/actualites/{slug}', [FrontendController::class, 'actualites']);

Route::get('/publications.html', [FrontendController::class, 'publications']);
Route::get('/publications/{slug}', [FrontendController::class, 'publications']);

Route::get('/photos.html', [FrontendController::class, 'photos']);
Route::get('/galleries/{slug}', [FrontendController::class, 'photos']);

Route::get('/videos.html', [FrontendController::class, 'videos']);
Route::get('/videos/{slug}', [FrontendController::class, 'videos']);

//PREVIEW ALL PAGES
Route::get('/make/preview/{cid}/{cname}', [FrontendController::class, 'makePreview']);

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::get('users', [UserController::class, 'index'])->name(
            'users.index'
        );
        Route::post('users', [UserController::class, 'store'])->name(
            'users.store'
        );
        Route::get('users/create', [UserController::class, 'create'])->name(
            'users.create'
        );
        Route::get('users/{user}', [UserController::class, 'show'])->name(
            'users.show'
        );
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name(
            'users.edit'
        );
        Route::put('users/{user}', [UserController::class, 'update'])->name(
            'users.update'
        );
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name(
            'users.destroy'
        );

        Route::get('accueilabouts', [
            AccueilaboutController::class,
            'index',
        ])->name('accueilabouts.index');
        Route::post('accueilabouts', [
            AccueilaboutController::class,
            'store',
        ])->name('accueilabouts.store');
        Route::get('accueilabouts/create', [
            AccueilaboutController::class,
            'create',
        ])->name('accueilabouts.create');
        Route::get('accueilabouts/{accueilabout}', [
            AccueilaboutController::class,
            'show',
        ])->name('accueilabouts.show');
        Route::get('accueilabouts/{accueilabout}/edit', [
            AccueilaboutController::class,
            'edit',
        ])->name('accueilabouts.edit');
        Route::put('accueilabouts/{accueilabout}', [
            AccueilaboutController::class,
            'update',
        ])->name('accueilabouts.update');
        Route::delete('accueilabouts/{accueilabout}', [
            AccueilaboutController::class,
            'destroy',
        ])->name('accueilabouts.destroy');

        Route::get('slides', [SlideController::class, 'index'])->name(
            'slides.index'
        );
        Route::post('slides', [SlideController::class, 'store'])->name(
            'slides.store'
        );
        Route::get('slides/create', [SlideController::class, 'create'])->name(
            'slides.create'
        );
        Route::get('slides/{slide}', [SlideController::class, 'show'])->name(
            'slides.show'
        );
        Route::get('slides/{slide}/edit', [
            SlideController::class,
            'edit',
        ])->name('slides.edit');
        Route::put('slides/{slide}', [SlideController::class, 'update'])->name(
            'slides.update'
        );
        Route::delete('slides/{slide}', [
            SlideController::class,
            'destroy',
        ])->name('slides.destroy');

        Route::get('accueilactus', [
            AccueilactuController::class,
            'index',
        ])->name('accueilactus.index');
        Route::post('accueilactus', [
            AccueilactuController::class,
            'store',
        ])->name('accueilactus.store');
        Route::get('accueilactus/create', [
            AccueilactuController::class,
            'create',
        ])->name('accueilactus.create');
        Route::get('accueilactus/{accueilactu}', [
            AccueilactuController::class,
            'show',
        ])->name('accueilactus.show');
        Route::get('accueilactus/{accueilactu}/edit', [
            AccueilactuController::class,
            'edit',
        ])->name('accueilactus.edit');
        Route::put('accueilactus/{accueilactu}', [
            AccueilactuController::class,
            'update',
        ])->name('accueilactus.update');
        Route::delete('accueilactus/{accueilactu}', [
            AccueilactuController::class,
            'destroy',
        ])->name('accueilactus.destroy');

        Route::get('accueilclients', [
            AccueilclientController::class,
            'index',
        ])->name('accueilclients.index');
        Route::post('accueilclients', [
            AccueilclientController::class,
            'store',
        ])->name('accueilclients.store');
        Route::get('accueilclients/create', [
            AccueilclientController::class,
            'create',
        ])->name('accueilclients.create');
        Route::get('accueilclients/{accueilclient}', [
            AccueilclientController::class,
            'show',
        ])->name('accueilclients.show');
        Route::get('accueilclients/{accueilclient}/edit', [
            AccueilclientController::class,
            'edit',
        ])->name('accueilclients.edit');
        Route::put('accueilclients/{accueilclient}', [
            AccueilclientController::class,
            'update',
        ])->name('accueilclients.update');
        Route::delete('accueilclients/{accueilclient}', [
            AccueilclientController::class,
            'destroy',
        ])->name('accueilclients.destroy');

        Route::get('accueilclientitems', [
            AccueilclientitemController::class,
            'index',
        ])->name('accueilclientitems.index');
        Route::post('accueilclientitems', [
            AccueilclientitemController::class,
            'store',
        ])->name('accueilclientitems.store');
        Route::get('accueilclientitems/create', [
            AccueilclientitemController::class,
            'create',
        ])->name('accueilclientitems.create');
        Route::get('accueilclientitems/{accueilclientitem}', [
            AccueilclientitemController::class,
            'show',
        ])->name('accueilclientitems.show');
        Route::get('accueilclientitems/{accueilclientitem}/edit', [
            AccueilclientitemController::class,
            'edit',
        ])->name('accueilclientitems.edit');
        Route::put('accueilclientitems/{accueilclientitem}', [
            AccueilclientitemController::class,
            'update',
        ])->name('accueilclientitems.update');
        Route::delete('accueilclientitems/{accueilclientitem}', [
            AccueilclientitemController::class,
            'destroy',
        ])->name('accueilclientitems.destroy');

        Route::get('accueilformations', [
            AccueilformationController::class,
            'index',
        ])->name('accueilformations.index');
        Route::post('accueilformations', [
            AccueilformationController::class,
            'store',
        ])->name('accueilformations.store');
        Route::get('accueilformations/create', [
            AccueilformationController::class,
            'create',
        ])->name('accueilformations.create');
        Route::get('accueilformations/{accueilformation}', [
            AccueilformationController::class,
            'show',
        ])->name('accueilformations.show');
        Route::get('accueilformations/{accueilformation}/edit', [
            AccueilformationController::class,
            'edit',
        ])->name('accueilformations.edit');
        Route::put('accueilformations/{accueilformation}', [
            AccueilformationController::class,
            'update',
        ])->name('accueilformations.update');
        Route::delete('accueilformations/{accueilformation}', [
            AccueilformationController::class,
            'destroy',
        ])->name('accueilformations.destroy');

        Route::get('accueilmanagers', [
            AccueilmanagerController::class,
            'index',
        ])->name('accueilmanagers.index');
        Route::post('accueilmanagers', [
            AccueilmanagerController::class,
            'store',
        ])->name('accueilmanagers.store');
        Route::get('accueilmanagers/create', [
            AccueilmanagerController::class,
            'create',
        ])->name('accueilmanagers.create');
        Route::get('accueilmanagers/{accueilmanager}', [
            AccueilmanagerController::class,
            'show',
        ])->name('accueilmanagers.show');
        Route::get('accueilmanagers/{accueilmanager}/edit', [
            AccueilmanagerController::class,
            'edit',
        ])->name('accueilmanagers.edit');
        Route::put('accueilmanagers/{accueilmanager}', [
            AccueilmanagerController::class,
            'update',
        ])->name('accueilmanagers.update');
        Route::delete('accueilmanagers/{accueilmanager}', [
            AccueilmanagerController::class,
            'destroy',
        ])->name('accueilmanagers.destroy');

        Route::get('accueilmanageritems', [
            AccueilmanageritemController::class,
            'index',
        ])->name('accueilmanageritems.index');
        Route::post('accueilmanageritems', [
            AccueilmanageritemController::class,
            'store',
        ])->name('accueilmanageritems.store');
        Route::get('accueilmanageritems/create', [
            AccueilmanageritemController::class,
            'create',
        ])->name('accueilmanageritems.create');
        Route::get('accueilmanageritems/{accueilmanageritem}', [
            AccueilmanageritemController::class,
            'show',
        ])->name('accueilmanageritems.show');
        Route::get('accueilmanageritems/{accueilmanageritem}/edit', [
            AccueilmanageritemController::class,
            'edit',
        ])->name('accueilmanageritems.edit');
        Route::put('accueilmanageritems/{accueilmanageritem}', [
            AccueilmanageritemController::class,
            'update',
        ])->name('accueilmanageritems.update');
        Route::delete('accueilmanageritems/{accueilmanageritem}', [
            AccueilmanageritemController::class,
            'destroy',
        ])->name('accueilmanageritems.destroy');

        Route::get('accueilservices', [
            AccueilserviceController::class,
            'index',
        ])->name('accueilservices.index');
        Route::post('accueilservices', [
            AccueilserviceController::class,
            'store',
        ])->name('accueilservices.store');
        Route::get('accueilservices/create', [
            AccueilserviceController::class,
            'create',
        ])->name('accueilservices.create');
        Route::get('accueilservices/{accueilservice}', [
            AccueilserviceController::class,
            'show',
        ])->name('accueilservices.show');
        Route::get('accueilservices/{accueilservice}/edit', [
            AccueilserviceController::class,
            'edit',
        ])->name('accueilservices.edit');
        Route::put('accueilservices/{accueilservice}', [
            AccueilserviceController::class,
            'update',
        ])->name('accueilservices.update');
        Route::delete('accueilservices/{accueilservice}', [
            AccueilserviceController::class,
            'destroy',
        ])->name('accueilservices.destroy');

        Route::get('accueilserviceitems', [
            AccueilserviceitemController::class,
            'index',
        ])->name('accueilserviceitems.index');
        Route::post('accueilserviceitems', [
            AccueilserviceitemController::class,
            'store',
        ])->name('accueilserviceitems.store');
        Route::get('accueilserviceitems/create', [
            AccueilserviceitemController::class,
            'create',
        ])->name('accueilserviceitems.create');
        Route::get('accueilserviceitems/{accueilserviceitem}', [
            AccueilserviceitemController::class,
            'show',
        ])->name('accueilserviceitems.show');
        Route::get('accueilserviceitems/{accueilserviceitem}/edit', [
            AccueilserviceitemController::class,
            'edit',
        ])->name('accueilserviceitems.edit');
        Route::put('accueilserviceitems/{accueilserviceitem}', [
            AccueilserviceitemController::class,
            'update',
        ])->name('accueilserviceitems.update');
        Route::delete('accueilserviceitems/{accueilserviceitem}', [
            AccueilserviceitemController::class,
            'destroy',
        ])->name('accueilserviceitems.destroy');

        Route::get('accueiltemoins', [
            AccueiltemoinController::class,
            'index',
        ])->name('accueiltemoins.index');
        Route::post('accueiltemoins', [
            AccueiltemoinController::class,
            'store',
        ])->name('accueiltemoins.store');
        Route::get('accueiltemoins/create', [
            AccueiltemoinController::class,
            'create',
        ])->name('accueiltemoins.create');
        Route::get('accueiltemoins/{accueiltemoin}', [
            AccueiltemoinController::class,
            'show',
        ])->name('accueiltemoins.show');
        Route::get('accueiltemoins/{accueiltemoin}/edit', [
            AccueiltemoinController::class,
            'edit',
        ])->name('accueiltemoins.edit');
        Route::put('accueiltemoins/{accueiltemoin}', [
            AccueiltemoinController::class,
            'update',
        ])->name('accueiltemoins.update');
        Route::delete('accueiltemoins/{accueiltemoin}', [
            AccueiltemoinController::class,
            'destroy',
        ])->name('accueiltemoins.destroy');

        Route::get('accueilvideos', [
            AccueilvideoController::class,
            'index',
        ])->name('accueilvideos.index');
        Route::post('accueilvideos', [
            AccueilvideoController::class,
            'store',
        ])->name('accueilvideos.store');
        Route::get('accueilvideos/create', [
            AccueilvideoController::class,
            'create',
        ])->name('accueilvideos.create');
        Route::get('accueilvideos/{accueilvideo}', [
            AccueilvideoController::class,
            'show',
        ])->name('accueilvideos.show');
        Route::get('accueilvideos/{accueilvideo}/edit', [
            AccueilvideoController::class,
            'edit',
        ])->name('accueilvideos.edit');
        Route::put('accueilvideos/{accueilvideo}', [
            AccueilvideoController::class,
            'update',
        ])->name('accueilvideos.update');
        Route::delete('accueilvideos/{accueilvideo}', [
            AccueilvideoController::class,
            'destroy',
        ])->name('accueilvideos.destroy');

        Route::get('actualites', [ActualiteController::class, 'index'])->name(
            'actualites.index'
        );
        Route::post('actualites', [ActualiteController::class, 'store'])->name(
            'actualites.store'
        );
        Route::get('actualites/create', [
            ActualiteController::class,
            'create',
        ])->name('actualites.create');
        Route::get('actualites/{actualite}', [
            ActualiteController::class,
            'show',
        ])->name('actualites.show');
        Route::get('actualites/{actualite}/edit', [
            ActualiteController::class,
            'edit',
        ])->name('actualites.edit');
        Route::put('actualites/{actualite}', [
            ActualiteController::class,
            'update',
        ])->name('actualites.update');
        Route::delete('actualites/{actualite}', [
            ActualiteController::class,
            'destroy',
        ])->name('actualites.destroy');

        Route::get('equipes', [EquipeController::class, 'index'])->name(
            'equipes.index'
        );
        Route::post('equipes', [EquipeController::class, 'store'])->name(
            'equipes.store'
        );
        Route::get('equipes/create', [EquipeController::class, 'create'])->name(
            'equipes.create'
        );
        Route::get('equipes/{equipe}', [EquipeController::class, 'show'])->name(
            'equipes.show'
        );
        Route::get('equipes/{equipe}/edit', [
            EquipeController::class,
            'edit',
        ])->name('equipes.edit');
        Route::put('equipes/{equipe}', [
            EquipeController::class,
            'update',
        ])->name('equipes.update');
        Route::delete('equipes/{equipe}', [
            EquipeController::class,
            'destroy',
        ])->name('equipes.destroy');

        Route::get('formations', [FormationController::class, 'index'])->name(
            'formations.index'
        );
        Route::post('formations', [FormationController::class, 'store'])->name(
            'formations.store'
        );
        Route::get('formations/create', [
            FormationController::class,
            'create',
        ])->name('formations.create');
        Route::get('formations/{formation}', [
            FormationController::class,
            'show',
        ])->name('formations.show');
        Route::get('formations/{formation}/edit', [
            FormationController::class,
            'edit',
        ])->name('formations.edit');
        Route::put('formations/{formation}', [
            FormationController::class,
            'update',
        ])->name('formations.update');
        Route::delete('formations/{formation}', [
            FormationController::class,
            'destroy',
        ])->name('formations.destroy');

        Route::get('lienfooters', [LienfooterController::class, 'index'])->name(
            'lienfooters.index'
        );
        Route::post('lienfooters', [
            LienfooterController::class,
            'store',
        ])->name('lienfooters.store');
        Route::get('lienfooters/create', [
            LienfooterController::class,
            'create',
        ])->name('lienfooters.create');
        Route::get('lienfooters/{lienfooter}', [
            LienfooterController::class,
            'show',
        ])->name('lienfooters.show');
        Route::get('lienfooters/{lienfooter}/edit', [
            LienfooterController::class,
            'edit',
        ])->name('lienfooters.edit');
        Route::put('lienfooters/{lienfooter}', [
            LienfooterController::class,
            'update',
        ])->name('lienfooters.update');
        Route::delete('lienfooters/{lienfooter}', [
            LienfooterController::class,
            'destroy',
        ])->name('lienfooters.destroy');

        Route::get('partners', [PartnerController::class, 'index'])->name(
            'partners.index'
        );
        Route::post('partners', [PartnerController::class, 'store'])->name(
            'partners.store'
        );
        Route::get('partners/create', [
            PartnerController::class,
            'create',
        ])->name('partners.create');
        Route::get('partners/{partner}', [
            PartnerController::class,
            'show',
        ])->name('partners.show');
        Route::get('partners/{partner}/edit', [
            PartnerController::class,
            'edit',
        ])->name('partners.edit');
        Route::put('partners/{partner}', [
            PartnerController::class,
            'update',
        ])->name('partners.update');
        Route::delete('partners/{partner}', [
            PartnerController::class,
            'destroy',
        ])->name('partners.destroy');

        Route::get('settings', [SettingController::class, 'index'])->name(
            'settings.index'
        );
        Route::post('settings', [SettingController::class, 'store'])->name(
            'settings.store'
        );
        Route::get('settings/create', [
            SettingController::class,
            'create',
        ])->name('settings.create');
        Route::get('settings/{setting}', [
            SettingController::class,
            'show',
        ])->name('settings.show');
        Route::get('settings/{setting}/edit', [
            SettingController::class,
            'edit',
        ])->name('settings.edit');
        Route::put('settings/{setting}', [
            SettingController::class,
            'update',
        ])->name('settings.update');
        Route::delete('settings/{setting}', [
            SettingController::class,
            'destroy',
        ])->name('settings.destroy');

        Route::get('typeformations', [
            TypeformationController::class,
            'index',
        ])->name('typeformations.index');
        Route::post('typeformations', [
            TypeformationController::class,
            'store',
        ])->name('typeformations.store');
        Route::get('typeformations/create', [
            TypeformationController::class,
            'create',
        ])->name('typeformations.create');
        Route::get('typeformations/{typeformation}', [
            TypeformationController::class,
            'show',
        ])->name('typeformations.show');
        Route::get('typeformations/{typeformation}/edit', [
            TypeformationController::class,
            'edit',
        ])->name('typeformations.edit');
        Route::put('typeformations/{typeformation}', [
            TypeformationController::class,
            'update',
        ])->name('typeformations.update');
        Route::delete('typeformations/{typeformation}', [
            TypeformationController::class,
            'destroy',
        ])->name('typeformations.destroy');
    });

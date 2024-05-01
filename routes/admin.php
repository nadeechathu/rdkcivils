<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Mail\ForgotPasswordMail;
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



Route::get('/web', function () {
    return view('welcome');
});

Auth::routes();



Route::prefix('admin')->middleware(['auth.check'])->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    });

     //service types
    Route::get('/service-types',[\App\Http\Controllers\Admin\ServiceTypesController::class,'index'])->name('service_types');
    Route::post('/service-types',[\App\Http\Controllers\Admin\ServiceTypesController::class,'createServiceType'])->name('service_types.create');
    Route::post('/service-types/update',[\App\Http\Controllers\Admin\ServiceTypesController::class,'updateServiceType'])->name('service_types.update');
    Route::get('/service-types/remove/{id}',[\App\Http\Controllers\Admin\ServiceTypesController::class,'removeServiceType'])->name('service_types.remove');

    /*projects*/
    Route::get('/project',[\App\Http\Controllers\Admin\ProjectController::class,'index'])->name('project.index');
    Route::get('/project/create',[\App\Http\Controllers\Admin\ProjectController::class,'create'])->name('project.create');

    Route::post('/project/store',[\App\Http\Controllers\Admin\ProjectController::class,'store'])->name('project.store');
    Route::get('/project-tasks',[\App\Http\Controllers\Admin\ProjectController::class,'tasksList'])->name('project.tasks');
    Route::post('/project-tasks/create',[\App\Http\Controllers\Admin\ProjectController::class,'addNewTask'])->name('project.tasks.create');
    Route::post('/project-tasks/update',[\App\Http\Controllers\Admin\ProjectController::class,'editTask'])->name('project.tasks.update');
    Route::get('/project-tasks/remove/{id}',[\App\Http\Controllers\Admin\ProjectController::class,'removeTask'])->name('project.tasks.remove');
    Route::put('/project/{id}',[\App\Http\Controllers\Admin\ProjectController::class,'update'])->name('project.update');
    Route::get('/project/{id}',[\App\Http\Controllers\Admin\ProjectController::class,'show'])->name('project.show');
    Route::get('/project/{id}',[\App\Http\Controllers\Admin\ProjectController::class,'destroy'])->name('project.destroy');
    Route::get('/project/{id}/edit',[\App\Http\Controllers\Admin\ProjectController::class,'edit'])->name('project.edit');
    Route::get('/project-delete/{id}',[\App\Http\Controllers\Admin\ProjectController::class,'delete'])->name('project.delete');
    Route::get('/project-progress/{id}',[\App\Http\Controllers\Admin\ProjectController::class,'getProjectProgress'])->name('project.progress.get');

    //project progress
    Route::post('/project-progress/add', [App\Http\Controllers\Admin\ProjectController::class, 'addProjectProgress'])->name('projects.progress.add');
    Route::post('/project-progress/edit', [App\Http\Controllers\Admin\ProjectController::class, 'editProjectProgress'])->name('projects.progress.edit');
    Route::get('/project-progress/remove/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'removeProgress'])->name('projects.progress.remove');

    //document types
    Route::get('/document-types',[\App\Http\Controllers\Admin\DocumentController::class,'getAllDocumentTypes'])->name('documentTypes.all');
    Route::post('/document-types/add', [App\Http\Controllers\Admin\DocumentController::class, 'addDocumentTypes'])->name('documentTypes.create');
    Route::post('/document-types/edit', [App\Http\Controllers\Admin\DocumentController::class, 'editDocumentType'])->name('documentTypes.edit');
    Route::get('/document-types/remove/{id}', [App\Http\Controllers\Admin\DocumentController::class, 'removeDocumentType'])->name('documentTypes.remove');


    // user
    Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.all');
    Route::post('/users/edit', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.edit');
    Route::get('/users/status/{id}', [App\Http\Controllers\Admin\UserController::class, 'changeStatus'])->name('users.status');
    Route::get('/profile', [App\Http\Controllers\Admin\UserController::class, 'userProfileUI'])->name('profile');
    Route::post('/users/changePassword', [App\Http\Controllers\Admin\UserController::class, 'changeUserPassword'])->name('users.changePassword');
    Route::post('/permissions', [App\Http\Controllers\Admin\PermissionController::class, 'updateUserPermissions'])->name('permissions.edit');
    Route::get('/permissions/add-new', [App\Http\Controllers\Admin\PermissionController::class, 'index'])->name('permissions.addNew');
    Route::post('/permissions/create', [App\Http\Controllers\Admin\PermissionController::class, 'createPermissions'])->name('permissions.create');
    Route::get('/permissions/delete/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'deletePermissions'])->name('permissions.delete');
    Route::post('/permissions/update', [App\Http\Controllers\Admin\PermissionController::class, 'updatePermissions'])->name('permissions.update');
    Route::get('/subscribes', [App\Http\Controllers\Admin\UserController::class, 'subscribesUI'])->name('subscribes.all');
    Route::get('/export-subscriptions', [App\Http\Controllers\Admin\UserController::class, 'exportSubscriptions'])->name('subscribes.export');

    // Clients
    Route::get('/clients', [App\Http\Controllers\Admin\UserController::class, 'getAllClients'])->name('clients.all');
    Route::get('/clients/register', [App\Http\Controllers\Admin\UserController::class,'registerClient'])->name('clients.registerUI');
    Route::post('/clients/register', [App\Http\Controllers\Admin\UserController::class,'storeClient'])->name('clients.register');
    Route::post('/clients/edit', [App\Http\Controllers\Admin\UserController::class,'editClient'])->name('clients.edit');
    Route::get('/clients/approve/{id}', [App\Http\Controllers\Admin\UserController::class,'approveClient'])->name('clients.approve');

    //categories
    Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('categories.all');
    Route::post('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('categories.create');

    Route::post('/categories/update', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('categories.edit');
    Route::get('/categories/remove/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'remove'])->name('categories.remove');
    Route::get('/sub-categories', [App\Http\Controllers\Admin\CategoryController::class, 'allSubCategories'])->name('subCategories.all');
    Route::post('/sub-categories/update', [App\Http\Controllers\Admin\CategoryController::class, 'updateSubCategory'])->name('subCategories.edit');
    Route::get('/sub-categories/remove/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'removeSubCategory'])->name('subCategories.remove');


    //posts
    Route::get('/events', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('events.all');
    Route::get('/news', [App\Http\Controllers\Admin\PostController::class, 'newsAll'])->name('news.all');
    Route::post('/posts', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('posts.create');
    Route::get('/posts/new', [App\Http\Controllers\Admin\PostController::class, 'newPostUI'])->name('posts.new');
    Route::get('/posts/update/{id}', [App\Http\Controllers\Admin\PostController::class, 'editPostUI'])->name('posts.edit');
    Route::post('/posts/update', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('posts.update');
    Route::get('/posts/change-status/{id}', [App\Http\Controllers\Admin\PostController::class, 'changeStatus'])->name('posts.status');
    Route::get('/posts/approve/{id}', [App\Http\Controllers\Admin\PostController::class, 'approvePost'])->name('posts.approve');
    Route::get('/posts/delete/{id}', [App\Http\Controllers\Admin\PostController::class, 'deletePost'])->name('posts.delete');
    Route::get('/posts/pending-approval', [App\Http\Controllers\Admin\PostController::class, 'postsToApproveUI'])->name('posts.approval');

    //services
    Route::get('/services', [App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('services.all');
    Route::get('/services/create', [App\Http\Controllers\Admin\ServiceController::class, 'newServiceUI'])->name('services.new');
    Route::post('/services', [App\Http\Controllers\Admin\ServiceController::class, 'store'])->name('services.create');
    Route::put('/services/{id}',[\App\Http\Controllers\Admin\ServiceController::class,'update'])->name('services.update');
    Route::get('/services/{id}/edit',[\App\Http\Controllers\Admin\ServiceController::class,'edit'])->name('services.edit');
    Route::get('/services/{id}',[\App\Http\Controllers\Admin\ServiceController::class,'destroy'])->name('service.destroy');

    //testimonials
    Route::get('/testimonials', [App\Http\Controllers\Admin\TestimonialController::class, 'index'])->name('testimonials.all');
    Route::post('/add-testimonials', [App\Http\Controllers\Admin\TestimonialController::class, 'addReview'])->name('testimonials.add');
    Route::post('/remove-testimonials', [App\Http\Controllers\Admin\TestimonialController::class, 'removeReview'])->name('remove.review');
    Route::put('/edit-testimonials', [App\Http\Controllers\Admin\TestimonialController::class, 'editReview'])->name('testimonials.edit');
    Route::post('/approve-testimonials', [App\Http\Controllers\Admin\TestimonialController::class, 'approveReview'])->name('testimonial.approve');
    Route::post('/status-testimonials', [App\Http\Controllers\Admin\TestimonialController::class, 'changeStatusReview'])->name('testimonial.status');

    //inquiries
    Route::get('/inquiries', [App\Http\Controllers\Admin\InquiryController::class, 'index'])->name('inquiries.all');

    //  all quotations
    Route::get('/quotation/all', [App\Http\Controllers\Admin\QuotationController::class, 'loadAllQuotation'])->name('load.all.quotation');
    Route::get('/quotation/print/{id}', [App\Http\Controllers\Admin\QuotationController::class, 'printQuotation'])->name('quotation.print');

    // Quotation - property design
    Route::get('/property/design-all', [App\Http\Controllers\Admin\QuotationController::class, 'loadAllPropertyDesigns'])->name('property.design.all');
    Route::get('/property/design/new', [App\Http\Controllers\Admin\QuotationController::class, 'createPropertyDesign'])->name('property.design.new');
    Route::post('/property/design/store', [App\Http\Controllers\Admin\QuotationController::class, 'storePropertyDesign'])->name('property.design.store');
    Route::post('/property/design/update', [App\Http\Controllers\Admin\QuotationController::class, 'updatePropertyDesign'])->name('property.design.update');
    Route::get('/property/design/delete/{id}', [App\Http\Controllers\Admin\QuotationController::class, 'deletePropertyDesign'])->name('property.design.delete');

    // property - parts
    Route::get('/property/parts-all', [App\Http\Controllers\Admin\QuotationController::class, 'loadAllPropertyParts'])->name('property.parts.all');
    Route::get('/property/parts/new', [App\Http\Controllers\Admin\QuotationController::class, 'createPropertyParts'])->name('property.parts.new');
    Route::post('/property/parts/store', [App\Http\Controllers\Admin\QuotationController::class, 'storePropertyParts'])->name('property.parts.store');
    Route::post('/property/parts/update', [App\Http\Controllers\Admin\QuotationController::class, 'updatePropertyParts'])->name('property.parts.update');
    Route::get('/property/parts/delete/{id}', [App\Http\Controllers\Admin\QuotationController::class, 'deletePropertyParts'])->name('property.parts.delete');

    // property - parts items
    Route::get('/property/parts-items-all', [App\Http\Controllers\Admin\QuotationController::class, 'loadAllPropertyItemParts'])->name('property.parts.item.all');
    Route::get('/property/parts-items/new', [App\Http\Controllers\Admin\QuotationController::class, 'createPropertyItemParts'])->name('property.parts.item.new');
    Route::post('/property/parts-items/store', [App\Http\Controllers\Admin\QuotationController::class, 'storePropertyItemParts'])->name('property.parts.item.store');
    Route::post('/property/parts-items/update', [App\Http\Controllers\Admin\QuotationController::class, 'updatePropertyItemParts'])->name('property.parts.item.update');
    Route::get('/property/parts-items/delete/{id}', [App\Http\Controllers\Admin\QuotationController::class, 'deletePropertyItemParts'])->name('property.parts.item.delete');

    // property services
    Route::get('/property/service-all', [App\Http\Controllers\Admin\QuotationController::class, 'loadAllPropertyService'])->name('property.service.all');
    Route::get('/property/service/new', [App\Http\Controllers\Admin\QuotationController::class, 'createPropertyService'])->name('property.service.new');
    Route::post('/property/service/store', [App\Http\Controllers\Admin\QuotationController::class, 'storePropertyService'])->name('property.service.store');
    Route::post('/property/service/update', [App\Http\Controllers\Admin\QuotationController::class, 'updatePropertyService'])->name('property.service.update');
    Route::get('/property/service/delete/{id}', [App\Http\Controllers\Admin\QuotationController::class, 'deletePropertyService'])->name('property.service.delete');

    // property services items
    Route::get('/property/service/item-all', [App\Http\Controllers\Admin\QuotationController::class, 'loadAllPropertyServiceItem'])->name('property.service.item.all');
    Route::get('/property/service/item/new', [App\Http\Controllers\Admin\QuotationController::class, 'createPropertyServiceItem'])->name('property.service.item.new');
    Route::post('/property/service/item/store', [App\Http\Controllers\Admin\QuotationController::class, 'storePropertyServiceItem'])->name('property.service.item.store');
    Route::post('/property/service/item/update', [App\Http\Controllers\Admin\QuotationController::class, 'updatePropertyServiceItem'])->name('property.service.item.update');
    Route::get('/property/service/item/delete/{id}', [App\Http\Controllers\Admin\QuotationController::class, 'deletePropertyServiceItem'])->name('property.service.item.delete');

    //settings
    Route::get('/settings/header',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'uploadSliderImagesUI'])->name('settings.header');
    Route::post('/settings/header',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'uploadSliderImages'])->name('settings.headerCreate');
    Route::post('/settings/header-update',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateSliderImages'])->name('settings.headerUpdate');
    Route::get('/settings/slider-delete/{id}',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'removeSliderImages'])->name('settings.sliderDelete');


    Route::get('/settings/analytics',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateAnalyticsUI'])->name('settings.analytics');
    Route::post('/settings/analytics',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateAnalytics'])->name('settings.analyticsUpdate');
    Route::get('/settings/site-settings',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'siteSettingsUI'])->name('settings.siteSettings');
    Route::post('/settings/site-settings',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateSiteSettings'])->name('settings.siteSettingsUpdate');
    Route::post('/settings/site-params',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateSiteParameters'])->name('settings.updateSiteParams');
    Route::get('/settings/site-settings',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'siteSettingsUI'])->name('settings.siteSettings');
    Route::post('/settings/site-settings/get-template',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'getTemplateForTemplateNumber'])->name('settings.getTemplateImg');
    Route::get('/settings/site-settings/active',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'getAllActiveTemplates'])->name('settings.activeTemplates');




    Route::get('/settings/email-settings',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'emailSettings'])->name('settings.emailSettings');
    Route::post('/settings/remove-email',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'removeEmailConfig'])->name('settings.removeEmail');
    Route::post('/settings/add-email',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'addEmailConfig'])->name('settings.addEmailConfig');
    Route::post('/settings/update-email',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateEmailConfig'])->name('settings.updateEmailConfig');
    Route::post('/settings/update-social',[App\Http\Controllers\Admin\GeneralSettingsController::class, 'updateSocialLinks'])->name('settings.updateSocialLinks');


    //logs
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->middleware(['auth']);


    //errors
    Route::get('/not_allowed', function () {
        return view('admin.errors.not_allowed');
    });

    Route::get('/email', function () {
        return new ForgotPasswordMail();
    });
});

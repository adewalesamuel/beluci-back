<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ApiAdminAuthController;
use App\Http\Controllers\Auth\ApiMemberAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ForumCategoryController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\GalleryTypeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;


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

Route::post('register', [ApiMemberAuthController::class, 'register']);
Route::post('login', [ApiMemberAuthController::class, 'login']);

Route::get('site', [SiteController::class, 'show']);

Route::get('categorys',[CategoryController::class, 'index']);

Route::get('categorys/{category}', [CategoryController::class, 'show']);

Route::get('menus',[MenuController::class, 'index']);

Route::get('menus/{menu}', [MenuController::class, 'show']);

Route::get('menu-items',[MenuItemController::class, 'index']);
Route::get('menu-items/{menu_item}', [MenuItemController::class, 'show']);

Route::get('pages',[PageController::class, 'index']);
Route::get('pages/{slug}', [PageController::class, 'slug_show']);

Route::get('events',[EventController::class, 'index']);
Route::get('events/{event}', [EventController::class, 'show']);
Route::get('events/{event}/gallerys', [EventController::class, 'gallery_index']);

Route::get('posts',[PostController::class, 'index']);
Route::get('posts/{post}', [PostController::class, 'show']);

Route::post('contact', [ContactController::class, 'store']);

Route::post('upload/image', [FileController::class, 'image_store']);
Route::post('upload/file', [FileController::class, 'file_store']);

Route::post('members',[ApiMemberAuthController::class, 'register']);

Route::middleware(['auth.api_token:member'])->group(function() {
    Route::post('logout', [ApiMemberAuthController::class, 'logout']);

    Route::get('members',[MemberController::class, 'index']);
    Route::put('profile', [MemberController::class, 'profile_update']);
    Route::get('profile', [MemberController::class, 'profile_show']);

    Route::get('forums',[ForumController::class, 'index']);
    Route::post('forums',[ForumController::class, 'user_store']);
    Route::get('forums/{forum}', [ForumController::class, 'show']);
    Route::put('forums/{forum}', [ForumController::class, 'user_update']);
    Route::delete('forums/{forum}', [ForumController::class, 'user_destroy']);

    Route::get('forum-categorys',[ForumCategoryController::class, 'index']);
    Route::get('forum-categorys/forums',[ForumCategoryController::class, 'forums']);

    Route::get('forums/{forum}/messages',[MessageController::class, 'forum_index']);
    Route::post('messages', [MessageController::class, 'user_store']);
    Route::get('messages/{message}', [MessageController::class, 'show']);
    Route::put('messages/{message}', [MessageController::class, 'user_update']);
    Route::delete('messages/{message}', [MessageController::class, 'user_destroy']);
});

Route::prefix('admin')->group(function() {
    Route::post('login', [ApiAdminAuthController::class, 'login']);

    Route::middleware('auth.api_token:admin')->group(function() {
        Route::post('logout', [ApiAdminAuthController::class, 'logout']);

        Route::post('upload/image', [FileController::class, 'image_store']);
        Route::post('upload/file', [FileController::class, 'file_store']);

        Route::get('permissions',[PermissionController::class, 'index']);
        Route::post('permissions',[PermissionController::class, 'store']);
        Route::get('permissions/{permission}', [PermissionController::class, 'show']);
        Route::put('permissions/{permission}', [PermissionController::class, 'update']);
        Route::delete('permissions/{permission}', [PermissionController::class, 'destroy']);

        Route::get('roles',[RoleController::class, 'index']);
        Route::post('roles',[RoleController::class, 'store']);
        Route::get('roles/{role}', [RoleController::class, 'show']);
        Route::put('roles/{role}', [RoleController::class, 'update']);
        Route::delete('roles/{role}', [RoleController::class, 'destroy']);

        Route::get('sites',[SiteController::class, 'index']);
        Route::post('sites',[SiteController::class, 'store']);
        Route::get('sites/{site}', [SiteController::class, 'show']);
        Route::put('sites/{site}', [SiteController::class, 'update']);
        Route::delete('sites/{site}', [SiteController::class, 'destroy']);

        Route::get('gallerys',[GalleryController::class, 'index']);
        Route::post('gallerys',[GalleryController::class, 'store']);
        Route::get('gallerys/{gallery}', [GalleryController::class, 'show']);
        Route::put('gallerys/{gallery}', [GalleryController::class, 'update']);
        Route::delete('gallerys/{gallery}', [GalleryController::class, 'destroy']);

        Route::get('gallery-types',[GalleryTypeController::class, 'index']);
        Route::post('gallery-types',[GalleryTypeController::class, 'store']);
        Route::get('gallery-types/{gallery_type}', [GalleryTypeController::class, 'show']);
        Route::put('gallery-types/{gallery_type}', [GalleryTypeController::class, 'update']);
        Route::delete('gallery-types/{gallery_type}', [GalleryTypeController::class, 'destroy']);

        Route::get('admins',[AdminController::class, 'index']);
        Route::post('admins',[AdminController::class, 'store']);
        Route::get('admins/{admin}', [AdminController::class, 'show']);
        Route::put('admins/{admin}', [AdminController::class, 'update']);
        Route::delete('admins/{admin}', [AdminController::class, 'destroy']);

        Route::get('categorys',[CategoryController::class, 'index']);
        Route::post('categorys',[CategoryController::class, 'store']);
        Route::get('categorys/{category}', [CategoryController::class, 'show']);
        Route::put('categorys/{category}', [CategoryController::class, 'update']);
        Route::delete('categorys/{category}', [CategoryController::class, 'destroy']);

        Route::get('menus',[MenuController::class, 'index']);
        Route::post('menus',[MenuController::class, 'store']);
        Route::get('menus/{menu}', [MenuController::class, 'show']);
        Route::put('menus/{menu}', [MenuController::class, 'update']);
        Route::delete('menus/{menu}', [MenuController::class, 'destroy']);

        Route::get('menu-items',[MenuItemController::class, 'index']);
        Route::post('menu-items',[MenuItemController::class, 'store']);
        Route::get('menu-items/{menu_item}', [MenuItemController::class, 'show']);
        Route::put('menu-items/{menu_item}', [MenuItemController::class, 'update']);
        Route::delete('menu-items/{menu_item}', [MenuItemController::class, 'destroy']);

        Route::get('pages',[PageController::class, 'index']);
        Route::post('pages',[PageController::class, 'store']);
        Route::get('pages/{page}', [PageController::class, 'show']);
        Route::put('pages/{page}', [PageController::class, 'update']);
        Route::delete('pages/{page}', [PageController::class, 'destroy']);

        Route::get('events',[EventController::class, 'index']);
        Route::post('events',[EventController::class, 'store']);
        Route::get('events/{event}', [EventController::class, 'show']);
        Route::put('events/{event}', [EventController::class, 'update']);
        Route::delete('events/{event}', [EventController::class, 'destroy']);
        Route::get('events/{event}/gallerys', [EventController::class, 'gallery_index']);

        Route::get('members',[MemberController::class, 'index']);
        Route::post('members',[MemberController::class, 'store']);
        Route::get('members/{member}', [MemberController::class, 'show']);
        Route::put('members/{member}', [MemberController::class, 'update']);
        Route::delete('members/{member}', [MemberController::class, 'destroy']);

        Route::post('members/{member}/validate', [MemberController::class, 'validate']);

        Route::get('posts',[PostController::class, 'index']);
        Route::post('posts',[PostController::class, 'store']);
        Route::get('posts/{post}', [PostController::class, 'show']);
        Route::put('posts/{post}', [PostController::class, 'update']);
        Route::delete('posts/{post}', [PostController::class, 'destroy']);

        Route::get('forum-categorys',[ForumCategoryController::class, 'index']);
        Route::post('forum-categorys',[ForumCategoryController::class, 'store']);
        Route::get('forum-categorys/{forum_category}', [ForumCategoryController::class, 'show']);
        Route::put('forum-categorys/{forum_category}', [ForumCategoryController::class, 'update']);
        Route::delete('forum-categorys/{forum_category}', [ForumCategoryController::class, 'destroy']);

        Route::get('forums',[ForumController::class, 'index']);
        Route::post('forums',[ForumController::class, 'store']);
        Route::get('forums/{forum}', [ForumController::class, 'show']);
        Route::put('forums/{forum}', [ForumController::class, 'update']);
        Route::delete('forums/{forum}', [ForumController::class, 'destroy']);

        Route::get('messages',[MessageController::class, 'index']);
        Route::post('messages',[MessageController::class, 'store']);
        Route::get('messages/{message}', [MessageController::class, 'show']);
        Route::put('messages/{message}', [MessageController::class, 'update']);
        Route::delete('messages/{message}', [MessageController::class, 'destroy']);

    });
});

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\NotifController;

Route::get('/', [FrontendController::class, 'index'])->name('base');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/new-topic', function () {
    return view('client.new-topic');
});

Route::get('/category/overview/{id}', [FrontendController::class, 'categoryOverview'])->name('category.overview');

Route::get('/forum/overview/{id}', [FrontendController::class,'forumOverview'])->name('forum.overview');

/**
 * route delete topic by admin
 */
Route::get('/forum/overview/delete/{id}', [FrontendController::class, 'deleteTopic']);

Route::middleware(['auth','admin'])->group(function () {
    Route::get('dashboard/home', [DashboardController::class, 'home']);
    Route::get('dashboard/category/new', [CategoryController::class,'create'])->name('category.new');
    Route::post('dashboard/category/new', [CategoryController::class, 'store'])->name('category.store');
    Route::get('dashboard/categories', [CategoryController::class,'index'])->name('categories');
    Route::get('dashboard/categories/{id}', [CategoryController::class,'show'])->name('category');
    Route::get('dashboard/categories/edit/{id}', [CategoryController::class,'edit'])->name('category.edit');
    Route::post('dashboard/categories/edit/{id}', [CategoryController::class,'update'])->name('category.update');
    Route::get('dashboard/categories/delete/{id}', [CategoryController::class,'destroy'])->name('category.destroy');
    // Forums
    Route::get('dashboard/forum/new', [ForumController::class,'create'])->name('forum.new');
    Route::post('dashboard/forum/new', [ForumController::class,'store'])->name('forum.store');
    Route::get('dashboard/forums', [ForumController::class,'index'])->name('forums');

    Route::get('dashboard/forums/{id}', [ForumController::class,'edit'])->name('forum');
    Route::get('dashboard/forums/edit/{id}', [ForumController::class,'edit'])->name('forum.edit');
    Route::post('dashboard/forums/update/{id}', [ForumController::class,'update'])->name('forum.update');
    Route::get('dashboard/forums/delete/{id}', [ForumController::class,'destroy'])->name('forum.destroy');
    Route::get('/dashboard/users', [DashboardController::class,'users']);
    Route::get('/dashboard/admin/profile', [DashboardController::class,'profile'])->name('admin.profile');
    ;
    Route::get('/dashboard/users/{id}', [DashboardController::class,'show']);
    Route::get('/dashboard/users/{id}', [DashboardController::class,'destroy'])->name('user.destroy');

    Route::get('/dashboard/notifications', [DashboardController::class,'notifications'])->name('notifications');
    Route::get('/dashboard/notifications/mark-as-read/{id}', [DashboardController::class,'markAsRead'])->name('notification.read');
    Route::get('/dashboard/notifications/delete/{id}', [DashboardController::class,'notificationDestroy'])->name('notification.delete');
    Route::get('/dashboard/settings/form', [DashboardController::class,'settingsForm'])->name('settings.form');
    Route::post('/dashboard/settings/new', [DashboardController::class,'newSetting'])->name('settings.new');

    Route::get('/dashboard/request', [DashboardController::class, 'request'])->name('request');
    Route::get('/dashboard/request/category/accept/{id}', [DashboardController::class, 'accept_category'])->name('accept_category');
    Route::get('/dashboard/request/category/reject/{id}', [DashboardController::class, 'reject_category'])->name('reject_category');
    Route::get('/dashboard/request/forum/accept/{id}', [DashboardController::class, 'accept_forum'])->name('accept_forum');
    Route::get('/dashboard/request/forum/reject/{id}', [DashboardController::class, 'reject_forum'])->name('reject_forum');
});


// Topics
Route::get('client/topic/new/{id}', [DiscussionController::class,'create'])->name('topic.new');
Route::post('client/topic/new/{id}', [DiscussionController::class,'store'])->name('topic.store');
Route::get('client/topic/{id}', [DiscussionController::class,'show'])->name('topic');
Route::post('client/topic/{id}', [DiscussionController::class,'reply'])->name('topic.reply');
Route::get('client/topic/remove/{id}', [DiscussionController::class,'remove'])->name('topic.delete');
Route::get('/topic/reply/delete/{id}', [DiscussionController::class,'destroy'])->name('reply.delete');

Route::get('/updates', [DiscussionController::class,'updates']);
Route::post('user/update/{id}', [UserController::class,'update'])->name("user.update");

// users
Route::get('/client/user/{id}', [FrontendController::class,'profile'])->middleware('auth')->name('client.user.profile');
Route::get('/client/users', [FrontendController::class,'users'])->middleware('auth')->name('client.users');
Route::post('user/photo/update/{id}', [FrontendController::class,'photoUpdate'])->name('user.photo.update');

Route::post('topics/sort', [DiscussionController::class,'sort'])->name('topics.sort');

Route::get('reply/like/{id}', [DiscussionController::class,'like'])->name('reply.like');
Route::get('reply/dislike/{id}', [DiscussionController::class,'dislike'])->name('reply.dislike');
Route::post('category/search', [CategoryController::class,'search'])->name('category.search');

Route::get('blog/home', [BlogController::class,'home'])->name('blog.home');

/**
 * route untuk request category
 */
Route::get('request/category', [RequestController::class, 'show_category_view']);
Route::post('request/category/store', [RequestController::class, 'store_request_category'])->name('request.category.store');

/**
 * route untuk request forum
 */
Route::get('request/forum', [RequestController::class, 'show_forum_view']);
Route::post('request/forum/store', [RequestController::class, 'store_request_forum'])->name('request.forum.store');

/**
 * route untuk fitur survey
 */
Route::get('survey', [SurveyController::class, 'showAllSurvey']);
Route::get('survey/showForm', [SurveyController::class, 'showForm']);
Route::post('survey/storeSurvey', [SurveyController::class, 'storeSurvey'])->name('store.survey');
Route::get('survey/{id}', [SurveyController::class, 'showSurvey']);
Route::get('survey/self/{id}', [SurveyController::class, 'showSelfSurvey']);
Route::get('survey/self/edit/{id}', [SurveyController::class, 'editSurveyForm']);
Route::post('survey/self/storeEdit/{id}', [SurveyController::class, 'storeEditSurvey'])->name('store.edit');
Route::get('survey/self/delete/{id}', [SurveyController::class, 'deleteSurvey']);
Route::get("survey/delete/{id}", [SurveyController::class, 'deleteSurveyByAdmin']);

/**
 * route untuk fitur profil & operasi self discussions
 */
Route::get('/home/edit/{id}', [HomeController::class, 'showEditForm']);
Route::post('/home/storeEdit/{id}', [HomeController::class, 'storeEdit'])->name('store.edit.discussion');
Route::get('/home/delete/{id}', [HomeController::class, 'deleteDiscussion']);

/**
 * search
 */
Route::post('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search', function() {
    echo "NOT FOUND";
});

// Routes Notification User
Route::get('/notifications', [NotifController::class, 'index']);
Route::get('/notifications/read/{id}', [NotifController::class, 'read'])->name('notif-read');
Route::get('/notifications/delete/{id}', [NotifController::class, 'delete'])->name('notif-delete');

//Route::get('/home/notifications', [HomeController::class,'notifications'])->name('notification');
//Route::get('/home/notifications/mark-as-read/{id}', [HomeController::class,'markAsRead'])->name('notifications.read');
//Route::get('/home/notifications/delete/{id}', [HomeController::class,'notificationDestroy'])->name('notifications.delete');







<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MyskillController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\MyprojectController;
use App\Http\Controllers\ExperienceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//prfile
Route::post('/user-registration',[UserController::class,'UserRegistration']);
Route::post('/user-login',[UserController::class,'UserLogin']);
Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware('auth:sanctum');
Route::get('/logout',[UserController::class,'UserLogout'])->middleware('auth:sanctum');
Route::post('/user-update',[UserController::class,'UpdateProfile'])->middleware('auth:sanctum');
Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware('auth:sanctum');



//education
Route::post("/create-education",[EducationController::class,'EducationCreate'])->middleware('auth:sanctum');
Route::get("/education-list",[EducationController::class,'EducationList'])->middleware('auth:sanctum');
Route::post("/education-delete",[EducationController::class,'EducationDelete'])->middleware('auth:sanctum');
Route::post("/education-update",[EducationController::class,'EducationUpdate'])->middleware('auth:sanctum');


//blog
Route::post("/create-blog",[BlogController::class,'BlogCreate'])->middleware('auth:sanctum');
Route::get("/blog-list",[BlogController::class,'BlogList'])->middleware('auth:sanctum');
Route::post("/blog-delete",[BlogController::class,'BlogDelete'])->middleware('auth:sanctum');
Route::post("/blog-update",[BlogController::class,'BlogUpdate'])->middleware('auth:sanctum');




//project
Route::post("/create-project",[MyprojectController::class,'ProjectCreate'])->middleware('auth:sanctum');
Route::get("/project-list",[MyprojectController::class,'ProjectList'])->middleware('auth:sanctum');
Route::post("/project-delete",[MyprojectController::class,'ProjectDelete'])->middleware('auth:sanctum');
Route::post("/project-update",[MyprojectController::class,'ProjectUpdate'])->middleware('auth:sanctum');




//skill
Route::post("/create-skill",[MyskillController::class,'SkillCreate'])->middleware('auth:sanctum');
Route::get("/skill-list",[MyskillController::class,'SkillList'])->middleware('auth:sanctum');
Route::post("/skill-delete",[MyskillController::class,'SkillDelete'])->middleware('auth:sanctum');
Route::post("/skill-update",[MyskillController::class,'SkillUpdate'])->middleware('auth:sanctum');





//contact
Route::post("/create-contact",[ContactController::class,'ContactCreate'])->middleware('auth:sanctum');
Route::get("/contact-list",[ContactController::class,'ContactList'])->middleware('auth:sanctum');
Route::post("/contact-delete",[ContactController::class,'ContactDelete'])->middleware('auth:sanctum');
Route::post("/contact-update",[ContactController::class,'ContactUpdate'])->middleware('auth:sanctum');



//social
Route::post("/create-social",[SocialController::class,'SocialCreate'])->middleware('auth:sanctum');
Route::get("/social-list",[SocialController::class,'SocialList'])->middleware('auth:sanctum');
Route::post("/social-delete",[SocialController::class,'SocialDelete'])->middleware('auth:sanctum');
Route::post("/social-update",[SocialController::class,'SocialUpdate'])->middleware('auth:sanctum');





//experience
Route::post("/create-experience",[ExperienceController::class,'ExperienceCreate'])->middleware('auth:sanctum');
Route::get("/experience-list",[ExperienceController::class,'ExperienceList'])->middleware('auth:sanctum');
Route::post("/experience-delete",[ExperienceController::class,'ExperienceDelete'])->middleware('auth:sanctum');
Route::post("/experience-update",[ExperienceController::class,'ExperienceUpdate'])->middleware('auth:sanctum');


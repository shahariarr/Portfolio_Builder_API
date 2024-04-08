# Portfolio Builder

## Description

This project is a web application built using the Laravel framework. It provides a platform for users to manage their profiles, blogs, and projects. 

Key features include:

1. **User Profile Management**: Users can update their profiles with personal information, including their name, email, mobile number, age, nationality, freelance status, address, languages, about section, and profile image. The old profile image is deleted from the server when a new one is uploaded.

2. **Blog Management**: Users can update their blog posts, including the title, description, and image. The old blog image is deleted from the server when a new one is uploaded.

3. **Project Management**: Users can update their projects, including the project name, description, link, and image. The old project image is deleted from the server when a new one is uploaded.

The application includes validation to ensure that all inputs meet the required criteria. It also handles exceptions and returns appropriate error messages.

## Requirements

List the requirements needed to run your project. For example:

- PHP >= 7.3
- MySQL >= 5.7
- Composer
- Laravel >= 8.0

## Installation & Setup

Describe the steps to set up your project. For example:

1. Clone the repository: `git clone https://github.com/username/project.git`
2. Navigate to the project directory: `cd project`
3. Copy `.env.example` to `.env` and modify the environment variables as needed
4. Install dependencies: `composer install`
5. Generate application key: `php artisan key:generate`
6. Run migrations: `php artisan migrate`
7. Start the server: `php artisan serve`

## Usage

my Laravel project defines functionalities for a personal portfolio website. Here's a breakdown of how users would interact with it:
User Roles:

    Visitors: Unregistered users can likely view public profile information and potentially blog posts (if made public).
    Registered Users: Users can create an account to manage their profile details, education history, blog posts, projects, skills, contacts, social links, and work experience.

User Workflow:

    Registration and Login: Users can register a new account or log in using existing credentials.
    Profile Management (protected): Logged-in users can access and update their profile information.
    Data Management (protected): Users can create, view lists, delete, and update various sections of their portfolio:
        Education
        Blog (potentially including creating posts)
        Projects
        Skills
        Contacts
        Social Links
        Work Experience

Technology Analysis:

    Backend: Laravel (PHP framework) is used for server-side logic and handling database interactions.
    Authentication: Laravel Sanctum is likely used for user authentication, allowing access control to specific functionalities.
    Database: A database (not specified) stores user information, portfolio details, and potentially blog post content.
    

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













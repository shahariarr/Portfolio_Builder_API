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










# Fitness App Backend

The backend of the Fitness App is built using PHP and the Laravel framework. It serves as the REST API that communicates with the frontend, handling real-time login, displaying user data, and processing requests from the frontend.

## Key Features

- **Real-Time Login:** Implements real-time login using Laravel's authentication system, enabling users to log in and get immediate responses.
- **REST API:** Provides a set of RESTful endpoints to handle user authentication, data retrieval, and submission.
- **Data Handling:** Manages requests from the frontend and returns data in JSON format for easy consumption on the mobile app.
- **User Information Display:** Returns user-specific data such as health metrics, exercise history, and other relevant information.

## Tech Stack

- **Backend:** PHP, Laravel Framework
- **Authentication:** Laravel Passport (for API authentication)
- **Database:** MySQL (or your preferred database)
- **API Communication:** RESTful API (JSON format)

## Setup

### Prerequisites

1. PHP >= 10
2. Composer (for PHP dependency management)
3. MySQL (or your preferred database)
4. Laravel Framework

### Installation

1. Clone the project from GitHub:

   ```bash
   git clone https://github.com/hoangtung01022003/Fitness_App_BE.git
   cd Fitness_App_BE
   
2. Install dependencies using Composer:

    ```bash
    composer install
3. Set up environment variables:
Copy .env.example to .env:

    ```bash
    cp .env.example .env
Update the .env file with your database and app configuration.

4. Generate the application key:

    ```bash
    php artisan key:generate
5. Run migrations to set up the database:

    ```bash
    php artisan migrate
6. Set up Passport for API authentication:

    ```bash
    php artisan passport:install
7. Start the Laravel development server:

    ```bash
    php artisan serve
The backend should now be running at http://127.0.0.1:8000.
## Real-Time Login Implementation
The backend uses Laravel's built-in authentication system to provide real-time login functionality.

1. Login Endpoint:

Endpoint: POST /api/login

Request body:

    ```json
    {
      "email": "user@example.com",
      "password": "yourpassword"
    }
Response:

    ```json
    {
      "token": "Bearer your_generated_token"
    }
The API will authenticate the user and return a JWT (JSON Web Token) for subsequent requests.

# API Endpoints

## Login
- **POST** `/api/login`: User login with email and password.
  - **Request Body**:
    ```json
    {
      "email": "user@example.com",
      "password": "yourpassword"
    }
    ```
  - **Response**:
    ```json
    {
      "token": "Bearer your_generated_token"
    }
    ```

## User Info
- **GET** `/api/user`: Fetch user details (requires authentication).
  - **Headers**:
    ```json
    {
      "Authorization": "Bearer your_token"
    }
    ```
  - **Response**:
    ```json
    {
      "user": {
        "id": 1,
        "name": "John Doe",
        "email": "user@example.com"
      }
    }
    ```

## Submit Exercise Data
- **POST** `/api/exercise`: Submit user exercise data (requires authentication).
  - **Request Body**:
    ```json
    {
      "exercise_type": "Running",
      "duration": 30,
      "calories_burned": 300
    }
    ```
  - **Response**:
    ```json
    {
      "message": "Exercise data submitted successfully."
    }
    ```

## Update User Profile
- **PUT** `/api/user/update`: Update user profile information (requires authentication).
  - **Request Body**:
    ```json
    {
      "name": "John Doe",
      "email": "new-email@example.com"
    }
    ```
  - **Response**:
    ```json
    {
      "message": "User profile updated successfully."
    }
    ```
## Handling Requests and Returning Data
    The backend handles requests made from the frontend (e.g., login, user data, exercise logs) and returns responses in JSON format.
    The Laravel controllers process the data and communicate with the database to fetch or store the required information.
## Folder Structure
    ```bash
    /app
      /Http
        /Controllers    # Controllers for API endpoints (AuthController, UserController, etc.)
    /database
      /migrations      # Database migrations for user and exercise tables
    /routes
      api.php          # API routes for login, user info, etc.
## Contributing
1. Fork the repository.
2. Create a new branch (git checkout -b feature-name).
3. Commit your changes (git commit -am 'Add new feature').
4. Push your branch (git push origin feature-name).
5. Open a Pull Request.
## License
MIT

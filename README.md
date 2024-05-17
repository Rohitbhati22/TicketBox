# TicketBox

TicketBox is a movie ticket booking website built with Laravel. It allows users to browse movies, select showtimes, and book tickets online. This project aims to provide a seamless and efficient ticket booking experience.

## Features

- User Registration and Login
- Browse Movies and Showtimes
- Search for Movies
- Book Tickets
- View Booking History
- Admin Panel for Managing Movies and Showtimes

## Technologies Used

- **Framework**: Laravel
- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Database**: MySQL
- **Authentication**: Laravel Breeze

## Requirements

- PHP >= 8.0
- Composer
- MySQL
- Node.js & npm

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/rahuljoshi6261/TicketBox.git
    cd TicketBox
    ```

2. Install the dependencies:

    ```bash
    composer install
    npm install
    npm run dev
    ```

3. Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

4. Generate the application key:

    ```bash
    php artisan key:generate
    ```

5. Configure your database settings in the `.env` file:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

6. Run the database migrations:

    ```bash
    php artisan migrate
    ```

7. Seed the database with initial data (optional):

    ```bash
    php artisan db:seed
    ```

8. Start the development server:

    ```bash
    php artisan serve
    ```

9. Visit `http://localhost:8000` in your browser to access TicketBox.

## Usage

1. **User Registration and Login**:
   - Users can register and log in to their accounts.

2. **Browse Movies and Showtimes**:
   - Users can browse the available movies and their showtimes.

3. **Search for Movies**:
   - Users can search for movies by title.

4. **Book Tickets**:
   - Users can select a movie, choose a showtime, and book tickets.

5. **View Booking History**:
   - Users can view their booking history and details.

6. **Admin Panel**:
   - Admin users can manage movies, showtimes, and view booking statistics.

## Contributing

Contributions are welcome! Please fork the repository and create a pull request with your changes. Ensure your code follows the project's coding standards and includes appropriate tests.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Acknowledgements

- Laravel Framework
- Bootstrap for frontend styling
- All contributors and community members

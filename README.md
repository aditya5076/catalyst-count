# Web Application: Data Upload and Filtering

## Overview

This web application is built using Laravel, MySQL, and Bootstrap. It allows users to perform the following tasks:

1. **User Authentication**: Users can create accounts, log in, and log out.

2. **Large Data CSV Upload**: Users can upload large CSV files (up to 1GB) with a visual progress bar to track the upload progress.

3. **Database Update**: Once the CSV file is uploaded, the application automatically updates the MySQL database with the contents of the file.

4. **Data Filtering**: Users can filter the data using a form.

5. **Record Count Display**: The application displays the count of records based on the applied filters.

## Installation

Follow these steps to set up and run the application:

1. **Clone the Repository**: Clone this repository to your local development environment:

    ```bash
    git clone <repository-url>
    cd <repository-folder>
    ```

2. **Install Dependencies**: Install the PHP and JavaScript dependencies using Composer and npm:

    ```bash
    composer install
    npm install
    ```

3. **Configure Environment Variables**: Create a `.env` file by copying the `.env.example` file and configure your environment variables, including the database connection settings.

    ```bash
    cp .env.example .env
    ```

4. **Generate an Application Key**: Generate an application key to secure your application:

    ```bash
    php artisan key:generate
    ```

5. **Run Database Migrations**: Create the database tables using migrations:

    ```bash
    php artisan migrate
    ```

6. **MaatWebsite Library to handle csv data**: Install MaatWebsite Library to upload the csv into the database:

    ```bash
    composer require maatwebsite/excel
    ```

7. **Start the Application**: Start the development server:

    ```bash
    php artisan serve
    ```

8. **Start the Queue Worker**: To process jobs in the queue, you need to start a queue worker:

    ```bash
    php artisan queue:work
    ```

    This command will start a queue worker that processes jobs from the queue. Make sure to configure your queue worker to suit your production environment, such as using Supervisor to keep the worker running in the background.

    With these steps, you can upload a large CSV file using Laravel and process it in the background using queues, which is essential for handling large files without affecting your web server's performance.

9. **Access the Application**: Open your web browser and access the application at `http://localhost:8000`. You can register an account, log in, and start using the application.

## Usage

### Uploading Data

1. Log in to the application or create a new account if you don't have one.

2. Navigate to the data upload page.

3. Choose a CSV file (up to 1GB) and click the "Upload" button.

4. A visual progress bar will indicate the upload progress.

### Filtering Data

1. Once the file is uploaded, you can navigate to the data filtering page.

2. Use the filtering form to specify your criteria.

3. Click the "Apply" button to filter the data.

4. The application will display the count of records based on the applied filters.

## Contributing

If you'd like to contribute to this project, please follow these guidelines:

-   Fork the repository.
-   Create a new branch for your feature or bug fix.
-   Make your changes and test them thoroughly.
-   Commit your changes with clear and concise messages.
-   Push your changes to your fork.
-   Create a pull request to merge your changes into the main repository.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Acknowledgments

-   The Laravel community for providing an excellent PHP framework.
-   Bootstrap for the front-end styling.
-   MySQL for the database management.

## Contact

If you have any questions or need further assistance, please contact:

-   Aditya Narvekar
-   Email: adinarvekar8454@gmail.com
-   LinkedIn: [Aditya Narvekar on LinkedIn](https://www.linkedin.com/in/aditya-narvekar-071973149/)

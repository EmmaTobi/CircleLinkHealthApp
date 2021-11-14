
# Patient Medical Record System,

This applications helps to manage patients blood pressure data
## Requirements

To setup this application, it is important we have some basic requirements as listed below:

- Php (version >= 7.4) installed

- Composer installed

- npm package manager 

## Setup


- Navigate to your desired directory via the terminal then clone project i.e `git clone https://github.com/EmmaTobi/CircleLinkHealthApp.git`

- RUN `composer install`

- RUN `npm install && npm run dev

- Rename `.env.example` to `.env' in your app root folder

- Ensure to set database connections correctly in your `.env` file

- RUN `php artisan key:generate`

- RUN `php artisan queue:work` to execute queue jobs

- RUN `php artisan serve`

- Navigate to your browser via `http::localhost:8000`. NB i assume your application is running on port 8000
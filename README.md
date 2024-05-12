# Patient Medical Data Centralization Application

This application centralizes patient medical data, facilitating management of doctor visits, pharmaceutical purchases, analysis results, and more. It is designed to enhance the efficiency and accessibility of medical record-keeping.

## Detailed Project Report

For a comprehensive overview, including screenshots and in-depth descriptions of the application features and architecture, view the [detailed project report](https://onedrive.live.com/view.aspx?resid=4A2F3CAC1BBE22C!118&ithint=file%2Cdocx&authkey=!AABsuQ69m3ZCl38).

## Getting Started

Follow these instructions to set up the application on your local machine for development and testing purposes.

### Prerequisites

- Composer
- Node.js
- PHP
- Laravel
- A supported database (MySQL, PostgreSQL, etc.)
- Mailtrap account (for email testing and verification)

### Installation

1. Clone the repository:
   `git clone https://github.com/Selk-bit/MedicalFoldersPFE.git`
2. Navigate to the project directory:
   `cd patient-medical-data-app`
3. Install PHP dependencies:
   `composer install`
4. Install JavaScript dependencies:
   `npm install`
5. Create and configure your database. Update the `.env` file with your database information.
6. Run database migrations:
   `php artisan migrate`
7. Seed the database:
   `php artisan db:seed`
8. Start the application:
   `php artisan serve`

### Configuring Mailtrap

- Create a Mailtrap account at [Mailtrap](https://mailtrap.io/) to handle email testing.
- Configure your `.env` file with the Mailtrap credentials provided to facilitate email verification for new registrations.

## Usage

Once the application is running, it supports the entry and management of medical data through its user interface, accessible to different user roles with varying levels of access and functionality.

## Contributing

Contributions are welcome to enhance features, improve the design, or address any bugs. Please fork the repository, make changes, and submit pull requests.


For more, visit my LinkedIn profile: [Salim Elkellouti](https://www.linkedin.com/in/salim-elkellouti/).


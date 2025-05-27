# Contributing Guidelines for the Book Rental Project

Thank you for your interest in contributing to the **Book Rental** project! Every contribution, whether it's a bug report, a fix, a new feature, or documentation improvement, is highly appreciated.

This guide will help you understand the contribution process to ensure it's smooth and efficient.

---

## Contributor Code of Conduct

We are committed to making this project an inclusive and welcoming experience for everyone. Please adhere to our [Contributor Code of Conduct](https://www.contributor-covenant.org/version/2/0/code_of_conduct.html) in all project interactions.

---

## How Can You Contribute?

There are several ways you can contribute to this project:

### 1. Report Bugs

If you find a bug, don't hesitate to report it!

* Make sure the bug hasn't been reported before by searching existing [Issues](https://github.com/amrudzr/book-rental/issues).
* Use the "Bug Report" template when creating a new issue.
* Include as much detail as possible, such as:
    * Steps to reproduce the bug.
    * The behavior you expected.
    * The actual behavior you experienced.
    * The PHP, MySQL, or browser version you are using.
    * Screenshots or screen recordings (if relevant).

### 2. Suggest New Features or Enhancements

Have an idea for a new feature or a way to improve this project? We'd love to hear it!

* Make sure your idea hasn't been suggested before in the [Issues](https://github.com/amrudzr/book-rental/issues).
* Use the "Feature Request" template when creating a new issue.
* Describe your idea in detail, including why you think it's important and how it would function.

### 3. Contribute Code

Want to contribute code? Follow the steps below:

#### A. Set Up Your Development Environment

1.  **Fork the Repository:** Create a fork of this repository to your GitHub account.
2.  **Clone the Repository:** Clone your fork to your local machine:
    ```bash
    git clone [https://github.com/YOUR_USERNAME/book-rental.git](https://github.com/YOUR_USERNAME/book-rental.git)
    cd book-rental
    ```
    Replace `YOUR_USERNAME` with your GitHub username.
3.  **Install Dependencies (if any):** Ensure you have PHP and MySQL installed on your system. This project uses native PHP, so there are no additional Composer dependencies, but make sure the PDO extension for MySQL is enabled.
4.  **Database Configuration:**
    * Create a new MySQL database (e.g., `book_rental_db`).
    * Edit the `config/database.php` file to set up your database credentials.
    * Run database migrations to create tables:
        ```bash
        # Adjust this command based on how you run migrations,
        # likely through a PHP CLI script you've created
        php database/migrate.php
        ```
    * Run seeders to populate initial data (optional):
        ```bash
        # Adjust this command based on how you run seeders
        php database/seed.php
        ```
5.  **Run the Application:** Start the PHP built-in development server from the `public` directory:
    ```bash
    php -S localhost:8000 -t public
    ```
    Then access it in your browser: `http://localhost:8000`

#### B. Code Contribution Process

1.  **Create a New Branch:** Always create a new branch for your changes. Use a descriptive branch name, e.g., `fix/bug-name` or `feat/feature-name`.
    ```bash
    git checkout -b your-branch-name
    ```
2.  **Make Your Changes:** Implement the necessary code changes. Ensure you adhere to the **Clean Architecture** pattern implemented in this project. Pay attention to the `core/entities`, `core/usecases`, `core/repositories`, `core/controllers` folder structure.
3.  **Test Your Changes:** Make sure your changes work correctly and don't introduce unintended side effects.
4.  **Commit Your Changes:** Write a clear and concise commit message.
    ```bash
    git add .
    git commit -m "feat: Add book search functionality"
    ```
    Use commit message conventions like `feat:` (feature), `fix:` (bug fix), `docs:` (documentation), `refactor:` (refactor), etc.
5.  **Push to Your Fork:**
    ```bash
    git push origin your-branch-name
    ```
6.  **Create a Pull Request (PR):**
    * Go to your forked repository on GitHub.
    * You'll see a notification to create a pull request from your new branch.
    * Use the available "Pull Request" template.
    * Describe your changes in detail in the PR description.
    * Link your PR to relevant issues (e.g., `Closes #123` if your PR fixes issue number 123).

### 4. Improve Documentation

If you find a typo, need clarification, or want to add details to the documentation (either in `README.md` or the Wiki), you can:

* Directly edit the file on GitHub (for small changes).
* Follow the code contribution process above for larger changes.

---

## After Your Pull Request is Created

* We will review your pull request as soon as possible.
* We may ask for changes or clarifications. Please be patient and cooperative.
* Once approved, your pull request will be merged into the main branch.

---

Thank you for your time and effort in helping to improve the Book Rental project! We truly appreciate your contributions.

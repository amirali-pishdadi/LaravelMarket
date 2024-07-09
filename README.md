# LaravelMarket 🛒

Welcome to **LaravelMarket**, a modern e-commerce platform built with Laravel. This platform offers a range of features including product search, filtering and sorting, and a Filament admin manager.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
  - [Todos](#todos)
- [Contact](#contact)
- [License](#license)

## Features ✨

- 🔍 **Search Functionality**: Easily search for products.
- 📋 **Filament Admin Manager**: Manage your store with an intuitive admin panel.
- 📊 **Product Filtering and Sorting**: Find products based on various criteria.
- 🛒 **Shopping Cart**: Add products to your cart and proceed to checkout.
- 💬 **Comments and Reviews**: Engage with product reviews and comments.
- 🔐 **User Authentication**: Secure user login and registration.

## Installation 🛠️

### Prerequisites

- PHP 8.0 or higher
- Composer

### Steps

1. Clone the repository

   ```bash
   git clone https://github.com/yourusername/laravelmarket.git
   cd laravelmarket
   ```

2. Install dependencies

   ```bash
   composer install
   ```

3. Copy the `.env` file and generate an application key

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure the `.env` file with your database and other settings.

5. Run migrations and seed the database

   ```bash
   php artisan migrate --seed
   ```

6. Start the development server

   ```bash
   php artisan serve
   ```

## Usage 🚀

Once the installation is complete, you can start using LaravelMarket:

- **Homepage**: Browse through the best collections for home decoration.
- **Shop by Category**: Explore products by categories.
- **New Arrivals**: Check out the latest products in the store.
- **Search**: Use the search bar to find products quickly.
- **Admin Panel**: Manage products, categories, orders, and more via the Filament admin manager.

### Search Functionality

1. Navigate to the homepage.
2. Use the search bar to find products by name or description.

### Product Filtering and Sorting

1. Go to the shop page.
2. Use the sidebar to filter products by categories or price.
3. Use the sorting options to sort products by price, popularity, or rating.

## Contributing 🤝

We welcome contributions from the community! To contribute to LaravelMarket, follow these steps:

1. **Fork the repository:**
    Click the "Fork" button at the top of this repository.

2. **Clone your forked repository:**
    ```bash
    git clone https://github.com/yourusername/laravelmarket.git
    cd laravelmarket
    ```

3. **Create a new branch:**
    ```bash
    git checkout -b feature-name
    ```

4. **Make your changes and commit:**
    ```bash
    git add .
    git commit -m "Add some feature"
    ```

5. **Push to the branch:**
    ```bash
    git push origin feature-name
    ```

6. **Create a Pull Request:**
    Open your forked repository on GitHub and click the "New Pull Request" button.

### Todos 📋

Here are some tasks and features that we would love to see added to LaravelMarket. Feel free to pick any of these todos and contribute to the project!

- **User Experience Improvements**
  - [ ] Implement advanced product search.
  - [ ] Add user reviews and ratings.
  - [ ] Enhance the UI/UX design.
  - [ ] Optimize performance for large datasets.

## Contact 📧

For any questions or support, please contact:

- **Amirali Pishdadi**
- **Email**: [amirpishdadi4@gmail.com](mailto:amirpishdadi4@gmail.com)
- **GitHub**: [amirali-pishdadi](https://github.com/amirali-pishdadi)

Thank you for using LaravelMarket! We hope you enjoy using it as much as we enjoyed building it. 😊

## License 📜

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

Happy coding! 🎉

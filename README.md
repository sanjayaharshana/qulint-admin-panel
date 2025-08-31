# Qulint Admin Panel

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
[![PHP Version](https://img.shields.io/badge/php-%3E%3D8.1-blue.svg)](composer.json)
[![Laravel Version](https://img.shields.io/badge/laravel-%3E%3D10.0-red.svg)](composer.json)
[![Latest Version](https://img.shields.io/badge/version-3.0.19-blue.svg)](https://packagist.org/packages/sanjayaharshana/qulint-admin-panel)

A modern, feature-rich Laravel admin panel that's completely free and open-source. Built on top of Laravel framework with a beautiful, responsive interface and extensive functionality. **Qulint Admin Panel** is an upgraded fork of [Open Admin](https://github.com/qulint-admin-org/qulint-admin) that supports Laravel 11 and Laravel 12, since the original Open Admin project has stopped development after Laravel 10.

## What's New in v3.0.19

### 🎉 Release: Enhanced Documentation & Asset Troubleshooting
- **✅ Comprehensive Asset Troubleshooting Guide**: Created detailed ASSET_TROUBLESHOOTING.md
- **✅ Improved Installation Instructions**: Clear steps for publishing assets
- **✅ Enhanced User Experience**: Better guidance for common issues
- **✅ Complete Documentation**: Comprehensive troubleshooting and installation guides

### 🔧 Documentation Improvements
- Created comprehensive ASSET_TROUBLESHOOTING.md with step-by-step solutions
- Enhanced README.md with clear asset publishing instructions
- Added troubleshooting section with quick fixes
- Improved installation process documentation

### 📦 Asset Loading Solutions
- Clear instructions for publishing assets to public directory
- Detailed troubleshooting for 404 errors
- Multiple solutions for different scenarios
- Complete asset verification checklist

## Features

### Core Features
- **Modern UI/UX**: Clean, responsive design with Bootstrap 5
- **CRUD Operations**: Complete Create, Read, Update, Delete functionality
- **Form Builder**: Rich form components with validation
- **Data Grid**: Advanced data tables with sorting, filtering, and pagination
- **Authentication**: Built-in user authentication and authorization
- **Role-based Access Control**: Granular permissions system
- **File Management**: Image and file upload handling
- **API Support**: RESTful API endpoints
- **Multi-language**: Internationalization support

### Form Components
- Text, Textarea, Email, Password fields
- Select, Multiple Select, Radio, Checkbox
- Date, DateTime, Time, DateRange pickers
- File upload, Image upload
- Color picker, Slider, Rate
- Map integration, Rich text editor
- Custom field types support

### Grid Features
- Sortable columns
- Advanced filtering
- Bulk actions
- Export functionality (CSV, Excel)
- Row actions
- Custom column renderers
- Responsive design

### Extensions & Widgets
- Dashboard widgets
- Charts and statistics
- Log viewer
- Backup management
- Configuration manager
- Media manager
- API tester
- Scheduling tools

## Requirements

- PHP >= 8.1
- Laravel >= 10.0
- MySQL/PostgreSQL/SQLite
- Composer

## Installation

### 1. Install via Composer

```bash
composer require sanjayaharshana/qulint-admin-panel
```

### 2. Publish Assets

**IMPORTANT**: You must publish the assets to make the admin panel work correctly!

```bash
php artisan vendor:publish --provider="Qulint\Admin\AdminServiceProvider" --force
```

This command will publish all assets (CSS, JS, images) to `public/vendor/qulint-admin/`.

**If you see 404 errors for CSS/JS files, this step is required!**

### 3. Run Installation Command

```bash
php artisan admin:install
```

This command will:
- Run database migrations
- Create admin tables
- Seed initial data
- Create admin directory structure
- Generate default controllers

### 4. Configure Database

Make sure your database configuration is set up in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. Access Admin Panel

Visit `http://your-app.com/admin` and login with:
- **Username**: `admin`
- **Password**: `admin`

## Quick Start

### Creating a Resource

Generate a new admin resource:

```bash
php artisan admin:make UserController --model=App\\User
```

### Basic Controller Example

```php
<?php

namespace App\Admin\Controllers;

use App\User;
use Qulint\Admin\Form;
use Qulint\Admin\Grid;
use Qulint\Admin\Show;

class UserController extends AdminController
{
    protected $title = 'Users';

    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', 'ID')->sortable();
        $grid->column('name', 'Name');
        $grid->column('email', 'Email');
        $grid->column('created_at', 'Created At');

        return $grid;
    }

    protected function form()
    {
        $form = new Form(new User());

        $form->text('name', 'Name')->required();
        $form->email('email', 'Email')->required();
        $form->password('password', 'Password');

        return $form;
    }

    protected function show($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', 'ID');
        $show->field('name', 'Name');
        $show->field('email', 'Email');
        $show->field('created_at', 'Created At');

        return $show;
    }
}
```

### Adding Menu Items

```php
use Qulint\Admin\Facades\Admin;

Admin::menu()->add([
    'title' => 'Users',
    'icon' => 'fa-users',
    'path' => 'users',
]);
```

## Customization

### Custom Theme

You can customize the admin panel appearance by modifying the CSS variables or creating a custom theme.

### Custom Fields

Create custom form fields by extending the base Field class:

```php
use Qulint\Admin\Form\Field;

class CustomField extends Field
{
    protected $view = 'admin.form.custom-field';
    
    public function render()
    {
        return view($this->view, ['field' => $this]);
    }
}
```

### Custom Actions

```php
use Qulint\Admin\Actions\RowAction;

class CustomAction extends RowAction
{
    public $name = 'Custom Action';
    public $icon = 'fa-cog';

    public function handle($model)
    {
        // Your custom logic here
        return $this->response()->success('Action completed!');
    }
}
```

## Configuration

The main configuration file is located at `config/admin.php`. Key configuration options:

### Environment Variables

For cloud storage configurations, use environment variables as described in [ENVIRONMENT.md](ENVIRONMENT.md):

```env
# AWS S3
AWS_ACCESS_KEY_ID=your-aws-access-key
AWS_SECRET_ACCESS_KEY=your-aws-secret-key
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your-s3-bucket

# Alibaba Cloud OSS
ALIYUN_ACCESS_ID=your-aliyun-access-id
ALIYUN_ACCESS_KEY=your-aliyun-access-key
ALIYUN_BUCKET=your-oss-bucket
ALIYUN_ENDPOINT=oss-cn-shanghai.aliyuncs.com

# Qiniu Cloud Storage
QINIU_ACCESS_KEY=your-qiniu-access-key
QINIU_SECRET_KEY=your-qiniu-secret-key
QINIU_BUCKET=your-qiniu-bucket
```

**Security**: Never commit real credentials to your repository. Always use environment variables for sensitive information.

```php
return [
    'name' => 'Qulint Admin',
    'logo' => '<b>Qulint</b> Admin',
    'logo-mini' => '<b>QA</b>',
    
    'route' => [
        'prefix' => 'admin',
        'namespace' => 'App\\Admin\\Controllers',
        'middleware' => ['web', 'admin'],
    ],
    
    'directory' => app_path('Admin'),
    'login_url' => 'admin/auth/login',
    'logout_url' => 'admin/auth/logout',
];
```

## Troubleshooting

### Asset Loading Issues

If you're experiencing 404 errors for CSS/JS files like:
```
GET http://localhost:8000/vendor/qulint-admin/css/styles.css 404 (Not Found)
GET http://localhost:8000/vendor/qulint-admin/js/qulint-admin.js 404 (Not Found)
```

**Solution**: Publish the assets using the command above. The assets must be published to your Laravel application's public directory.

For detailed troubleshooting, see [ASSET_TROUBLESHOOTING.md](ASSET_TROUBLESHOOTING.md).

### Common Issues

1. **Assets not loading**: Run `php artisan vendor:publish --provider="Qulint\Admin\AdminServiceProvider" --force`
2. **Class not found errors**: Clear cache with `php artisan config:clear && php artisan cache:clear`
3. **Database errors**: Check your database configuration in `.env`
4. **Permission errors**: Ensure proper file permissions on `storage/` and `bootstrap/cache/`

### Getting Help

- **Documentation**: [https://qulint.com/docs/](https://qulint.com/docs/)
- **GitHub Issues**: [Create an issue](https://github.com/sanjayaharshana/qulint-admin-panel/issues)
- **Asset Troubleshooting**: [ASSET_TROUBLESHOOTING.md](ASSET_TROUBLESHOOTING.md)

## Contributing

We welcome contributions! Please see our [Contributing Guide](CONTRIBUTING.md) for details.

### Development Setup

1. Fork the repository
2. Clone your fork
3. Install dependencies: `composer install`
4. Run tests: `composer test`
5. Make your changes
6. Submit a pull request

## Testing

Run the test suite:

```bash
composer test
```

Or run specific test files:

```bash
./vendor/bin/phpunit tests/InstallTest.php
```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- Based on [Open Admin](https://github.com/qulint-admin-org/qulint-admin) by the Open Admin team
- Originally forked from [laravel-admin](https://github.com/z-song/laravel-admin) by z-song
- Built with Laravel framework
- Uses Bootstrap 5 for UI components

## Support

- **Email**: info@qulint.com
- **GitHub Issues**: [Create an issue](https://github.com/sanjayaharshana/qulint-admin-panel/issues)
- **Documentation**: [https://qulint.com/docs/](https://qulint.com/docs/)

## Changelog

See [CHANGELOG.md](CHANGELOG.md) for a list of changes and version history.

---

**Made with love by the Qulint Team**
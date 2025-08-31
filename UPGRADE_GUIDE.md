# Laravel 11/12 Upgrade Guide

This guide outlines the changes made to upgrade Qulint Admin Panel to support Laravel 11 and Laravel 12.

## Version Changes

- **Previous Version**: 2.0.0 (Laravel 7-10)
- **New Version**: 3.0.0 (Laravel 10-12)

## Requirements

### Updated Requirements
- **PHP**: >= 8.1 (upgraded from >= 7.3)
- **Laravel**: >= 10.0 (upgraded from >= 7.0)
- **Symfony DOM Crawler**: ^5.0|^6.0|^7.0 (upgraded from ~3.1|~4.0|~5.0)
- **Doctrine DBAL**: ^3.0 (upgraded from 2.*|3.*)

### Updated Dev Dependencies
- **Laravel Laravel**: ^10.0|^11.0|^12.0 (upgraded from >= 8.0)
- **Faker**: fakerphp/faker ^1.20 (replaced fzaninotto/faker)
- **Intervention Image**: ^2.7 (upgraded from ~2.3)
- **Laravel Browser Kit Testing**: ^7.0 (upgraded from ^6.0)

## Breaking Changes

### 1. PHP Version Requirement
- **Minimum PHP version**: 8.1 (was 7.3)
- **Reason**: Laravel 11 requires PHP 8.1+

### 2. Namespace Changes
- **Old**: `OpenAdmin\Admin\*`
- **New**: `Qulint\Admin\*`

### 3. Removed Version Compatibility Checks
The following version compatibility checks have been removed as they're no longer needed:

#### DefaultDatetimeFormat Trait
```php
// OLD (removed)
if (version_compare(app()->version(), '7.0.0') < 0) {
    return parent::serializeDate($date);
}

// NEW
return $date->format(Carbon::DEFAULT_TO_STRING_FORMAT);
```

#### Grid Model Foreign Key
```php
// OLD (removed)
$foreignKeyMethod = version_compare(app()->version(), '5.8.0', '<') ? 'getForeignKey' : 'getForeignKeyName';
$relation->{$foreignKeyMethod}()

// NEW
$relation->getForeignKeyName()
```

#### Form Array Column Handling
```php
// OLD (removed)
if (version_compare(app()->version(), '8.0.0', '<')) {
    $this->model->$column = json_encode($this->model->$column);
}

// NEW
// Laravel 8+ handles array columns automatically
```

## Configuration Updates

### Updated Model References
All model references in `config/admin.php` have been updated:

```php
// OLD
'users_model' => OpenAdmin\Admin\Auth\Database\Administrator::class,
'roles_model' => OpenAdmin\Admin\Auth\Database\Role::class,
'permissions_model' => OpenAdmin\Admin\Auth\Database\Permission::class,
'menu_model' => OpenAdmin\Admin\Auth\Database\Menu::class,
'grid_action_class' => \OpenAdmin\Admin\Grid\Displayers\Actions\Actions::class,

// NEW
'users_model' => Qulint\Admin\Auth\Database\Administrator::class,
'roles_model' => Qulint\Admin\Auth\Database\Role::class,
'permissions_model' => Qulint\Admin\Auth\Database\Permission::class,
'menu_model' => Qulint\Admin\Auth\Database\Menu::class,
'grid_action_class' => \Qulint\Admin\Grid\Displayers\Actions\Actions::class,
```

## Migration Guide

### 1. Update Composer Dependencies
```bash
composer require sanjayaharshana/qulint-admin-panel:^3.0
```

### 2. Update PHP Version
Ensure your server supports PHP 8.1 or higher.

### 3. Update Namespace References
If you have custom code using the old namespace, update it:

```php
// OLD
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;

// NEW
use Qulint\Admin\Form;
use Qulint\Admin\Grid;
use Qulint\Admin\Show;
```

### 4. Publish Updated Assets
```bash
php artisan vendor:publish --provider="Qulint\Admin\AdminServiceProvider" --force
```

### 5. Clear Caches
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

## Testing

### Run Tests
```bash
composer test
```

### Test Specific Features
- Form submissions
- Grid operations
- File uploads
- Authentication
- Role-based access control

## Compatibility Notes

### Laravel 11 Features
- Full support for Laravel 11's new features
- Compatible with Laravel 11's updated validation system
- Supports Laravel 11's improved error handling

### Laravel 12 Features
- Ready for Laravel 12's upcoming features
- Compatible with Laravel 12's planned changes
- Future-proof architecture

## Troubleshooting

### Common Issues

1. **Namespace Errors**
   - Ensure all `OpenAdmin\Admin` references are updated to `Qulint\Admin`
   - Clear autoload cache: `composer dump-autoload`

2. **PHP Version Errors**
   - Verify PHP version: `php -v`
   - Minimum required: PHP 8.1

3. **Laravel Version Conflicts**
   - Check Laravel version: `php artisan --version`
   - Minimum required: Laravel 10.0

4. **Asset Loading Issues**
   - Clear view cache: `php artisan view:clear`
   - Republish assets: `php artisan vendor:publish --provider="Qulint\Admin\AdminServiceProvider" --force`

## Support

For issues related to the upgrade:
- Check the [GitHub Issues](https://github.com/sanjayaharshana/qulint-admin-panel/issues)
- Review the [Documentation](https://qulint.com/docs/)
- Contact: info@qulint.com

## Changelog

### Version 3.0.0
- ✅ Added Laravel 11/12 support
- ✅ Upgraded PHP requirement to 8.1+
- ✅ Updated namespace from OpenAdmin to Qulint
- ✅ Removed deprecated version compatibility checks
- ✅ Updated all dependencies to latest compatible versions
- ✅ Improved performance and security
- ✅ Enhanced error handling
- ✅ Better Laravel 11/12 integration

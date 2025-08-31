# Qulint Admin Panel Installation Guide

## Standard Installation (via Packagist)

If the package is registered on Packagist:

```bash
composer require sanjayaharshana/qulint-admin-panel:^3.0.9
```

## Alternative Installation Methods

### Method 1: Install from GitHub Repository

If Packagist is not available, you can install directly from GitHub:

```bash
# Add the repository to your composer.json
composer config repositories.qulint-admin-panel vcs https://github.com/sanjayaharshana/qulint-admin-panel

# Install the package
composer require sanjayaharshana/qulint-admin-panel:^3.0.9
```

### Method 2: Install from Local Path (Development)

For development or testing:

```bash
# Clone the repository
git clone https://github.com/sanjayaharshana/qulint-admin-panel.git

# Add to your project's composer.json
composer config repositories.qulint-admin-panel path ./qulint-admin-panel

# Install
composer require sanjayaharshana/qulint-admin-panel:dev-main
```

### Method 3: Manual Installation

If Composer is having issues:

1. **Download the package:**
   ```bash
   git clone https://github.com/sanjayaharshana/qulint-admin-panel.git
   ```

2. **Copy to your project:**
   ```bash
   cp -r qulint-admin-panel/src vendor/sanjayaharshana/qulint-admin-panel/src
   cp qulint-admin-panel/composer.json vendor/sanjayaharshana/qulint-admin-panel/composer.json
   ```

3. **Add to your composer.json autoload:**
   ```json
   {
       "autoload": {
           "psr-4": {
               "Qulint\\Admin\\": "vendor/sanjayaharshana/qulint-admin-panel/src/"
           }
       }
   }
   ```

4. **Run autoload:**
   ```bash
   composer dump-autoload
   ```

## Troubleshooting

### Issue: "Package not found on Packagist"

**Solution:** Use one of the alternative installation methods above.

### Issue: "Version constraint not satisfied"

**Solution:** Try installing with a broader constraint:
```bash
composer require sanjayaharshana/qulint-admin-panel:^3.0
```

### Issue: "Composer could not detect root package version"

**Solution:** Add version to your project's composer.json:
```json
{
    "name": "your-project/name",
    "version": "1.0.0",
    "minimum-stability": "stable"
}
```

## Post-Installation Setup

After installation:

1. **Publish configuration:**
   ```bash
   php artisan vendor:publish --provider="Qulint\Admin\AdminServiceProvider"
   ```

2. **Run migrations:**
   ```bash
   php artisan migrate
   ```

3. **Create admin user:**
   ```bash
   php artisan admin:install
   ```

4. **Clear cache:**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```

## Version Compatibility

- **Laravel:** 10.x, 11.x, 12.x
- **PHP:** ^8.1
- **Database:** MySQL, PostgreSQL, SQLite, SQL Server

## Support

If you encounter issues:

1. Check the [GitHub Issues](https://github.com/sanjayaharshana/qulint-admin-panel/issues)
2. Review the [README.md](README.md) for detailed documentation
3. Check the [COMPOSER_COMPATIBILITY.md](COMPOSER_COMPATIBILITY.md) for dependency issues

# Asset Loading Troubleshooting Guide

## Common Issues and Solutions

### Issue: 404 Errors for CSS/JS Files

If you're seeing 404 errors like:
```
GET http://localhost:8000/vendor/qulint-admin/css/styles.css 404 (Not Found)
GET http://localhost:8000/vendor/qulint-admin/js/qulint-admin.js 404 (Not Found)
```

### Solution: Publish Assets

The assets need to be published to your Laravel application's public directory. Run this command:

```bash
php artisan vendor:publish --provider="Qulint\Admin\AdminServiceProvider" --force
```

This will publish all assets from the package to `public/vendor/qulint-admin/`.

### Alternative Solutions

#### 1. Publish Only Assets
```bash
php artisan vendor:publish --provider="Qulint\Admin\AdminServiceProvider" --tag=qulint-admin-assets --force
```

#### 2. Clear Cache and Republish
```bash
php artisan config:clear
php artisan cache:clear
php artisan vendor:publish --provider="Qulint\Admin\AdminServiceProvider" --force
```

#### 3. Manual Asset Verification
After publishing, verify these directories exist:
- `public/vendor/qulint-admin/css/`
- `public/vendor/qulint-admin/js/`
- `public/vendor/qulint-admin/gfx/`

### Issue: Assets Still Not Loading After Publishing

#### Check File Permissions
```bash
chmod -R 755 public/vendor/qulint-admin/
```

#### Check Web Server Configuration
Make sure your web server (Apache/Nginx) is configured to serve static files from the public directory.

#### Verify Asset Paths
Check that the files exist in the expected locations:
- `public/vendor/qulint-admin/css/styles.css`
- `public/vendor/qulint-admin/js/qulint-admin.js`
- `public/vendor/qulint-admin/gfx/user.svg`

### Issue: Development vs Production

#### Development Environment
In development, you might want to use symbolic links:
```bash
php artisan vendor:publish --provider="Qulint\Admin\AdminServiceProvider" --tag=qulint-admin-assets
```

#### Production Environment
In production, always publish assets:
```bash
php artisan vendor:publish --provider="Qulint\Admin\AdminServiceProvider" --tag=qulint-admin-assets --force
```

### Issue: Composer Install vs Update

#### After Fresh Install
```bash
composer require sanjayaharshana/qulint-admin-panel
php artisan vendor:publish --provider="Qulint\Admin\AdminServiceProvider" --force
php artisan admin:install
```

#### After Package Update
```bash
composer update sanjayaharshana/qulint-admin-panel
php artisan vendor:publish --provider="Qulint\Admin\AdminServiceProvider" --tag=qulint-admin-assets --force
```

### Issue: Custom Asset Modifications

If you've modified the published assets and they're being overwritten:

#### Preserve Custom Changes
1. Copy your custom assets to a different location
2. Run the publish command
3. Re-apply your custom changes

#### Use Asset Versioning
Add version parameters to your asset URLs to prevent caching issues:
```php
Admin::asset('css/styles.css?v=' . time())
```

### Issue: Browser Cache

#### Clear Browser Cache
- Press `Ctrl+F5` (Windows) or `Cmd+Shift+R` (Mac) to force refresh
- Clear browser cache completely
- Try in incognito/private mode

#### Add Cache Busting
In your Laravel application, you can add cache busting:
```php
// In your blade templates
<script src="{{ Admin::asset('js/qulint-admin.js') }}?v={{ time() }}"></script>
```

### Issue: Asset Path Configuration

#### Check Admin Configuration
Verify your `config/admin.php` has correct asset paths:
```php
'default_avatar' => '/vendor/qulint-admin/gfx/user.svg',
```

#### Check AdminServiceProvider
The provider should publish assets to:
```php
$this->publishes([__DIR__.'/../resources/assets' => public_path('vendor/qulint-admin')], 'qulint-admin-assets');
```

### Issue: Missing Asset Files

#### Verify Package Installation
Check that the package is properly installed:
```bash
composer show sanjayaharshana/qulint-admin-panel
```

#### Check Package Structure
Verify the package contains the expected assets:
```bash
ls vendor/sanjayaharshana/qulint-admin-panel/resources/assets/qulint-admin/
```

### Issue: Web Server Configuration

#### Apache (.htaccess)
Make sure your `.htaccess` file allows access to vendor assets:
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php/$1 [L]
</IfModule>
```

#### Nginx
Ensure your Nginx configuration serves static files:
```nginx
location /vendor {
    try_files $uri $uri/ /index.php?$query_string;
}
```

### Issue: Laravel Mix/Vite Integration

#### If Using Laravel Mix
```bash
npm install
npm run dev
```

#### If Using Vite
```bash
npm install
npm run build
```

### Issue: Multiple Laravel Applications

#### Check Application Context
Make sure you're running commands in the correct Laravel application directory.

#### Verify Environment
Check that you're in the right environment:
```bash
php artisan env
```

### Issue: Package Version Conflicts

#### Check Installed Version
```bash
composer show sanjayaharshana/qulint-admin-panel
```

#### Update to Latest Version
```bash
composer update sanjayaharshana/qulint-admin-panel
```

### Issue: Debugging Asset Loading

#### Enable Debug Mode
In your `.env` file:
```env
APP_DEBUG=true
```

#### Check Laravel Logs
```bash
tail -f storage/logs/laravel.log
```

#### Use Browser Developer Tools
- Open browser developer tools (F12)
- Check the Network tab for failed requests
- Look for any JavaScript errors in the Console tab

### Issue: Asset Loading Order

#### Check Asset Loading Sequence
Make sure assets are loaded in the correct order:
1. CSS files first
2. JavaScript files after
3. Custom scripts last

#### Verify Dependencies
Check that all required dependencies are loaded:
- Bootstrap 5
- jQuery (if required)
- Other third-party libraries

### Issue: Custom Asset Overrides

#### Override Default Assets
Create your own assets in `public/vendor/qulint-admin/` with the same names to override the defaults.

#### Use Custom Asset Paths
Modify the asset paths in your configuration:
```php
// In config/admin.php
'assets_path' => '/custom/path/to/assets',
```

### Issue: Asset Optimization

#### Minify Assets
For production, consider minifying assets:
```bash
php artisan admin:minify
```

#### Use CDN
Consider using a CDN for better performance:
```php
// In your configuration
'cdn_url' => 'https://your-cdn.com/assets/',
```

## Quick Fix Checklist

1. ✅ Run `php artisan vendor:publish --provider="Qulint\Admin\AdminServiceProvider" --force`
2. ✅ Check that `public/vendor/qulint-admin/` directory exists
3. ✅ Verify CSS and JS files are present
4. ✅ Clear browser cache (Ctrl+F5)
5. ✅ Check web server configuration
6. ✅ Verify file permissions
7. ✅ Check Laravel logs for errors
8. ✅ Ensure package is properly installed

## Still Having Issues?

If you're still experiencing issues after trying these solutions:

1. **Check the GitHub Issues**: [https://github.com/sanjayaharshana/qulint-admin-panel/issues](https://github.com/sanjayaharshana/qulint-admin-panel/issues)
2. **Create a New Issue**: Provide detailed information about your environment and the specific error
3. **Check Documentation**: Visit [https://qulint.com/docs/](https://qulint.com/docs/) for more detailed guides

## Environment Information

When reporting issues, please include:
- Laravel version
- PHP version
- Operating system
- Web server (Apache/Nginx)
- Package version
- Error messages
- Steps to reproduce

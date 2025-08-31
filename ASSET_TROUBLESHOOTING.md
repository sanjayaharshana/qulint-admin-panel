# Asset Loading Troubleshooting Guide

## Problem: Admin Panel Shows Unstyled (No CSS Applied)

If your admin panel appears completely unstyled (like in the screenshot), this is an asset loading issue. The CSS files are not being loaded by the browser.

## Quick Fix

Run this command in your Laravel application directory:

```bash
php artisan vendor:publish --provider="Qulint\Admin\AdminServiceProvider" --force
```

This will copy all assets from the package to your `public/vendor/qulint-admin/` directory.

## Detailed Troubleshooting Steps

### 1. Check if Assets are Published

First, verify if the assets exist in your Laravel application:

```bash
ls -la public/vendor/qulint-admin/css/
```

You should see:
- `styles.css`
- `modern-white-theme.css`
- `theme-config.css`
- Other CSS files

### 2. Check Browser Network Tab

1. Open your browser's Developer Tools (F12)
2. Go to the Network tab
3. Refresh the admin panel page
4. Look for failed requests to CSS files

Common 404 errors:
```
GET http://localhost:8000/vendor/qulint-admin/css/styles.css 404 (Not Found)
GET http://localhost:8000/vendor/qulint-admin/js/qulint-admin.js 404 (Not Found)
```

### 3. Verify File Permissions

Ensure the web server can read the published files:

```bash
chmod -R 755 public/vendor/qulint-admin/
```

### 4. Clear Laravel Cache

Sometimes cached routes or config can cause issues:

```bash
php artisan config:clear
php artisan route:clear
php artisan cache:clear
php artisan view:clear
```

### 5. Check Web Server Configuration

#### Apache
Make sure your `.htaccess` file allows access to vendor assets:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

#### Nginx
Ensure your nginx configuration serves static files:

```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}

location ~* \.(css|js|png|jpg|jpeg|gif|ico|svg)$ {
    expires 1y;
    add_header Cache-Control "public, immutable";
}
```

### 6. Check Package Installation

Verify the package is properly installed:

```bash
composer show sanjayaharshana/qulint-admin-panel
```

Should show version 3.0.21 or higher.

### 7. Manual Asset Publishing

If automatic publishing doesn't work, manually copy assets:

```bash
# Create directory if it doesn't exist
mkdir -p public/vendor/qulint-admin

# Copy assets manually
cp -r vendor/sanjayaharshana/qulint-admin-panel/resources/assets/* public/vendor/qulint-admin/
```

### 8. Check CSS File Content

Verify the CSS files are not empty:

```bash
head -20 public/vendor/qulint-admin/css/styles.css
```

Should show the CSS content, not be empty.

### 9. Browser Cache Issues

Clear your browser cache or try:
- Hard refresh: Ctrl+F5 (Windows) or Cmd+Shift+R (Mac)
- Incognito/Private browsing mode
- Different browser

### 10. Development Environment Issues

#### Laravel Sail/Docker
If using Docker, ensure volumes are properly mounted:

```yaml
volumes:
  - .:/var/www/html
```

#### Laragon/XAMPP
Check if the web server is serving files from the correct directory.

## Common Solutions

### Solution 1: Force Publish Assets
```bash
php artisan vendor:publish --provider="Qulint\Admin\AdminServiceProvider" --force
```

### Solution 2: Clear All Caches
```bash
php artisan optimize:clear
```

### Solution 3: Reinstall Package
```bash
composer remove sanjayaharshana/qulint-admin-panel
composer require sanjayaharshana/qulint-admin-panel:^3.0.21
php artisan vendor:publish --provider="Qulint\Admin\AdminServiceProvider" --force
```

### Solution 4: Check File Structure
Ensure your Laravel application has the correct structure:
```
your-laravel-app/
├── public/
│   └── vendor/
│       └── qulint-admin/
│           ├── css/
│           │   ├── styles.css
│           │   ├── modern-white-theme.css
│           │   └── theme-config.css
│           ├── js/
│           └── images/
├── vendor/
│   └── sanjayaharshana/
│       └── qulint-admin-panel/
└── composer.json
```

## Verification Steps

After fixing the issue, verify:

1. **CSS Files Load**: Check browser Network tab - CSS files should load with 200 status
2. **Visual Changes**: Admin panel should have modern white theme styling
3. **No Console Errors**: Browser console should not show 404 errors
4. **Responsive Design**: Test on different screen sizes

## Still Having Issues?

If the problem persists:

1. **Check Laravel Logs**: `tail -f storage/logs/laravel.log`
2. **Check Web Server Logs**: Apache/Nginx error logs
3. **Create Issue**: Report on GitHub with:
   - Laravel version
   - PHP version
   - Web server (Apache/Nginx)
   - Browser and version
   - Screenshots of the issue
   - Console errors

## Prevention

To avoid this issue in the future:

1. Always run `php artisan vendor:publish` after installing packages
2. Use `--force` flag when updating packages
3. Clear caches after major updates
4. Test in a clean environment before production deployment

---

**Note**: This guide specifically addresses the CSS loading issue shown in the screenshot. The admin panel is working correctly (version 3.0.21 is detected), but the styling is missing due to asset loading problems.

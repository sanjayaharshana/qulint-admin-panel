# Composer Dependency Compatibility Guide

This guide helps resolve dependency conflicts when installing Qulint Admin Panel with Laravel 11/12.

## Common Issues and Solutions

### 1. Doctrine DBAL Conflicts

**Problem**: Conflicts between `doctrine/dbal`, `carbonphp/carbon-doctrine-types`, and `symfony/http-foundation`

**Solution**: Both packages are now optional and have proper version constraints

```bash
# Both packages are optional - only install if needed
composer require doctrine/dbal:^3.0 --optional
composer require carbonphp/carbon-doctrine-types:^4.0 --optional

# Or install manually if you need advanced database operations
composer require doctrine/dbal:^3.0
composer require carbonphp/carbon-doctrine-types:^4.0
```

### 2. PHP Version Conflicts

**Problem**: Older Doctrine packages require PHP < 8.0

**Solution**: Ensure PHP 8.1+ and use newer packages

```bash
# Check PHP version
php -v

# Should be PHP 8.1 or higher
```

### 3. Laravel Framework Conflicts

**Problem**: Laravel 12 requires newer Symfony components

**Solution**: Update to compatible versions

```bash
# Update Laravel to latest compatible version
composer update laravel/framework --with-dependencies
```

## Installation Steps

### Step 1: Clean Installation

```bash
# Remove existing vendor directory
rm -rf vendor/
rm composer.lock

# Clear Composer cache
composer clear-cache
```

### Step 2: Install with Conflict Resolution

```bash
# Install Qulint Admin Panel (Doctrine DBAL is now optional)
composer require sanjayaharshana/qulint-admin-panel:^3.0

# If you need Doctrine DBAL, install it separately
composer require doctrine/dbal:^3.0
```

### Step 3: Alternative Installation Method

If the above doesn't work, try this approach:

```bash
# Install Laravel framework first
composer require laravel/framework:^12.0

# Install Qulint Admin Panel (Doctrine DBAL is optional)
composer require sanjayaharshana/qulint-admin-panel:^3.0
```

## Dependency Matrix

| Package | Laravel 10 | Laravel 11 | Laravel 12 | Notes |
|---------|------------|------------|------------|-------|
| PHP | ^8.1 | ^8.1 | ^8.1 | Required |
| doctrine/dbal | Optional | Optional | Optional | Database abstraction (optional) |
| symfony/http-foundation | ^6.0 | ^7.0 | ^7.0 | HTTP handling |
| carbonphp/carbon-doctrine-types | Optional | Optional | Optional | Carbon integration (optional) |
| intervention/image | ^2.7 | ^2.7\|^3.0 | ^2.7\|^3.0 | Image processing |

## Troubleshooting

### Error: "conflicts with doctrine/dbal"

```bash
# Check current installed versions
composer show doctrine/dbal
composer show carbonphp/carbon-doctrine-types

# Force install specific versions
composer require doctrine/dbal:^3.0 --force
composer require carbonphp/carbon-doctrine-types:^4.0 --force

# Or remove conflicting packages and reinstall
composer remove doctrine/dbal carbonphp/carbon-doctrine-types
composer require doctrine/dbal:^3.0
composer require carbonphp/carbon-doctrine-types:^4.0
```

### Error: "PHP version does not satisfy requirement"

```bash
# Update PHP to 8.1+
# For Ubuntu/Debian:
sudo apt update
sudo apt install php8.1 php8.1-cli php8.1-common

# For CentOS/RHEL:
sudo yum install php81w php81w-cli php81w-common
```

### Error: "carbonphp/carbon-doctrine-types conflicts"

```bash
# This is a common issue with Laravel 12 and Carbon integration
# Solution: Use version 4.0+ of carbonphp/carbon-doctrine-types

# Remove old version
composer remove carbonphp/carbon-doctrine-types

# Install compatible version
composer require carbonphp/carbon-doctrine-types:^4.0

# If you still have conflicts, try this approach:
composer require carbonphp/carbon-doctrine-types:^4.0 --with nesbot/carbon:^3.8.4
```

### Error: "symfony/http-foundation conflicts"

```bash
# Update Symfony components
composer update symfony/http-foundation symfony/dom-crawler --with-dependencies
```

## Recommended composer.json Configuration

```json
{
    "require": {
        "php": "^8.1",
        "laravel/framework": "^10.0|^11.0|^12.0"
    },
    "suggest": {
        "doctrine/dbal": "Optional: For advanced database operations",
        "carbonphp/carbon-doctrine-types": "Optional: For Carbon integration (^4.0 required)"
    },
    "conflict": {
        "doctrine/dbal": "<3.0",
        "carbonphp/carbon-doctrine-types": "<4.0"
    }
}
```

## Testing Installation

After successful installation, test the setup:

```bash
# Check if package is installed
composer show sanjayaharshana/qulint-admin-panel

# Run tests
composer test

# Check for any remaining conflicts
composer check-platform-reqs
```

## Support

If you continue to experience issues:

1. Check the [GitHub Issues](https://github.com/sanjayaharshana/qulint-admin-panel/issues)
2. Review the [UPGRADE_GUIDE.md](UPGRADE_GUIDE.md)
3. Contact: info@qulint.com

## Version Compatibility Table

| Qulint Admin Panel | Laravel | PHP | Doctrine DBAL | Carbon Doctrine Types | Status |
|-------------------|---------|-----|----------------|---------------------|--------|
| 3.0.4 | 10.x, 11.x, 12.x | ^8.1 | Optional | Optional (^4.0) | ✅ Supported |
| 3.0.3 | 10.x, 11.x, 12.x | ^8.1 | Optional | Optional | ⚠️ Legacy |
| 3.0.0 | 10.x, 11.x, 12.x | ^8.1 | ^3.0\|^4.0 | ^3.0\|^4.0 | ❌ Deprecated |
| 2.0.0 | 7.x, 8.x, 9.x, 10.x | ^7.3 | 2.*\|3.* | 2.*\|3.* | ❌ Deprecated |
| 1.0.0 | 7.x, 8.x, 9.x | ^7.3 | 2.*\|3.* | 2.*\|3.* | ❌ Deprecated |

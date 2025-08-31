# Composer Dependency Compatibility Guide

This guide helps resolve dependency conflicts when installing Qulint Admin Panel with Laravel 11/12.

## Common Issues and Solutions

### 1. Doctrine DBAL Conflicts

**Problem**: Conflicts between `doctrine/dbal`, `carbonphp/carbon-doctrine-types`, and `symfony/http-foundation`

**Solution**: Use compatible versions

```bash
# Remove conflicting packages first
composer remove doctrine/dbal carbonphp/carbon-doctrine-types

# Install compatible versions
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
# Install with specific versions to avoid conflicts
composer require sanjayaharshana/qulint-admin-panel:^3.0 \
    --with doctrine/dbal:^3.0 \
    --with carbonphp/carbon-doctrine-types:^4.0 \
    --with symfony/http-foundation:^7.0
```

### Step 3: Alternative Installation Method

If the above doesn't work, try this approach:

```bash
# Install Laravel framework first
composer require laravel/framework:^12.0

# Install Doctrine DBAL with specific version
composer require doctrine/dbal:^3.0

# Install Qulint Admin Panel
composer require sanjayaharshana/qulint-admin-panel:^3.0
```

## Dependency Matrix

| Package | Laravel 10 | Laravel 11 | Laravel 12 | Notes |
|---------|------------|------------|------------|-------|
| PHP | ^8.1 | ^8.1 | ^8.1 | Required |
| doctrine/dbal | ^3.0 | ^3.0 | ^3.0\|^4.0 | Database abstraction |
| symfony/http-foundation | ^6.0 | ^7.0 | ^7.0 | HTTP handling |
| carbonphp/carbon-doctrine-types | ^3.0 | ^4.0 | ^4.0 | Carbon integration |
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
        "laravel/framework": "^10.0|^11.0|^12.0",
        "doctrine/dbal": "^3.0|^4.0",
        "symfony/http-foundation": "^6.0|^7.0",
        "carbonphp/carbon-doctrine-types": "^4.0"
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

| Qulint Admin Panel | Laravel | PHP | Doctrine DBAL | Status |
|-------------------|---------|-----|----------------|--------|
| 3.0.0 | 10.x, 11.x, 12.x | ^8.1 | ^3.0\|^4.0 | ✅ Supported |
| 2.0.0 | 7.x, 8.x, 9.x, 10.x | ^7.3 | 2.*\|3.* | ⚠️ Legacy |
| 1.0.0 | 7.x, 8.x, 9.x | ^7.3 | 2.*\|3.* | ❌ Deprecated |

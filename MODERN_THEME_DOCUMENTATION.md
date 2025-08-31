# Modern White Theme Documentation

## Overview

The Qulint Admin Panel now includes a comprehensive modern white theme system with multiple theme variants. This system provides a clean, professional, and modern appearance with excellent user experience and accessibility features.

## Features

### 🎨 Multiple Theme Variants
- **Modern White** - Clean white theme with blue accents
- **Light Blue** - Soft blue theme with light backgrounds
- **Light Green** - Fresh green theme with natural colors
- **Light Purple** - Elegant purple theme with soft tones
- **Minimal** - Minimalist black and white design
- **Modern Gray** - Sophisticated gray theme
- **Warm White** - Warm white theme with orange accents

### 🚀 Key Features
- **CSS Custom Properties** - Easy customization with CSS variables
- **Theme Switching** - Dynamic theme switching with JavaScript
- **Persistence** - Theme preferences saved in localStorage
- **Responsive Design** - Mobile-friendly layouts
- **Accessibility** - WCAG compliant with focus states
- **Dark Mode Support** - Automatic dark mode detection
- **Smooth Transitions** - Animated theme changes
- **Print Styles** - Optimized for printing

## Installation

### 1. Include CSS Files

Add the theme CSS files to your Laravel application:

```html
<!-- In your main layout file -->
<link rel="stylesheet" href="{{ asset('vendor/qulint-admin/css/modern-white-theme.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/qulint-admin/css/theme-config.css') }}">
```

### 2. Include JavaScript

Add the theme switcher JavaScript:

```html
<!-- Before closing body tag -->
<script src="{{ asset('vendor/qulint-admin/js/theme-switcher.js') }}"></script>
```

### 3. Publish Assets

Run the vendor publish command to copy assets to your public directory:

```bash
php artisan vendor:publish --provider="Qulint\Admin\AdminServiceProvider" --force
```

## Usage

### Basic Theme Switching

The theme switcher automatically initializes and provides a floating theme toggle button (🎨) in the bottom-right corner of the page.

### Programmatic Theme Control

```javascript
// Set a specific theme
setQulintTheme('theme-light-blue');

// Get current theme
const currentTheme = getQulintTheme();

// Get all available themes
const themes = getQulintThemes();

// Listen for theme changes
document.addEventListener('themeChanged', (event) => {
    console.log('Theme changed to:', event.detail.theme);
});
```

### CSS Custom Properties

All themes use CSS custom properties for easy customization:

```css
:root {
    /* Primary Colors */
    --primary-color: #3b82f6;
    --primary-hover: #2563eb;
    
    /* Background Colors */
    --bg-primary: #ffffff;
    --bg-secondary: #f8fafc;
    --bg-tertiary: #f1f5f9;
    
    /* Text Colors */
    --text-primary: #1e293b;
    --text-secondary: #64748b;
    --text-muted: #94a3b8;
    
    /* Border Colors */
    --border-light: #e2e8f0;
    --border-medium: #cbd5e1;
    --border-dark: #94a3b8;
    
    /* Shadows */
    --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
    --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
    
    /* Border Radius */
    --radius-sm: 0.375rem;
    --radius-md: 0.5rem;
    --radius-lg: 0.75rem;
    
    /* Spacing */
    --spacing-xs: 0.25rem;
    --spacing-sm: 0.5rem;
    --spacing-md: 1rem;
    --spacing-lg: 1.5rem;
    --spacing-xl: 2rem;
}
```

## Theme Variants

### 1. Modern White (Default)
- **Primary Color**: Blue (#3b82f6)
- **Background**: Pure white with light gray accents
- **Best For**: Professional applications, corporate websites
- **Class**: `theme-white`

### 2. Light Blue
- **Primary Color**: Sky blue (#0ea5e9)
- **Background**: Light blue tints
- **Best For**: Healthcare, technology, calming interfaces
- **Class**: `theme-light-blue`

### 3. Light Green
- **Primary Color**: Emerald green (#10b981)
- **Background**: Light green tints
- **Best For**: Environmental, health, growth-focused applications
- **Class**: `theme-light-green`

### 4. Light Purple
- **Primary Color**: Purple (#8b5cf6)
- **Background**: Light purple tints
- **Best For**: Creative, luxury, premium applications
- **Class**: `theme-light-purple`

### 5. Minimal
- **Primary Color**: Black (#000000)
- **Background**: Pure white with minimal styling
- **Best For**: Content-focused, reading applications
- **Class**: `theme-minimal`

### 6. Modern Gray
- **Primary Color**: Gray (#6b7280)
- **Background**: Light gray tints
- **Best For**: Professional, neutral applications
- **Class**: `theme-modern-gray`

### 7. Warm White
- **Primary Color**: Orange (#f59e0b)
- **Background**: Warm white with orange accents
- **Best For**: Food, hospitality, warm brand applications
- **Class**: `theme-warm-white`

## Components

### Cards
```html
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Card Title</h3>
    </div>
    <div class="card-body">
        <p>Card content goes here...</p>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary">Action</button>
    </div>
</div>
```

### Buttons
```html
<button class="btn btn-primary">Primary Button</button>
<button class="btn btn-secondary">Secondary Button</button>
<button class="btn btn-success">Success Button</button>
<button class="btn btn-warning">Warning Button</button>
<button class="btn btn-danger">Danger Button</button>
<button class="btn btn-sm">Small Button</button>
<button class="btn btn-lg">Large Button</button>
```

### Forms
```html
<div class="form-group">
    <label class="form-label">Input Label</label>
    <input type="text" class="form-control" placeholder="Enter text...">
</div>
```

### Tables
```html
<table class="table">
    <thead>
        <tr>
            <th>Header 1</th>
            <th>Header 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Data 1</td>
            <td>Data 2</td>
        </tr>
    </tbody>
</table>
```

### Alerts
```html
<div class="alert alert-success">Success message</div>
<div class="alert alert-warning">Warning message</div>
<div class="alert alert-danger">Error message</div>
<div class="alert alert-info">Info message</div>
```

### Badges
```html
<span class="badge badge-primary">Primary</span>
<span class="badge badge-success">Success</span>
<span class="badge badge-warning">Warning</span>
<span class="badge badge-danger">Danger</span>
```

## Customization

### Creating Custom Themes

1. **Add Theme Class**
```css
.theme-custom {
    --primary-color: #your-color;
    --primary-hover: #your-hover-color;
    --bg-primary: #ffffff;
    --bg-secondary: #f8fafc;
    /* Add other custom properties */
}
```

2. **Add to JavaScript**
```javascript
// In theme-switcher.js, add to themes array
{ id: 'theme-custom', name: 'Custom Theme', description: 'Your custom theme description' }
```

3. **Add Preview Style**
```css
.theme-preview.theme-custom { 
    background: linear-gradient(45deg, #your-color, #your-bg-color); 
}
```

### Overriding Styles

```css
/* Override specific component styles */
.theme-custom .card {
    border-radius: 0;
    box-shadow: none;
}

.theme-custom .btn {
    border-radius: 0;
    text-transform: uppercase;
}
```

## Utility Classes

### Spacing
```css
.mt-0, .mt-1, .mt-2, .mt-3, .mt-4, .mt-5  /* Margin top */
.mb-0, .mb-1, .mb-2, .mb-3, .mb-4, .mb-5  /* Margin bottom */
.p-0, .p-1, .p-2, .p-3, .p-4, .p-5        /* Padding */
```

### Display
```css
.d-flex, .d-block, .d-inline, .d-none
.justify-content-between, .justify-content-center, .justify-content-end
.align-items-center, .align-items-start, .align-items-end
.flex-column, .flex-row
```

### Text Alignment
```css
.text-center, .text-left, .text-right
```

### Sizing
```css
.w-100, .h-100
```

## Responsive Design

The theme system includes responsive breakpoints:

- **Mobile**: < 768px
- **Tablet**: 768px - 1024px
- **Desktop**: > 1024px

### Mobile Adaptations
- Sidebar collapses to slide-out menu
- Reduced padding and spacing
- Simplified navigation
- Touch-friendly button sizes

## Accessibility

### Features
- **Focus States**: Clear focus indicators for all interactive elements
- **Color Contrast**: WCAG AA compliant color ratios
- **Keyboard Navigation**: Full keyboard accessibility
- **Screen Reader Support**: Proper ARIA labels and semantic HTML
- **Reduced Motion**: Respects user's motion preferences

### Best Practices
```css
/* Focus styles */
.btn:focus,
.form-control:focus,
.nav-link:focus {
    outline: 2px solid var(--primary-color);
    outline-offset: 2px;
}

/* Reduced motion support */
@media (prefers-reduced-motion: reduce) {
    * {
        transition: none !important;
    }
}
```

## Performance

### Optimizations
- **CSS Variables**: Efficient theme switching without CSS reload
- **Minimal JavaScript**: Lightweight theme switcher
- **Efficient Selectors**: Optimized CSS selectors
- **Lazy Loading**: Theme assets loaded on demand

### Best Practices
- Use CSS variables for theme colors
- Minimize DOM queries in JavaScript
- Cache theme preferences in localStorage
- Use efficient event delegation

## Browser Support

### Supported Browsers
- **Chrome**: 88+
- **Firefox**: 87+
- **Safari**: 14+
- **Edge**: 88+

### CSS Features Used
- CSS Custom Properties (CSS Variables)
- CSS Grid
- Flexbox
- CSS Transitions
- Media Queries

## Troubleshooting

### Common Issues

1. **Theme Not Switching**
   - Check if JavaScript is loaded
   - Verify CSS files are included
   - Clear browser cache

2. **Styles Not Applying**
   - Ensure CSS files are published
   - Check file paths in asset URLs
   - Verify CSS custom properties support

3. **Theme Not Persisting**
   - Check localStorage support
   - Verify JavaScript execution
   - Clear browser data

### Debug Mode

Enable debug mode for troubleshooting:

```javascript
// Enable debug logging
window.qulintThemeSwitcher.debug = true;
```

## Migration Guide

### From Old Theme System

1. **Remove Old CSS**
   - Remove old theme CSS files
   - Update layout files to include new CSS

2. **Update JavaScript**
   - Replace old theme switching code
   - Update any custom theme logic

3. **Test Components**
   - Verify all components work with new themes
   - Check responsive behavior
   - Test accessibility features

## Examples

### Complete Layout Example

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qulint Admin Panel</title>
    <link rel="stylesheet" href="/vendor/qulint-admin/css/modern-white-theme.css">
    <link rel="stylesheet" href="/vendor/qulint-admin/css/theme-config.css">
</head>
<body class="theme-white">
    <!-- Header -->
    <header class="main-header">
        <div class="header-content">
            <a href="#" class="logo">Qulint Admin</a>
            <nav>
                <!-- Navigation items -->
            </nav>
        </div>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h3>Navigation</h3>
        </div>
        <nav class="sidebar-nav">
            <ul class="nav-item">
                <li><a href="#" class="nav-link active">Dashboard</a></li>
                <li><a href="#" class="nav-link">Users</a></li>
                <li><a href="#" class="nav-link">Settings</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="content-header">
            <h1 class="page-title">Dashboard</h1>
            <p class="page-subtitle">Welcome to your admin panel</p>
        </div>

        <!-- Cards -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Statistics</h3>
            </div>
            <div class="card-body">
                <p>Your content here...</p>
            </div>
        </div>

        <!-- Buttons -->
        <div class="d-flex gap-3">
            <button class="btn btn-primary">Primary Action</button>
            <button class="btn btn-secondary">Secondary Action</button>
        </div>
    </main>

    <!-- Theme Switcher Script -->
    <script src="/vendor/qulint-admin/js/theme-switcher.js"></script>
</body>
</html>
```

## Support

For support and questions:

- **GitHub Issues**: [Create an issue](https://github.com/sanjayaharshana/qulint-admin-panel/issues)
- **Documentation**: [https://qulint.com/docs/](https://qulint.com/docs/)
- **Email**: info@qulint.com

## License

This theme system is part of the Qulint Admin Panel and is licensed under the MIT License.

---

**Made with ❤️ by the Qulint Team**

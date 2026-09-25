[![CS](https://github.com/equalizedigital/accessibility-pause-animated-gifs/actions/workflows/cs.yml/badge.svg)](https://github.com/equalizedigital/accessibility-pause-animated-gifs/actions/workflows/cs.yml)
[![Lint](https://github.com/equalizedigital/accessibility-pause-animated-gifs/actions/workflows/lint.yml/badge.svg)](https://github.com/equalizedigital/accessibility-pause-animated-gifs/actions/workflows/lint.yml)
[![Security](https://github.com/equalizedigital/accessibility-pause-animated-gifs/actions/workflows/security.yml/badge.svg)](https://github.com/equalizedigital/accessibility-pause-animated-gifs/actions/workflows/security.yml)

# Equalize Digital Accessibility Pause Animated GIFs

A WordPress plugin that adds play/pause controls to animated GIFs for better accessibility and user experience. 

## Description

This plugin automatically detects animated GIFs on your WordPress site and adds play/pause controls, allowing users to:
- Pause distracting animations
- Reduce motion sensitivity issues
- Control when animations play
- Improve focus and readability

This plugin helps websites meet WCAG 2.2.2 Pause, Stop, Hide requirements by providing mechanisms to pause, stop, or hide any moving or auto-updating information.

## Accessibility Standards

This plugin specifically addresses:
- **WCAG 2.2.2 Pause, Stop, Hide (Level A)**: For any moving, blinking or scrolling information that (1) starts automatically, (2) lasts more than five seconds, and (3) is presented in parallel with other content, there is a mechanism for the user to pause, stop, or hide it.

## Installation

### From a release (recommended)

**Don't use the green "Code > Download ZIP" button on the repository page.** That zip is the raw source code. It doesn't include the `vendor/` (Composer) or `build/` (JavaScript) folders the plugin needs, so it won't load and no settings page will appear.

1. Go to the [Releases page](https://github.com/equalizedigital/accessibility-pause-animated-gifs/releases) and download the latest `accessibility-pause-animated-gifs-vX.X.X.zip` from the **Assets** section.
2. In WordPress, go to **Plugins > Add New Plugin > Upload Plugin**, choose the zip, and click **Install Now**. (Or unzip it into `/wp-content/plugins/`.)
3. Activate the plugin from the **Plugins** screen.
4. Configure it under **Settings > Pause Animated GIFs**.

### From source (developers)

If you clone the repository or download the source, you must install dependencies and build the assets before activating:

```bash
composer install --no-dev --optimize-autoloader
npm install
npm run build
```

If `vendor/autoload.php` is missing, the plugin shows an admin notice ("Please run composer install in the plugin directory.") and does not load, so its settings page won't appear.

## Features

- Automatic detection of animated GIFs
- Individual play/pause controls for each GIF
- Optional global pause button for all animations
- Customizable button styling
- WCAG accessibility compliance
- Performance optimized

## Configuration

### General Settings

- **Container**: Specify where to add pause buttons (default: 'body')
- **Exclusions**: Exclude specific GIFs or regions using CSS selectors
- **Inherit Classes**: Copy classes from original GIF to canvas element
- **Initially Paused**: Start all GIFs in paused state
- **Shared Pause Button**: Use one button to control all GIFs
- **Show Buttons**: Toggle visibility of control buttons
- **Target**: Target specific images using CSS selectors

### Button Styling

- Background color
- Hover state
- Border style
- Border radius
- Icon color
- Focus indicators
- Icon size

### Language Settings

Customize button text and labels for:
- Pause button
- Play button
- Pause all button
- Play all button

## Development

### Requirements

- Node.js
- Composer
- WordPress 5.0+
- PHP 7.4+

### Building

```bash
composer install
npm install
npm run build
```

## Support

For support, please [open an issue](https://github.com/equalizedigital/accessibility-pause-animated-gifs/issues) on GitHub.

## License

This project is licensed under the GPL v2 or later - see the LICENSE file for details.

## Credits

Developed by [Equalize Digital](https://equalizedigital.com/)

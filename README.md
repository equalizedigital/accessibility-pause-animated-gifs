[![CS](https://github.com/equalizedigital/accessibility-pause-animated-gifs/actions/workflows/cs.yml/badge.svg)](https://github.com/equalizedigital/accessibility-pause-animated-gifs/actions/workflows/cs.yml)
[![Lint](https://github.com/equalizedigital/accessibility-pause-animated-gifs/actions/workflows/lint-php.yml/badge.svg)](https://github.com/equalizedigital/accessibility-pause-animated-gifs/actions/workflows/lint-php.yml)
[![Lint](https://github.com/equalizedigital/accessibility-pause-animated-gifs/actions/workflows/lint-js.yml/badge.svg)](https://github.com/equalizedigital/accessibility-pause-animated-gifs/actions/workflows/lint-js.yml)
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

1. Upload the plugin files to `/wp-content/plugins/accessibility-pause-animated-gifs`
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Configure the plugin settings under 'Settings > Pause Animated GIFs'

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
- WordPress 5.0+
- PHP 7.4+

### Building

```bash
npm install
npm run build
```

## Support

For support, please [open an issue](https://github.com/equalizedigital/accessibility-pause-animated-gifs/issues) on GitHub.

## License

This project is licensed under the GPL v2 or later - see the LICENSE file for details.

## Credits

Developed by [Equalize Digital](https://equalizedigital.com/)

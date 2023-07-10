# Dowell Coordinates Plugin

The Dowell Coordinates Plugin allows you to display coordinates on a map. This plugin provides functionality for both the front-end and the admin area of your WordPress site.

## Installation

1. Download the plugin ZIP file from the [GitHub repository](https://github.com/DoWellUXLab/DoWell-Coordinates).
2. Log in to your WordPress admin area.
3. Navigate to **Plugins > Add New**.
4. Click on the **Upload Plugin** button at the top of the page.
5. Choose the plugin ZIP file you downloaded and click **Install Now**.
6. After installation, click **Activate** to activate the Dowell Coordinates Plugin.

## Usage

### Front-End Display

To display the coordinates on the front-end of your website, you can use the following shortcode in your posts, pages, or theme files:
[dowell_coordinates]

This will render the map with the coordinates.

### Admin Area

In the WordPress admin area, you'll find a menu item called "Dowell Coordinates" under the "Appearance" menu. Clicking on it will take you to the Dowell Coordinates page.

On the Dowell Coordinates page, you'll see a map displayed along with options to manage the coordinates. Use the provided interface to add, edit, or delete coordinates as needed.

## Configuration
### Setting Map Size
- Customize the plugin's scripts and stylesheets located in the `react-front-end/dist/assets/` directory.
- Adjust the size of 'map-container' class to your liking. NOTE: Map only displays if the map container is given absolute hieght property

No additional configuration is required to use the Dowell Coordinates Plugin. However, if you wish to modify the plugin's behavior or appearance, you can customize the plugin's scripts and stylesheets located in the `react-front-end/dist/assets/` directory. Make sure to rebuild the assets using the appropriate build tools after making changes.

## Contributing

Contributions are welcome! If you encounter any issues or have suggestions for improvements, please open an issue in the [GitHub repository](https://github.com/DoWellUXLab/DoWell-Coordinates) or submit a pull request.

## License

This plugin is licensed under the GPL-2.0+ License. See the [LICENSE](LICENSE) file for more details.

## Credits

The Dowell Coordinates Plugin is developed and maintained by DoWellResearch. Visit the [DoWellUXLab GitHub repository](https://github.com/DoWellUXLab) for more information.

## Support

For support or inquiries, please contact the DoWellResearch team through the [GitHub repository](https://github.com/DoWellUXLab/DoWell-Coordinates).


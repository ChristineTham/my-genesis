# Visual Voyager Theme

![screenshot](https://github.com/hellotham/visual-voyager/raw/develop/screenshot.png)

GitHub project link: https://github.com/hellotham/visual-voyager/.

Live site: https://visualvoyager.net

## Installation Instructions

1. Upload the Visual Voyager theme folder via FTP to your wp-content/themes/ directory. (The Genesis parent theme needs to be in the wp-content/themes/ directory as well.)
2. Go to your WordPress dashboard and select Appearance.
3. Activate the Visual Voyager theme.
4. Inside your WordPress dashboard, go to Genesis > Theme Settings and configure them to your liking.

## Theme Support

Please visit https://hellotham.com/contact/ for theme support.

## For Developers

The version of [Visual Voyager on GitHub](https://github.com/hellotham/visual-voyager/) includes tooling to check code against WordPress standards. To use it:

1. Install Composer globally on your development machine. [See Composer setup steps](https://getcomposer.org/doc/00-intro.md#downloading-the-composer-executable).
2. In the command line, change directory to the Visual Voyager folder.
3. Type the command `composer install` to install PHP development dependencies.
4. Type `composer phpcs` to run coding standards checks.

You'll see output highlighting issues with PHP files that do not conform to Visual Voyager coding standards.

Run `composer phpcbf` if you see “phpcbf can fix the x marked sniff violations automatically” in the output of `composer phpcs`.

### npm scripts

Scripts are also provided to help with CSS linting, CSS autoprefixing, and creation of pot language files. To use them:

1. Install [Node.js](https://nodejs.org/), which also gives you the Node Package Manager (npm).
2. In the command line, change directory to the Visual Voyager folder.
3. Type the command `npm install` to install dependencies.

You can then type any of these commands:

- `npm run autoprefixer` to add and remove vendor prefixes in `style.css`.
- `npm run makepot` to regenerate the `languages/visual-voyager.pot` file.
- `npm run lint:css` to generate a report of style violations for `style.css`.
- `npm run lint:js` to generate a report of style violations for JavaScript files.
- `npm run fix:js` to fix any JavaScript style violations that can be corrected automatically.
- `npm run zip` to create a visual-voyager.zip. Files in the `excludes` array in `scripts/makezip.js` are omitted.

### Packaging for distribution

1. Follow the install instructions for npm scripts above.
2. Switch to the git branch you plan to distribute.
3. Bump version numbers manually and commit those changes.
4. Type `npm run zip` to create `visual-voyager.zip`. Files in the `excludes` array in `scripts/makezip.js` are omitted from the zip. `filename.md` files will be renamed to `filename.txt`.

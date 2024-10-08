# MediaPress

Fast & flexible publishing tools for WordPress

## Table of Contents

- [Description](#description)
- [Local Setup Instructions](#local-setup-instructions)
- [Build Scripts](#build-scripts)
- [Additional Configuration](#additional-configuration)
- [Supported Versions](#supported-versions)
- [File Structure](#file-structure)
- [Monorepo Considerations](#monorepo-considerations)
  - [Running Scripts](#running-scripts)

## Description

This is the monorepo for the MediaPress project.

Within the `/packages` directory you will find a combination of:

- Internal shared NPM packages (e.g Components, Utils, Hooks)
- Modules that can be enabled by the plugin
- Additional publishable services where required

The repo itself is a WordPress plugin that includes some core functionality to register a settings page and provide the ability for a user to enable any "modules" it detects.

## Local Setup Instructions

- Clone the repo
- Run `npm install`, `composer install` and `npm run build:prod` to install dependencies and build all packages
- Navigate to the package you're working on and run `npm run watch:dev` or equivalent

Ensure you open the workspace in your IDE from the root of the project, so that `phpcs` and `eslint` will work correctly.

> Note: Running `npm run watch:dev` from the root directory will allow you to watch the majority of packages at once since many of them share the same build script. However, it is recommended to work on only package at a time and run the watch command specific to the package(s) you're working on.

## Build Scripts

The following scripts are configured in the root project and will run across all packages:

- `npm run watch:dev` - watch/build JS files for development
- `npm run build:prod` - build JS files for production
- `npm run lint:js` - lint JS files
- `npm run lint:php` - lint PHP files
- `npm run test:unit:js` - run JS unit tests
- `npm run test:unit:php` - run PHP unit tests
- `npm run test:env:start` - start the local test containers
- `npm run test:env:reset` - reset the local test database
- `npm run test:env:stop` - stop the local test containers
- `npm run test:e2e` - run E2E tests
- `npm run test:e2e:ui` - launch E2E testing UI

### Monorepo considerations

NPM workspaces/Lerna allows us to orchestrate run certain commands across all packages at once, both locally and within CI. For example:

- `npm install` - will install all package dependencies, including linking internal dependencies. (using NPM Workspaces)
- `npm run watch:dev` - will run the `npm run watch:dev` command defined in each package in parallel. (using Lerna)
- `npm run build:prod` - will run the `npm run build:prod` command defined in each package in the order relevant to their dependencies. ie if a module uses a shared component, the component package will build first. (using Lerna)

A custom Composer script is included to allow us to run `composer` commands on all packages that contain a `composer.json`. This can be invoked alongside any Composer command, eg: `composer packages update`.

Running `composer install` in the project root will trigger `composer packages install` to run via `post-install-cmd`, causing Composer dependencies to also be installed across all packages.

The following tools have been configured globally so do not need to be installed/configured within each package:

When adding a new package, some tools require additional configuration:

- `phpunit` - you must add a test suite in the root `phpunit.xml.dist`
- `phpstan` - you must add your package paths in the root `phpstan.neon`
- `playwright` - you must add a project in the root `playwright.config.js`
- `composer` - you must update the autoloader in the root `composer.json`

## Additional Configuration

Individual modules/features can be enabled/disabled via the "MediaPress" settings page. Refer to the `/docs` of each package for information on each feature and any additional configuration required.

## Supported Versions

- Requires WordPress: _6.5_
- Tested up to: _6.5_
- Requires PHP: _8.2_
- Requires Node: _20_

## File Structure

The main directory structure of the project is as follows:

- `/packages` - Contains a combination of internal shared NPM packages, modules that can be enabled by the plugin, and additional publishable services where required.
- `/docs` - Contains the documentation for each package.
- `/inc` - PHP source code for the base plugin functionality, such as loading packages.
- `/tests` - Test coverage for the base plugin functionality.

## Monorepo Considerations

We're using NPM workspaces and Lerna for managing packages. Each directory within `/packages` represents a different package, with individual dependencies and build processes.

A "module" is simply how we refer to a package that extends the core plugin with additional functionality. If a package contains a `plugin.php` file in its root directory, we assume it is a module. When a module is enabled, we will `require` this file.

Modules are structured just like standalone plugins, so by requiring the `plugin.php` file we expect additional files/classes to be loaded, scripts to be enqueued, etc.

### Running Scripts

Both `npm` and `composer` scripts have been customised to operate across packages when they are ran from the root of the project.

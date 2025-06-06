## Modules Overview

This document provides a high‐level summary of all modules in the project. Wherever possible, modules are designed to be
reusable and self-contained. Developers should avoid modifying core logic; most customization happens in Blade views or
configuration files.

This repository makes heavy use of [nwidart/laravel-modules](https://github.com/nWidart/laravel-modules), for more
documentation about laravel-modules [click here](https://laravelmodules.com/docs/12/getting-started/introduction)

and also [mhmiton/laravel-modules-livewire](https://github.com/mhmiton/laravel-modules-livewire)

---

### Table of Contents

1. [Core](#core)
2. [Themes](#themes)

    1. [Flowbite](#flowbite)
    2. [Custom Theme](#custom-theme)
3. [Authentication & Registration](#authentication--registration)

    1. [Auth Module](#auth-module)
    2. [WebAuthn Module](#webauthn-module)
    3. [ClassicAuth Module](#classicauth-module)
4. [Reusable General Modules](#reusable-general-modules)

    1. [Page](#page)
    2. [Contact](#contact)
    3. [OnboardUser](#onboarduser)
5. [Project-Specific Modules](#project-specific-modules)

    1. [Browser](#browser)
    2. [Profile](#profile)
    3. [Settings](#settings)
    4. [Statistics](#statistics)
    5. [Testimonial](#testimonial)

---

## Core

> [!IMPORTANT]
> **Notice:** Do **not** delete any composer or npm packages

The **Core** module contains foundational code shared across the application. Outside of the `Modules/` directory, we
strive to keep Laravel’s default files unchanged. In the Core module, you will find:

* **Composer & NPM Dependencies**

    * All required PHP packages are declared in `Core/composer.json`.
    * All frontend dependencies and build scripts are declared in `Core/package.json`.

* **Route Service Provider Enhancements**

    * Global rate limiters and middleware are defined for consistent behavior across modules.

* **User Model Extensions**

    * Common traits (from various modules) are aggregated here.
    * Adjustments to the `users` table schema (e.g., adding new columns) happen in Core migrations.

* **Convenience Commands**

    * Custom Artisan commands that speed up development workflows (e.g., seeding, setup).

---

## Themes

These modules provide reusable UI components and layouts.

> [!IMPORTANT]
> **Note:** You should **not** modify Livewire logic here—only adjust Blade templates as needed.

### Flowbite

* **Purpose**: Integrate Flowbite’s component library (paid subscription) into the project.
* **Contents**:

    * Prebuilt Blade/Livewire stubs for Flowbite components (buttons, forms, cards, etc.).
    * Asset files (SVGs, icons, illustrations) pulled from Flowbite.
* **Usage**:

    * Drop Flowbite components into pages for a consistent design system.
    * Do not alter Livewire logic; override only Blade views or CSS classes.

### Custom Theme

* **Purpose**: Extend or customize Flowbite components and add custom UI pieces not provided by Flowbite.
* **Contents**:

    * Custom Blade layouts (e.g., page wrappers, section templates).
    * Additional CSS/JS for bespoke UI elements (e.g., custom modals, hero sections).
* **Usage**:

    * Use as a base for page‐specific design (header, footer, utility classes).
    * Update text, swap out components, or add new blocks without touching core modules.

---

## Authentication & Registration

These modules handle all user authentication flows.

> **Note:** They are reusable—only Blade views (form layout,
> styling) should be changed, not business logic.<br>

> [!IMPORTANT]
> **Do enable both WebAuthn or ClassicAuth** because they share the same route names, enable only one of the two.<br>
> **All mentioned modules depend on:** Flowbite, CustomTheme for the input fields, layouts, icons, svg's,

### Auth Module

> [!IMPORTANT]
> **Keep always enabled**

* **Purpose**: Manage email verification, password resets, and passkey recovery flows.
* **Features**:

    * Livewire component for “Verify Email” (using a `VerifyMail` form).
    * Controller endpoints to handle email verification links.
    * Shared Blade view for “Forgot Password” and “Lost Passkey” forms.
* **Usage**:

    * Enable this module for most projects; it covers core account‐verification steps.

### WebAuthn Module

> [!IMPORTANT]
> **Depends on:** Auth for forgot blade view
> <br>**Notice:** Will only work with https scheme

* **Purpose**: Provide passkey‐based authentication (FIDO2/WebAuthn).
* **Dependencies**:
    * **[spatie/laravel-passkeys](https://spatie.be/docs/laravel-passkeys/v1/introduction)**  This package provides a
      simple way to generate passkeys and authenticate your users using passkeys

* **Features**:

    * Livewire forms and pages for:

        * Login with passkey
        * Register passkey
        * Lost passkey (recover process)
        * Reset passkey (unlink/regenerate)
        * Passkey instructions / help wizard
        * Add more passkeys at account settings
* **Usage**:

    * Include when you want passwordless login or multi‐factor flows.
    * Because WebAuthn is new to many users, this module contains instructional UI.

### ClassicAuth Module

> [!IMPORTANT]
> **Depends on:** Auth for forgot blade view

* **Purpose**: Traditional email/password login and registration flows (non‐passkey).
* **Features**:

    * Livewire forms and pages for:

        * Login (email + password)
        * Registration (email + password)
        * Forgot password form
        * Reset password form
* **Usage**:

    * Use instead of WebAuthn, depending on project requirements.


* **Todo**:

    * Add passkeys to ClassicAuth as extra option with Spatie laravel keys package.

---

## Reusable General Modules

These modules are generic functionality that any project might reuse. They do not depend on business‐specific logic and
can be copied to other apps with minimal changes.

> [!IMPORTANT]
> **All mentioned modules depends on:** Flowbite, CustomTheme for the input fields, layouts, icons, svg's

### Page

* **Purpose**: Handle static or informational pages (e.g., About, Terms, Privacy).
* **Contents**:

    * Livewire components for CRUD of static pages, if desired.
    * Blade templates to render static content from the database or markdown files.
* **Usage**:

    * Ideal for any “static page” needs. Just add a new record and create the view block.

### Contact

* **Purpose**: Provide a “Contact Us” form that stores submissions in the database.
* **Features**:

    * Livewire component (`ContactForm`) with validation.
    * Migration for a `contacts` table to store form entries.
    * (Optional) Admin section to view/reply to messages.
* **Usage**:

    * Prevents project owners from receiving direct emails—instead, manage inquiries via dashboard.

### OnboardUser

* **Purpose**: Guide new users through a multi‐step onboarding flow.
* **Dependencies**:
    * **[spatie/laravel-onboarding](https://github.com/spatie/laravel-onboard)**  A Laravel package to help track user
      onboarding steps.
* **Features**:
    * Livewire pages for each onboarding step (profile setup, preferences, etc.).
    * Middleware to redirect incomplete users to the next step.
    * Trait that adds an “onboarding\_steps” column (JSON) to the `users` table.
* **Usage**:
    * Use when you need to collect profile details, preferences, or consents in a guided flow.

---

## Project-Specific Modules

These modules implement features unique to this application’s domain (e.g., a social/browsing site). They rely on
project models and business logic, so they are not as reusable in other contexts.

> [!IMPORTANT]
> **All mentioned modules depends on:** Flowbite, CustomTheme for the input fields, layouts, icons, svg's

### Browser

* **Purpose**: Core browsing and matching functionality—where users “swipe,” “like,” or browse profiles.
* **Dependencies**:
    * **Meilisearch** + **Laravel Scout** for advanced filtering and full‐text search on profiles.

* **Contents**:

    * Livewire components for listing, filtering, and paginating profiles.
    * Custom search indexes (Meilisearch) and Scout configurations.

### Profile

* **Purpose**: Manage user profiles, including extended metadata (bio, interests, photos).
* **Contents**:

    * `Profile` Eloquent model (one‐to‐one with `User`).
    * Migrations: additional tables/columns related to profiles (e.g., `profiles`, `profile_photos`).
    * Factories & seeders to generate sample profile data.
* **Usage**:

    * Automatically loaded when a user registers (either via ClassicAuth or WebAuthn).

### Settings

* **Purpose**: Provide user settings and preferences interface (account, privacy, notifications).
* **Contents**:

    * Multiple Livewire pages:

        * **Account Settings** (email, password, passkeys)
        * **Profile Settings** (edit profile fields, upload photos)
        * **Preferences** (notification toggles, privacy options)
    * Blade templates and validation logic.
* **Usage**:

    * Mount this module to give users full control over their account and profile data.

> [!IMPORTANT]
> **Depends on:** WebAuthn if Webauthn is enabled for settings > account > passkeys component

### Statistics

* **Purpose**: Publicly display site metrics or user‐facing stats (e.g., number of active users, matches made).
* **Features**:

    * Livewire component to fetch and render real‐time or cached statistics.
    * Optional caching logic (e.g., using Laravel cache/Redis/Valkey).
* **Usage**:

    * Place the component on a public “Statistics” page or dashboard section.

### Testimonial

* **Purpose**: Allow users to submit testimonials/reviews; provide an admin UI to approve and publish them.
* **Contents**:

    * `Testimonial` model + migration.
    * Livewire component (`TestimonialForm`) for user submissions.
    * Admin Livewire page to review, approve, or reject testimonials.
    * Blade snippet to embed published testimonials on the homepage or other marketing pages.
* **Usage**:

    * Display user testimonials in a carousel or grid on the homepage.

---

## How to Contribute

1. **Add new functionality**:

    * Create a new module under `Modules/YourModuleName`.
    * Follow the directory structure (Models, Migrations, Livewire, Views, Routes).
    * Register your module’s ServiceProvider in `config/app.php` (or use package auto-discovery).

2. **Modify existing modules**:

    * **Core Logic**: Try to avoid changing business logic in reusable modules. If necessary, document your changes and
      consider abstracting differences.
    * **Blade Views**: Feel free to update templates (e.g., for theming or layout tweaks).

3. **Testing & Quality**:

    * Write PHPUnit or Pest tests for any new module logic.
    * Ensure Livewire component tests (using Laravel’s `Livewire::test(...)`) cover all edge cases.
    * Run `php artisan test` before pushing changes.

4. **Documentation**:

    * Update this README (or create a per-module README in `Modules/ModuleName/README.md`).
    * Provide code examples for configuration, usage, and any required environment variables.

By following these guidelines, you’ll keep the codebase modular, maintainable, and easy to onboard new developers. Happy
coding!

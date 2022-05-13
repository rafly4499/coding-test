# Coding Test

Do you want to join the engineering team at Connect, Inc.? Apply [here](https://forms.gle/PKDJNAdAgKn32DXC7) if you have not do.

We have created this coding test in order to gain insights into your development skills. More details are down below.

## Table of Contents

- [Procedure](#procedure)
- [Get Started](#get-started)
  - [Requirements](#requirements)
  - [Setup](#setup)
  - [Executing](#executing)
  - [Testing](#testing)
  - [Architecture](#architecture)
- [Specifications](#specifications)
  - [APIs](#APIs)
  - [APIs in the future](#apis-in-the-future)

# Procedure

1. Fork this repository

2. [Design and Refactor](https://github.com/connect-developer/coding-test/wiki)

Please go to this URL and read this through. It explains more details of this coding test and imaginary scenario.

3. Make a Pull Request

Don't create a pull request to this repository. Please make a pull request on your repository.

4. Send us your Pull Request url that we can access

# Get Started

## Requirements

- [Docker](https://docs.docker.com/desktop/)
- [Composer](https://getcomposer.org/)

## Setup

```
$ cp .env.example .env
$ composer install
```

## Executing

Here is the case with Laravel sail. It depends on you.

```
$ ./vendor/bin/sail up
$ ./vendor/bin/sail artisan key:generate
$ ./vendor/bin/sail artisan migrate:fresh --seed
```

## Testing

Here is the case with Laravel sail. It depends on you.

```
$ ./vendor/bin/sail artisan test
```

## Architecture

```mermaid
flowchart LR
  Request -- Parameters --> c[Controller]
  c --> m[Model]
  m -- Data --> c
  c -- Resource -->  Resource
```

# Specifications

This repository provides an API for admins to create and publish job data.

## APIs

- Public
  - `GET /api/jobs`: Get a list of opening jobs
  - `GET /api/jobs/{id}`: Retrieve a opening job by its id
- Admin
  - `POST /api/admin/login`: Log in
  - `POST /api/admin/logout`: Log out
  - `GET /api/admin/me`: Get currently logged in user data
  - `GET /api/admin/jobs`: Get a list of jobs
  - `GET /api/admin/jobs/{id}`: Retrieve a job by its id
  - `POST /api/admin/jobs`: Create a job
  - `PUT /api/admin/jobs/{id}`: Update the job
  - `DELETE /api/admin/jobs/{id}`: Delete the job

## APIs in the future

Our clients want companies to register their jobs as well. So, we need to provide some APIs:

:warning: **You don't need to implement these apis, but refactor current code for the future.** :warning:

- Company
  - `POST /api/company/login`: Log in
  - `POST /api/company/logout`: Log out
  - `GET /api/company/me`: Get currently logged in user data
  - `GET /api/company/jobs`: Get a list of their jobs
  - `GET /api/company/jobs/{id}`: Retrieve a their job by its id
  - `POST /api/company/jobs`: Create a job
  - `PUT /api/company/jobs/{id}`: Update a job
  - `DELETE /api/company/jobs/{id}`: Delete a job

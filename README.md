<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# API Documentation

This document provides an overview of the endpoints available in the application's API.

## Authentication

### POST /api/auth/login
- Logs in a user.
- Requires `email` and `password` fields in the request body.
- Returns an access token upon successful login.

### POST /api/auth/register
- Registers a new user.
- Requires `name`, `email`, and `password` fields in the request body.

### POST /api/auth/logout
- Logs out the authenticated user.
- Requires a valid access token in the request headers.

### POST /api/auth/refresh
- Refreshes the user's access token.
- Requires a valid refresh token in the request body.

## Categories

### GET /api/categories
- Retrieves a list of all categories.

### POST /api/categories
- Creates a new category.
- Requires `name` and `slug` fields in the request body.
- Requires authentication.

### GET /api/categories/{category:slug}
- Retrieves details of a specific category by slug.

### PUT /api/categories/{category:slug}
- Updates an existing category.
- Requires `name` and `slug` fields in the request body.
- Requires authentication.

### DELETE /api/categories/{category:slug}
- Deletes a category by slug.
- Requires authentication.

## Tags

### GET /api/tags
- Retrieves a list of all tags.

### POST /api/tags
- Creates a new tag.
- Requires `name` and `slug` fields in the request body.
- Requires authentication.

### GET /api/tags/{tag:slug}
- Retrieves details of a specific tag by slug.

### PUT /api/tags/{tag:slug}
- Updates an existing tag.
- Requires `name` and `slug` fields in the request body.
- Requires authentication.

### DELETE /api/tags/{tag:slug}
- Deletes a tag by slug.
- Requires authentication.

## Posts

### GET /api/posts
- Retrieves a list of all posts.

### POST /api/posts
- Creates a new post.
- Requires various fields in the request body.
- Requires authentication.

### GET /api/posts/{post:slug}
- Retrieves details of a specific post by slug.

### PUT /api/posts/{post:slug}
- Updates an existing post.
- Requires various fields in the request body.
- Requires authentication.

### POST /api/posts/{post:slug}/archive
- Archives a post.
- Requires authentication.

### DELETE /api/posts/{post:slug}
- Deletes a post by slug.
- Requires authentication.

### PATCH /api/posts/{post:slug}/restore
- Restores a previously archived post.
- Requires authentication.

### GET /api/posts/archived
- Retrieves a list of archived posts.
- Requires authentication.

## Comments

### POST /api/post/{post:slug}/comments
- Adds a comment to a post.
- Requires authentication.

### DELETE /api/post/{post:slug}/comments
- Deletes a comment from a post.
- Requires authentication.

## Followers

### POST /api/followers/{user:username}
- Follows a user by username.
- Requires authentication.

### DELETE /api/followers/{user:username}
- Unfollows a user by username.
- Requires authentication.

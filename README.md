# Laravel Hierarchical Data - 3 Tree Structures Compared

[![CI](https://github.com/tegos/laravel-hierarchical-data/actions/workflows/ci.yml/badge.svg)](https://github.com/tegos/laravel-hierarchical-data/actions/workflows/ci.yml)
[![PHP](https://img.shields.io/badge/PHP-8.3%2B-777BB4?logo=php&logoColor=white)](composer.json)
[![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?logo=laravel&logoColor=white)](https://laravel.com)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%205-4F5B93)](phpstan.neon)
[![Code Style](https://img.shields.io/badge/code%20style-Pint-F4645F)](pint.json)
[![Rector](https://img.shields.io/badge/refactoring-Rector-2563EB)](rector.php)
[![License](https://img.shields.io/badge/license-MIT-green)](composer.json)
[![Article](https://img.shields.io/badge/dev.to-article-0A0A0A?logo=devdotto&logoColor=white)](https://dev.to/tegos/managing-hierarchical-data-in-laravel-b9k)

![Managing Hierarchical Data in Laravel](assets/poster.jpg)

This repository accompanies the article **[Managing Hierarchical Data in Laravel](https://dev.to/tegos/managing-hierarchical-data-in-laravel-b9k)**.
It provides practical implementations and benchmarks for three prominent techniques used to store and query hierarchical (tree-structured) data within the Laravel framework.

## Hierarchical Structures Included

1. **Recursive Eloquent Relationships** (native Laravel approach)
2. **Adjacency List** (powered by [`staudenmeir/laravel-adjacency-list`](https://github.com/staudenmeir/laravel-adjacency-list))
3. **Nested Set Model** (using [`kalnoy/nestedset`](https://github.com/lazychaser/laravel-nestedset))

Each implementation uses a sample dataset consisting of **1,000 auto part categories** to illustrate real-world scalability and performance.

## Getting Started

### Prerequisites

* Docker
* PHP 8.3+, Composer, Laravel 13

### Installation (Dockerized)

```bash
git clone https://github.com/tegos/laravel-hierarchical-data.git
cd laravel-hierarchical-data
cp .env.example .env
docker compose up -d --build
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate --seed
```

## API Endpoints

All endpoints output the complete category tree in JSON format.

| Structure          | HTTP Method | Endpoint                                     |
|--------------------|-------------|----------------------------------------------|
| Recursive Eloquent | `GET`       | `/api/v1/catalog/categories/tree-recursive`  |
| Adjacency List     | `GET`       | `/api/v1/catalog/categories/tree-adjacency`  |
| Nested Set         | `GET`       | `/api/v1/catalog/categories/tree-nested-set` |

## Benchmarking

To compare the performance of each retrieval strategy, execute:

```bash
docker compose exec app php artisan catalog:category-benchmark-tree
```

The command returns execution times for all supported methods.

Additional maintenance commands:

```bash
# Rebuild nested set lft/rgt values
docker compose exec app php artisan catalog:category-repair-tree

# Print random category paths (adjacency list ancestors)
docker compose exec app php artisan catalog:category-random-path
```

## Quality Pipeline

A single command runs the whole pipeline (same entrypoint as CI):

```bash
docker compose exec app composer test
```

It executes, in order:

| Script            | Tool                                  |
|-------------------|---------------------------------------|
| `test:unit`       | PHPUnit feature tests                 |
| `test:types`      | PHPStan (larastan, level 5)           |
| `test:lint`       | Pint style check                      |
| `test:rector`     | Rector dry-run (PHP 8.3 + Laravel sets) |
| `test:class-leak` | Unused class detection                |

Auto-fixers: `composer lint` (Pint) and `composer rector`.

## Docker Compose Services

* `app` – Laravel PHP 8.4 app container
* `nginx` – Web server (accessible via `localhost:8000`)
* `mysql` – MySQL 8.0 database

For the complete configuration, refer to [`docker-compose.yml`](./docker-compose.yml).

## Learn More in the Article

Further technical explanation and usage details are available in the article:

👉 **[Managing Hierarchical Data in Laravel](https://dev.to/tegos/managing-hierarchical-data-in-laravel-b9k)**

Contents include:

* Technical breakdowns and code samples for each tree structure in Laravel
* Comparative analysis of recursive, adjacency list, and nested set models
* Benchmark data using over 1,000 product categories
* Guidance for selecting the optimal strategy for your API or catalog implementation

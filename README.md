# Laravel Hierarchical Data - 3 Tree Structures Compared

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
* PHP 8.2+, Composer, Laravel 12

### Installation (Dockerized)

```bash
git clone https://github.com/tegos/laravel-hierarchical-data.git
cd laravel-hierarchical-data
cp .env.example .env
docker compose up -d --build
docker compose exec app composer install
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
php artisan catalog:category-benchmark-tree
```

The command returns execution times for all supported methods.

## Docker Compose Services

* `app` – Laravel PHP 8.2 app container
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

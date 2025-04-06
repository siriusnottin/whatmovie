# What Movie?

Watchlist for your movies and TV Shows.

## Languages and Tools

PHP-Apache, MariaDB, Docker, Vite, TailwindCSS, Sass.

## Development

The docker is based on the [php Official Image](https://hub.docker.com/_/php), but with some modifications to make it work with Vite.

```bash
docker compose up --build -d

# Import database
docker exec -i whatmovie_db_1 mysql -uroot -proot whatmovie < db.sql
```

### Database

The database schema is in the `db.dbml` file. You can use [dbdiagram.io](https://dbdiagram.io) to visualize it.

Open your browser and go to:

- [http://localhost:8080](http://localhost:8080)

## Ressources

- [Production Tuning Docker PHP Images](https://www.youtube.com/watch?v=OrYQO57ygqY)
- [donnikitos/vite-plugin-php: Vite's speed and tooling to preprocess PHP-files!](https://github.com/donnikitos/vite-plugin-php)
- [nititech/php-vite-starter: A modern vanilla PHP-Vite starter repo, utilizing vite-plugin-php](https://github.com/nititech/php-vite-starter)
- [andrefelipe/vite-php-setup: Example on how to run Vite on traditional PHP sites](https://github.com/andrefelipe/vite-php-setup)

# What Movie?

Watchlist for your movies and TV Shows.

## Languages and Tools

- PHP-Apache (docker image), MariaDB, Docker

**Frontend Tools**
-  TailwindCSS, Sass.

**Design**
- Figma
- [coolicons](https://coolicons.cool/)

## Project Structure

```markdown
/whatmovie
├── /app
│   ├── /pages            # Main pages of the site
│   │   ├── /account      # User account-related pages (signin, signup, etc.)
│   │   ├── /movies       # Movie-related pages (discovery, details, etc.)
│   │   ├── /tvshows      # TV show-related pages
│   │   └── home.php      # Homepage
│   ├── /partials         # Reusable fragments (header, footer, etc.)
│   ├── /public           # Publicly accessible files (images, compiled JS, CSS)
│   │   ├── /uploads      # User-uploaded images (posters, logos, etc.)
│   │   ├── /css
│   │   ├── /js
│   │   └── logo.svg
│   ├── /raw              # Raw files (Apache config, error files, etc.)
│   │   ├── /apache
│   │   └── /php
│   ├── /src              # Uncompiled sources (CSS, JS, etc.)
│   │   ├── /styles
│   │   ├── /scripts
│   │   └── /fonts
│   ├── /database         # Database-related scripts or files
│   │   ├── database_schema.sql
│   │   └── database_schema.dbml
│   ├── Dockerfile
│   ├── .env.example
│   ├── .gitignore
│   ├── index.php         # Main entry point
│   └── compose.yaml      # Docker Compose file
├── README.md             # Main documentation
```

## Development

The docker is based on the [php Official Image](https://hub.docker.com/_/php), but with some modifications to make it work with Vite.

```bash
docker compose up -d

# Import database
docker exec -i whatmovie_db_1 mysql -uroot -proot whatmovie < app/database/database_schema.sql
```

### Database

The database schema is in the `app/database/database.dbml` file. You can use [dbdiagram.io](https://dbdiagram.io) to visualize it.

Open your browser and go to:

- [http://localhost:8080](http://localhost:8080)

## Ressources

- [Production Tuning Docker PHP Images](https://www.youtube.com/watch?v=OrYQO57ygqY)

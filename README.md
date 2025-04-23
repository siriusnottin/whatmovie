# What Movie?

Watchlist for your movies and TV Shows.

## Languages and Tools

- Docker
- PHP
- MariaDB
- Apache

**Frontend Tools**

- Tailwind
- Sass

**Design**

- Figma
- [coolicons](https://coolicons.cool/)

**Fonts**

- [Rubik](https://hfs-studio.com/rubik/)
- [Inter](https://rsms.me/inter/)

## Project Structure

```markdown
/whatmovie
│
├── /app
│
├── /classes              # Contains all the PHP classes used for core functionality,
│   ├── /Core               business logic, entity representation, and utility tasks.
│   ├── /Models
│   ├── /Controllers
│   └── /Utils
│   │
│   ├── /templates        # Base templates for the site
│   │
│   ├── /partials         # Reusable fragments (header, footer, etc.)
│   │
│   ├── /pages            # Main pages of the site
│   │   │
│   │   ├── /account
│   │   ├── /movies
│   │   ├── /tvshows
│   │   └── home.php      # Homepage
│   │
│   ├── /public           # Publicly accessible files (images, compiled JS, CSS)
│   │   │
│   │   ├── /uploads      # User-uploaded images (posters, logos, etc.)
│   │   ├── /css
│   │   ├── /js
│   │   └── logo.svg
│   │
│   ├── /raw              # Raw files (Apache config, error files, etc.)
│   │   │
│   │   ├── /apache
│   │   └── /php
│   │
│   ├── /src              # Uncompiled sources (CSS, JS, etc.)
│   │   │
│   │   ├── /styles
│   │   ├── /scripts
│   │   └── /fonts
│   │
│   ├── /database
│   │   │
│   │   ├── schema.sql    # SQL schema file (used in the build process)
│   │   └── schema.dbml   # DBML file for visualizing the database schema
│   │
│   ├── Dockerfile
│   ├── .env.example
│   ├── index.php         # Main application entry point
│
├── .gitignore
├── compose.yaml
└── README.md
```

## Development

The server that runs both PHP and Apache is based on the [PHP official image](https://hub.docker.com/_/php) on DockerHub, but with some modifications to fit this project's needs. You can explore the [`Dockerfile`](/app/Dockerfile) for more details.

## Building the Project

```bash
# Copy the .env.example file to .env
# Edit the .env file to your needs
cp app/.env.example app/.env

# Build the Docker containers
docker compose up --build -d

# Install dependencies
npm install
```

### Database

The database is automatically created when the Docker containers are built. However, you can also manually import a database schema or a database dump if needed:

```bash
# Import the database schema
docker exec -i whatmovie-db-1 mysql -uroot -proot whatmovie < app/database/schema.sql

# Import a database dump
docker exec -i whatmovie-db-1 mysql -uroot -proot whatmovie < app/database/dump.sql
```

The database schema is defined in the [`schema.dbml`](/app/database/schema.dbml) file. This DBML file provides a clear and simple way to describe the database structure. It can be used to generate SQL files or to visualize the relationships between tables.

For the most up-to-date version of the schema, refer to the cloud-hosted version:

[View the schema on dbdiagram.io](https://dbdiagram.io/d/WhatMovie-67e54abd4f7afba184712d2e)

## Running the Project

```bash
# Start the Docker containers
docker compose up -d

# Start compiling styles
npm run dev
```

Open your browser and go to:

- [http://localhost:8080](http://localhost:8080)

## See the server logs

```bash
docker logs -f whatmovie-web-1 | bat --paging=never -l log
```

## Screenshots

You can find the screenshots of the project in the [`screenshots`](/screenshots) folder. These images showcase the design and functionality of the application.

## Ressources

- [Production Tuning Docker PHP Images](https://www.youtube.com/watch?v=OrYQO57ygqY)
- [nititech/php-vite-starter: A modern vanilla PHP-Vite starter repo, utilizing vite-plugin-php](https://github.com/nititech/php-vite-starter/tree/master#) inspo for the project's structure.

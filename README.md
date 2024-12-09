# WordPress Dev

## Use this wp repo

### Use container for development

- install wsl and ubuntu
- install docker
- `docker compose up` or `docker compose up -d` for detached mode
- `http://localhost:8000/wp-admin/`

### Access / dump database

Show db in client (e.g. datagrip):

- host: `localhost`
- port : `3309`

Create db mysqldump:

```bash
docker ps
docker exec <container_id> sh -c 'exec mysqldump -u"username" -p"password" database_name' > database_backup.sql
docker exec my-mysql-container sh -c 'exec mysqldump -uroot -psomewordpress wordpress' > database_backup.sql
```

## General WP remarks

- Files system [link](https://www.youtube.com/watch?v=Bz-UB_KjufU)

### Plugins

Example:

- in PLugin Folder, generate PHP file (see Hello world example)
- under Plugins in <http://localhost:8000/wp-admin/> activate and see output in footer

## Deployment to prod

### Manually

- `ssh user@your-production-server.com` ...SSH into Your Production Server
- `cd /var/www/html` ...Navigate to Your Web Root Directory
- `git clone https://github.com/your-username/my-wp-site.git .` ...clone repo

### CI/CI

e.g. github workflow. SSH private key as a secret in GitHub repository.

```sh
name: Deploy to Production

on:
  push:
    branches:
      - main

jobs:
  deploy:
    runs-on: ubuntu-latest

    steps:
      - name: Checkout code
        uses: actions/checkout@v2

      - name: Set up SSH
        uses: webfactory/ssh-agent@v0.5.3
        with:
          ssh-private-key: ${{ secrets.SSH_PRIVATE_KEY }}

      - name: Deploy to Server
        run: |
          ssh user@your-production-server.com 'cd /var/www/html && git pull origin main && composer install && npm install && npm run build'
```

### Post-Deployment Steps

- **Run Database Migrations** (if applicable): If you're using a tool like WP Migrate DB or a custom migration script, run it to update your production database.
- **Clear Cache**: Clear any caching plugins or CDN caches to ensure the latest changes are reflected.
- **Verify Deployment**: Visit your production site and verify that everything is working as expected.
- ``
- ``
- ``
- ``
- ``
- ``

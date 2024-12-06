# WordPress Dev

- install wsl and ubuntu
- install docker
- `docker compose up`
- `http://localhost:8000/wp-admin/`

## WP remarks

- files system [link](https://www.youtube.com/watch?v=Bz-UB_KjufU)

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

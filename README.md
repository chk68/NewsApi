
1. **Composer:**

    ```bash
   composer require laravel/sail --dev
    ```

2. **Choose 2(mysql),3,5,7**

    ```bash
   php artisan sail:install --devcontainer
    ```

3. **Add to .env:**

    ```bash
    APP_SERVICE=web
    APP_PORT=50000
    FORWARD_DB_PORT=50001
    FORWARD_REDIS_PORT=50002
    FORWARD_MEILISEARCH_PORT=50003
    FORWARD_MAILHOG_PORT=50004
    FORWARD_MAILHOG_DASHBOARD_PORT=50005
    VITE_PORT=50006
    ```

4. **Docker up:**

    ```bash
    alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
    sail up -d
    ```
   
5. **How to use**
   ```bash
   Search "HOW TO USE.txt" in project. 
      ```


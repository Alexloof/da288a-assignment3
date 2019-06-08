# da288a-assignment3

[![Build Status](https://dev.azure.com/ag8190/molnbutiken/_apis/build/status/Alexloof.da288a-assignment3?branchName=master)](https://dev.azure.com/ag8190/molnbutiken/_build/latest?definitionId=1&branchName=master)

Live at: [https://molnbutiken2.azurewebsites.net/](https://molnbutiken2.azurewebsites.net/)

#### Start locally

##### This project was built developed with XAMPP 7.3.5 and Composer 1.8.4

Open XAMPP and start the modules Apache and MySQL

Open a browser window and visit localhost/phpmyadmin/
Create a database with a given name (ex Laravel)
Make sure the database configs in your .env file matches the database setup.

Open a terminal and navigate to the project folder and run the following commands.

##### Install dependencies

```
composer install
```

##### Create the database tables and seed data

```
php artisan migrate:refresh --seed
```

##### Start the application

```
php -S localhost:8000 -t public
```

## Production information

The app and database is deployed in Azure using Azure DevOps.

Configured with Docker and Docker-compose.

Azure CI is running all test cases before building and pushing containers to Azure Registery.

Azure CD is not configured with "Azure release pipeline" due the bad support for docker-compose.
Azure release with the "Azure App Service Deploy task" seems to override the container settings on the App service instance.

More info (without solution): [https://stackoverflow.com/questions/54670525/azure-app-service-deploy-release-azure-devops-overwrites-the-multi-container-d](https://stackoverflow.com/questions/54670525/azure-app-service-deploy-release-azure-devops-overwrites-the-multi-container-d)

Instead the CD is configured with the the "continues deployment webhook url" from the App Service instance. When Azure DevOps build is finished and the docker images are pushed to Azure Registery the Azure Service instance gets redeployed.

Another workaround could be to configure the laravel app using a single Dockerfile instead of using Docker-compose.

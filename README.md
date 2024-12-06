# Job offer for Town Hall Bundle

![GitHub release (with filter)](https://img.shields.io/github/v/release/Pixel-Mairie/sulu-townhalljobofferbundle)
[![Dependency](https://img.shields.io/badge/sulu-2.6-cca000.svg)](https://sulu.io/)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=Pixel-Mairie_sulu-townhalljobofferbundle&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=Pixel-Mairie_sulu-townhalljobofferbundle)

## Presentation
A Sulu bundle to manage job offers.

## Features

* Job offer management
* List of job offers (via smart content)
* Activity log
* Trash

## Requirement
* PHP >= 8.1
* Symfony >= 5.4
* Composer

## Installation
### Install the bundle

Execute the following [composer](https://getcomposer.org/) command to add the bundle to the dependencies of your
project:

```bash
composer require pixelmairie/sulu-townhalljobofferbundle
```

### Enable the bundle

Enable the bundle by adding it to the list of registered bundles in the `config/bundles.php` file of your project:

 ```php
 return [
     /* ... */
     Pixel\TownHallJobOfferBundle\TownHallJobOfferBundle::class => ['all' => true],
 ];
 ```

### Update schema
```shell script
bin/console do:sch:up --force
```

## Bundle Config

Define the Admin Api Route in `routes_admin.yaml`
```yaml
townhall.jobs_offers_api:
  type: rest
  prefix: /admin/api
  resource: pixel_townhall.jobs_offers_route_controller
  name_prefix: townhall.
``` 

## Use
### Add/Edit
Go to the "Town hall" section in the administration interface. Then, click on "Job offer".
To add, simply click on "Add". Fill the fields that are needed for your use.

Here is the list of the fields:
* Name (mandatory)
* Description (mandatory)
* Contract type (mandatory)
* Duration
* Published at (mandatory)
* PDF file

Once you finished, click on "Save".

The job offer you added is not visible on the website yet. In order to do that, click on "Activate?". It should be now visible for visitors.

To edit, simply click on the pencil at the left of the job offer you wish to edit.

### Remove/Restore

There are two ways to remove a job offer:
* Check every job offer you want to remove and then click on "Delete"
* Go to the detail of a job offer (see the "Add/Edit" section) and click on "Delete".

In both cases, the job offer will be put in the trash.

To access the trash, go to the "Settings" and click on "Trash".
To restore a job offer, click on the clock at the left. Confirm the restore. You will be redirected to the detail of the job offer you restored.

To remove permanently an job offer, check all the job offers you want to remove and click on "Delete".

## Contributing

You can contribute to this bundle. The only thing you must do is respect the coding standard we implement.
You can find them in the `ecs.php` file.

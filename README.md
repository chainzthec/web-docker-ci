# web-docker-ci

## Introduction

This repository contains a blog application called "blog.io", that uses docker to run.
dockerize-everything's purpose is to test if our team is able to use Docker, Git and continuous integration using a Feature Branch Workflow.

### Git Worflow

This project uses Feature Branch + Merge Requests. Since we are only three contributors for the moment the number of Merge Requests is not close at all to the number of commits.

## Quick start

To launch the application all you have to do is position yourself to the root of the application and launch in your command line:

```
docker-compose up
```

Then you update settings file in ```src/core/setting.json``` and change database host with your ip address : ```"db_host": "your IP"``` and save this file

Then you need to setup the application with the script in ```src/misc/blog_io.sql``` that you can import on phpMyAdmin at
```http://localhost:8080```.

After this step, you can immediately go to your favorite link ```http://localhost:80``` or ```http://localhost``` and enjoy the application.


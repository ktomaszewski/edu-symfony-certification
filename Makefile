.DEFAULT_GOAL := help

SILENT_MAKE = @$(MAKE) -s

docker_container_php = sc_php

.PHONY: help
help:
	@echo 'Please select one of the rules from the Makefile 🔨';
	@echo "--------------------------------------------------------"
	@echo "| make help     | Show this help table                  |"
	@echo "| make up       | Start containers                      |"
	@echo "| make down     | Stop containers                       |"
	@echo "| make restart  | Stop and start containers             |"
	@echo "| make build    | Build and start app                   |"
	@echo "| make php      | Enter bash on PHP container           |"
	@echo "| make secret   | Generate a secret e.g. for APP_SECRET |"
	@echo "| make cache    | Clear and warmup cache                |"
	@echo "| make security | Check app security                    |"
	@echo "--------------------------------------------------------"
	@echo ""
	@echo 'To start a project for the first time use "make build" 🔨'

.PHONY: .server-info
.server-info:
	@echo ""
	@echo "Application is running on https://127.0.0.1:8000 🔨"

.PHONY: up
up:
	docker compose up -d
	$(SILENT_MAKE) .server-info

.PHONY: down
down:
	docker compose down

.PHONY: restart
restart:
	$(SILENT_MAKE) down
	$(SILENT_MAKE) up

.PHONY: build
build:
	$(SILENT_MAKE) down
	docker compose build
	$(SILENT_MAKE) up
	docker exec $(docker_container_php) composer install --dev
	$(SILENT_MAKE) .server-info

.PHONY: php
php:
	docker exec -it $(docker_container_php) bash

.PHONY: secret
secret:
	docker exec $(docker_container_php) composer run sc:app:generate-secret

.PHONY: cache
cache:
	docker exec $(docker_container_php) composer run sc:app:clear-cache

.PHONY: security
security:
	docker exec $(docker_container_php) composer run sc:app:check-security

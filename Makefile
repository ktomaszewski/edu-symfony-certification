.DEFAULT_GOAL := help

docker_container_php = sc_php

.PHONY: help
help:
	@echo 'Please select one of the rules from the Makefile 🔨';
	@echo "--------------------------------------------------------"
	@echo "| make help    | Show this help table                  |"
	@echo "| make up      | Start containers                      |"
	@echo "| make down    | Stop containers                       |"
	@echo "| make restart | Stop and start containers             |"
	@echo "| make build   | Build images                          |"
	@echo "| make rebuild | Stop, build and start containers      |"
	@echo "| make php     | Enter bash on PHP container           |"
	@echo "| make secret  | Generate a secret e.g. for APP_SECRET |"
	@echo "--------------------------------------------------------"
	@echo ""
	@echo 'To start a project for the first time use "make rebuild" 🔨'

.PHONY: up
up:
	docker compose up -d
	@echo ""
	@echo "Application is running on https://127.0.0.1:8000 🔨"

.PHONY: down
down:
	docker compose down

.PHONY: restart
restart:
	@$(MAKE) -s down
	@$(MAKE) -s up

.PHONY: build
build:
	docker compose build --no-cache

.PHONY: rebuild
rebuild:
	@$(MAKE) -s down
	@$(MAKE) -s build
	@$(MAKE) -s up

.PHONY: php
php:
	docker exec -it $(docker_container_php) bash

.PHONY: secret
secret:
	docker exec -it $(docker_container_php) php -r "echo bin2hex(random_bytes(16)) . PHP_EOL;"

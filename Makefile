.DEFAULT_GOAL := help

docker_container_php = sc_php

.PHONY: help
help:
	@echo 'Please select one of the rules from the Makefile 🔨';
	@echo "--------------------------------------------------"
	@echo "| make help    | Show this help table            |"
	@echo "| make up      | Start containers                |"
	@echo "| make down    | Stop containers                 |"
	@echo "| make restart | Restart containers              |"
	@echo "| make build   | Build images                    |"
	@echo "| make php     | Enter PHP shell on container    |"
	@echo "--------------------------------------------------"

.PHONY: up
up:
	docker compose up -d

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

.PHONY: php
php:
	docker exec -it $(docker_container_php) bash

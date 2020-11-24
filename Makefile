override PROJECT=ohayocms

DOCKER_FLAGS=
#Detect operating OS in order to add OS depending DOCKER_FLAGS
OS_NAME= $(shell uname -s | tr A-Z a-z)
ifeq (${OS_NAME}, $(filter ${OS_NAME}, linux Linux))
	DOCKER_FLAGS += -u $(shell id -u)
endif

DOCKER_REGISTRY=
DOCKER_IMAGE=${PROJECT}/cms
DOCKER_TAG=current
DOCKER_USER=
DOCKER_PASSWORD=

.PHONY: all
	all: composer-install npm-install npm-run docker-up storage-link migrate

.PHONY: docker-up
docker-up:
	DOCKER_IMAGE=${DOCKER_IMAGE} DOCKER_TAG=${DOCKER_TAG} docker-compose up -d nginx

.PHONY: docker-down
docker-down:
	DOCKER_IMAGE=${DOCKER_IMAGE} DOCKER_TAG=${DOCKER_TAG} docker-compose down --remove-orphans

.PHONY: migrate
migrate:
	DOCKER_IMAGE=${DOCKER_IMAGE} DOCKER_TAG=${DOCKER_TAG} docker-compose run --rm artisan migrate

.PHONY: link-storage
link-storage:
	DOCKER_IMAGE=${DOCKER_IMAGE} DOCKER_TAG=${DOCKER_TAG} docker-compose run --rm artisan storage:link

.PHONY: composer-update
composer-update:
	DOCKER_IMAGE=${DOCKER_IMAGE} DOCKER_TAG=${DOCKER_TAG} docker-compose run --rm composer update

.PHONY: composer-install
composer-install:
	DOCKER_IMAGE=${DOCKER_IMAGE} DOCKER_TAG=${DOCKER_TAG} docker-compose run --rm composer install

.PHONY: npm-install
npm-install:
	DOCKER_IMAGE=${DOCKER_IMAGE} DOCKER_TAG=${DOCKER_TAG} docker-compose run --rm npm install

.PHONY: npm-watch
npm-watch:
	DOCKER_IMAGE=${DOCKER_IMAGE} DOCKER_TAG=${DOCKER_TAG} docker-compose run --rm npm run watch

.PHONY: npm-run
npm-run:
	DOCKER_IMAGE=${DOCKER_IMAGE} DOCKER_TAG=${DOCKER_TAG} docker-compose run --rm npm run dev

.PHONY: npm-run-prod
npm-run-prod:
	DOCKER_IMAGE=${DOCKER_IMAGE} DOCKER_TAG=${DOCKER_TAG} docker-compose run --rm npm run prod
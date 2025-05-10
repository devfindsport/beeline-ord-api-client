up:
	docker compose up -d

down:
	docker compose down

install:
	docker compose exec beeline-ord-api-client sh -c "composer install"

dto:
	docker compose exec beeline-ord-api-client sh -c "./vendor/bin/dto-gen src/Data/dto.schema.php"

sh:
	docker compose exec beeline-ord-api-client sh

test:
	docker compose exec beeline-ord-api-client sh -c "php ./vendor/bin/phpunit --configuration phpunit.xml"

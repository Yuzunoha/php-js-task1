init:
	docker-compose build --no-cache
	make up
up:
	docker-compose up -d
down:
	docker-compose down
ps:
	docker-compose ps

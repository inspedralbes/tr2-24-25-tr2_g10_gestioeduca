LARAVEL_CONTAINER=dawtr2gx_g10_gestioeduca-backend-1
MYSQL_CONTAINER=dawtr2gx_g10_gestioeduca-db-1
VUE_CONTAINER=dawtr2gx_g10_gestioeduca-frontend-1
ADMINER_CONTAINER=dawtr2gx_g10_gestioeduca-adminer-1

migrate:
	docker exec -it $(LARAVEL_CONTAINER) php artisan migrate:fresh
	docker restart $(LARAVEL_CONTAINER)

godb: ##Entrar a la bbdd
	docker exec -it $(MYSQL_CONTAINER) mysql -u user -p;

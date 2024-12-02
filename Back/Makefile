# Variables
COMPOSE_FILE=docker-compose.yml

# Target de ayuda por defecto
help:
	@echo "🐳 Makefile para gestión de proyectos Docker 🐳"
	@echo ""
	@echo "Ordenes disponibles:"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

up: ## Construyendo servicios Docker laravel y adminer
	@echo 'Construyendo servicios laravel y adminer'
	docker-compose up -d

down: ## Detener y eliminar contenedores laravel
	@echo 'Deteniendo servicios'
	docker-compose down
	docker rmi -f back_laravel php:8.2-fpm composer adminer mysql:8.2.0

restart: ## Iniciando todos los servicios laravel
	@echo 'Iniciando/Reiniciando servicios'
	docker-compose restart

logs: ## Mostrar logs de laravel en tiempo real 
	@echo 'Mostrando logs'
	docker-compose logs -f

clean: ## Eliminar contenedores, imágenes y volúmenes de laravel
	@echo 'Limpiando recursos de Docker laravel'
	docker-compose down -v --rmi all


# Target por defecto
.DEFAULT_GOAL := help
# Target de ayuda por defecto
help:
	@echo "🐳 Makefile para gestión de proyectos Docker 🐳"
	@echo ""
	@echo "Ordenes disponibles:"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

build: ## Construcción de servicios Docker
	@echo 'Construcción de servicios'
	docker-compose build

up: ## Levantar servicios en modo detach
	@echo 'Levantando servicios'
	docker-compose up -d

down: ## Detener y eliminar contenedores
	@echo 'Deteniendo servicios'
	docker-compose down

restart: ## Reiniciar todos los servicios
	@echo 'Reiniciando servicios'
	docker-compose restart

logs: ## Mostrar logs en tiempo real
	@echo 'Mostrando logs'
	docker-compose logs -f

clean: ## Eliminar contenedores, imágenes y volúmenes
	@echo 'Limpiando recursos de Docker'
	docker-compose down -v --rmi all
	docker rmi node:18-alpine


start: ## Levanta el proyecto directamente.
	$(MAKE) build
	$(MAKE) up

close_all: ## Cierra todo el proyecto y elimina imagenes
	$(MAKE) down
	$(MAKE) clean


# Target por defecto
.DEFAULT_GOAL := help
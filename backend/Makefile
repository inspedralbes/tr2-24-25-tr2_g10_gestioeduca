# Variables
COMPOSE_FILE=docker-compose.yml

# Target de ayuda por defecto
help:
	@echo "🐳 Makefile para gestión de proyectos Docker 🐳"
	@echo ""
	@echo "Ordenes disponibles:"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

logs: ## Mostrar logs de laravel en tiempo real 
	@echo 'Mostrando logs'
	docker-compose logs -f

# Target por defecto
.DEFAULT_GOAL := help
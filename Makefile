help: ## Target de ayuda por defecto
	@echo "🐳 Makefile para gestión de proyectos Docker 🐳"
	@echo ""
	@echo "Ordenes disponibles:"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

start_all: ## Levanta todos los servicios en desarrollo
	cd ./Back/ && $(MAKE) up
	cd ./Front/ && $(MAKE) start

stop_all: ## Levanta todos los servicios en desarrollo
	cd ./Back && $(MAKE) down
	cd ./Front && $(MAKE) close_all

restart_all: ## Reinicia todos los servicios en desarrollo
	cd ./Back && $(MAKE) restart
	cd ./Front && $(MAKE) restart

# Target por defecto
.DEFAULT_GOAL := help
# 🐳 Projecte amb Vue, Nodejs + Laravel 🐳

1. **Clona el projecte**
    ```bash
    git clone https://github.com/inspedralbes/tr2-24-25-tr2_g10_gestioeduca.git
## ⚙️ Instalación de `make` en Linux

2. **Verificar si `make` está instalado**:
   ```bash
   make --version
3. **Instalar `make` en caso de no tenerlo instalado (LINUX)**
    ```bash
    sudo apt update && sudo apt install -y make
## 🚀 Requisitos

Antes de comenzar, asegúrate de tener instalados los siguientes componentes:

- **Docker**: [Guía de instalación oficial](https://docs.docker.com/get-docker/)
- **Make**: Es posible que ya esté preinstalado en tu sistema Linux. Si no, puedes instalarlo fácilmente siguiendo las instrucciones a continuación.

**Aixeca els serveis de forma senzilla (Vue, nodejs y laravel)**
- Executa això dins de la carpeta Projecte
    ```bash
    cd tr2-24-25-tr2_g10_gestioeduca
    make start_all #Dins la carpeta del projecte
Aquest projecte utilitza Docker i `make` per gestionar de manera senzilla els serveis del frontend i backend.

---



---

## ⚙️ Instalación de `make` en Linux

1. **Verificar si `make` está instalado**:
   ```bash
   make --version
2. **Instalar `make` en caso de no tenerlo instalado (LINUX)**
    ```bash
    sudo apt update && sudo apt install -y make
---

# 🛠️ Comandos disponibles

Este proyecto se gestiona mediante un archivo Makefile. 

1. **Listar comandos disponibles**
    ```bash
    cd tr2-24-25-tr2_g10_gestioeduca
    make help
2. **Ejemplo de salida**
    ```bash
    🐳 Makefile para gestión de proyectos Docker 🐳

    Ordenes disponibles:
    help  Target de ayuda por defecto
    start_all  Levanta todos los servicios en desarrollo
    stop_all  Detiene todos los servicios en desarrollo
    restart_all  Reinicia todos los servicios en desarrollo
## Descripción de los comandos principales
1. **Levantar todos los servicios**
    Inicia el entorno completo de desarrollo (frontend y backend)

    ```bash
    tr2-24-25-tr2_g10_gestioeduca #Donde se encuentra el Makefile
    make start_all
2. **Detener todos los servicios**
    Detiene todos los servicios de desarrollo:

    ```bash
    cd tr2-24-25-tr2_g10_gestioeduca
    make stop_all
3. **Reiniciar todos los servicios:**
    Reinicia el entorno de desarrollo:

    ```bash
    cd tr2-24-25-tr2_g10_gestioeduca
    make restart_all
4. **Obtener ayuda**
    Muestra la lista de comandos disponibles en el Makefile:

    ```bash
    cd tr2-24-25-tr2_g10_gestioeduca
    make help # o "make" como abreviatura
---

# 📂 Estructura del proyecto
El proyecto está dividido en dos directorios principales:

- **Back/:** Contiene el código y los servicios para el backend.
- **Front/:** Contiene el código y los servicios para el frontend.

Cada directorio tiene su propio **Makefile** con comandos específicos para gestionar sus servicios de forma independiente.

---

# transversals
Esquema mínim de carpetes pels projectes transversals

És obligatori seguir aquesta estructura tot i que la podeu ampliar.

## Atenció
Un cop comenceu heu de canviar aquesta explicació amb la corresponent al vostre projecte (utilitzant markdown)

# Aquest fitxer ha de contenir com a mínim:
 * Nom dels integrants
 * Nom del projecte
 * Petita descripció
 * Adreça del gestor de tasques (taiga, jira, trello...)
 * Adreça del prototip gràfic del projecte (Penpot, figma, moqups...)
 * URL de producció (quan la tingueu)
 * Estat: (explicació d'en quin punt està)

# Groupify
**Integrants del projecte:**
Aleiram Minaya, Lucas Benitez, Araceli Pacheco, Joselyn Ninahuaman, Adrià Estévez.
- Un projecte de gestió de grups dins dels centres educatius per evitar el risc d'exclusió/bullying. Fem servir eines com Taiga per la gestió de treball en grup amb metodología SCRUM <!--i sistema per generar grups automátics, INSERTAR AQUI ENLACE TAIGA, figma/penpot, URL PRODUCCIÓ, estado actual del proyecto-->

## 🐳 Projecte amb Vue, Nodejs + Laravel 🐳

1. **Clona el projecte**
    ```bash
    git clone https://github.com/inspedralbes/DAWTR2GX_g10_gestioeduca.git
## 🚀 Requisitos

Abans de començar, assegura't de tenir instal·lat el següent component:

- **Docker**: [Guía d'instalació oficial](https://docs.docker.com/get-docker/)
    ```bash
    sudo apt-get install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
    sudo docker run hello-world # Verifica si s'ha instal·lat correctament.
- Utilitza aquesta comanda per evitar fer `sudo` cada vegada que utilitzes docker
    ```bash
    sudo usermod -aG docker $USER
**Aixeca els serveis de forma senzilla (Vue, nodejs y laravel)**
- Les **comandes principals** per obrir el projecte de forma ràpida i segura.
    ```bash
    cd DAWTR2GX_g10_gestioeduca
    docker-compose up -d # Encendre els contenidors
    firefox "localhost:5173" # Vue
    firefox "localhost:9090" # Adminer
    firefox "localhost:8000" # Laravel
    docker-compose down # Apagar els contenidors
Aquest projecte utilitza Docker per gestionar de manera senzilla els serveis del frontend i backend.

---

# 📂 Estructura del projecte
El projecte està dividit en dos directoris principals:

- **Back/:** Conté el codi i els serveis per al backend.
- **Front/:** Conté el codi i els serveis per al frontend + Nodejs.

# Usar una imagen base ligera y estable
FROM node:18-alpine

# Establecer el usuario predeterminado como "node" (preconfigurado en la imagen)
USER node

# Establecer el directorio de trabajo en el contenedor
WORKDIR /app

# Copiar solo package.json y package-lock.json primero
COPY --chown=node:node package*.json ./

# Instalar las dependencias
RUN npm install

# Copiar el resto de los archivos del proyecto
COPY --chown=node:node . .

# Exponer el puerto utilizado por Vite
EXPOSE 5173

# Comando para iniciar el servidor de desarrollo con hot-reload
CMD ["npm", "run", "dev", "--", "--host"]

# Usar una imagen base ligera y estable
FROM node:18-alpine

# Establecer el directorio de trabajo en el contenedor
WORKDIR /app

# Copiar solo package.json y package-lock.json primero
COPY package*.json ./

# Cambiar temporalmente al usuario root para crear y ajustar permisos
USER root
RUN mkdir -p /app/node_modules && chown -R node:node /app

# Cambiar de nuevo al usuario "node" para continuar las operaciones seguras
USER node

# Instalar las dependencias
RUN npm install

# Copiar el resto de los archivos del proyecto
COPY --chown=node:node . .

# Exponer el puerto utilizado por Vite
EXPOSE 5173

# Comando para iniciar el servidor de desarrollo con hot-reload
CMD ["npm", "run", "dev", "--", "--host"]

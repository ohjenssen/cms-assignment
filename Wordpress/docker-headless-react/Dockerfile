# Build stage
FROM node:20-alpine AS builder

WORKDIR /app

# Kopier package files
COPY package*.json ./

# Installer dependencies
RUN npm ci

# Kopier source kode
COPY . .

# Motta VITE build args
ARG VITE_WP_API_BASE
ENV VITE_WP_API_BASE=$VITE_WP_API_BASE

# Bygg appen
RUN npm run build

# Runtime stage
FROM node:20-alpine

WORKDIR /app

# Installer en lightweight HTTP server
RUN npm install -g serve

# Kopier built files fra builder stage
COPY --from=builder /app/dist ./dist

# Eksponerer port
EXPOSE 5173

# Start serveren
CMD ["serve", "-s", "dist", "-l", "5173"]

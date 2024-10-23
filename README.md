<h1>FarmFusion </h1>

Este proyecto es una plataforma de comercio electrónico que conecta a pequeños productores campesinos con consumidores interesados en productos frescos, locales y sostenibles. Permite a los campesinos vender directamente sus productos agrícolas, eliminando intermediarios y asegurando precios justos. Los consumidores pueden explorar una variedad de productos naturales, realizar compras y recibirlos directamente en sus hogares.

Esta plataforma es importante porque promueve la economía local, apoya a los agricultores pequeños, y fomenta el consumo responsable y sostenible.

## Tabla de Contenidos
- [Descripción](#descripción)
- [Instalación](#instalación)
- [Uso](#uso)

## Descripción
Buscamos facilitar la conexión directa entre productores locales y consumidores, garantizando la frescura y calidad de los productos ofrecidos, así mismo, luchamos por la justicia económica y social, velando por una remuneración económica justa para nuestros productores locales.
Nuestra finalidad es optimizar y automatizar la gestión de los distintos procesos administrativos, tales como inventario, eventos, pedidos y gestión de información.

## Instalación
Instrucciones paso a paso para configurar el proyecto en un entorno local.

```bash
# Clonar el repositorio
git clone https://github.com/yesid17cas/farmFusion2.0.git

# Navegar al directorio del proyecto
cd farmFusion2.0

# Instalar dependencias
composer install

# Configurar variables de entorno
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate
```
## Uso
```bash
# Ejecutar migraciones
php artisan migrate

# Iniciar el servidor
php artisan serve
npm run dev
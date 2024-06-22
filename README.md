# Reto Pai

_El reto solicitado por la empresa Pai es el desarrollar un CRUD con las tecnologias laravel como BackEnd, VueJs como FrontEnd y MySQL para Base de datos, ademas se pide realizar una conexion con el API de Stripe que permita realizar la creacion de clientes al mismo tiempo que el CRUD, ademas de poder realizar CheckOut de comprar por clientes_

## Requisitos Cumplidos 🚀

RETO UNICAMENTE CRUD
- [x]  Consultar un Cliente (Datos como Nombre - Email - Teléfono)
- [x]  Listar Clientes
- [x]  Crear Clientes Nuevos
- [x]  Actualizar Clientes Existentes
- [x]  Borrar Clientes Existentes
- [x]  Confirmación antes de borrar un cliente
- [x]  la dirección del cliente debe ser un JSON

RETO CON STRIPE
- [x]  Nombre del cliente
- [x]  Email del cliente
- [x]  Monto (Mayor de $100 MXN)
- [x]  Metodo de pago (Tarjeta de crédito o débito)
- [x]  al completar el checkout se debe generar el “Payment Intent” en stripe y este debe ser pagado
- [x]  Mostrar mensajes de error en el método de pago
- [x]  Formulario para crear el cliente en la BD y Stripe
- [x]  Crear el Customer en Stripe asociado al CRUD de clientes


### Requisitos No Cumplidos 📋

- [ ]  Enviar el método de pago de Stripe el nombre y email del cliente como información de la tarjeta

### Instalación 🔧

_Si se desea Realizar de 0 el proyecto se deben seguir los siguientes pasos_

```
composer create-project laravel/laravel RetoPai
composer require laravel/breeze --dev
php artisan breeze:install
php artisan make:model Client -m --resource
php artisan make:model Payment -m --resource
php artisan migrate
cd RetoPai
php artisan make:request Client/StoreRequest
php artisan make:request Client/UpdateRequest
composer require stripe/stripe-php
npm i vue-stripe-js @stripe/stripe-js --save-dev
npm install @vue-stripe/vue-stripe
```
_Es la lista de comandos que necesitas seguir para inicializar el proyecto, una vez que tengas inicializado el proyecto puedes proceder a realizar el encendido de los recursos, recomiendo abrir 2 terminales_

```
php artisan serve ------> comando para activar laravel
npm run dev ------> comando para activar vue
```

## Despliegue de Reto 📦

**Pagina de Inicio de Sesion:** 

![Image description](https://github.com/Incog89/ProyectoNominas/blob/main/ImagenesDescripcion/InicioSesion.png?raw=true)

**Pagina Inicial despues del Inicio de sesion como administrador:**

![Image description](https://github.com/Incog89/ProyectoNominas/blob/main/ImagenesDescripcion/ImagenHomeAdmin.png?raw=true)

**Pagina Inicial despues del Inicio de sesion como administrador de plantillas usuario:**

![Image description](https://github.com/Incog89/ProyectoNominas/blob/main/ImagenesDescripcion/ImagenHomeUsuarios.png?raw=true)
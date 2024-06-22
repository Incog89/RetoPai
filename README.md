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

**Como Inicio del proyecto aprovechamos la autenticacion que nos da laravel al comenzar un proyecto:** 

![Image description](https://github.com/Incog89/RetoPai/blob/main/RetoPai/imgReadme/Welcome.png)

**Dashbord una vez que estas autenticado, como se puede notar las 2 primeras pruebas de creacion se hicieron sin la API de stripe y las 2 ultimas pruebas es con Stripe implementado**

![Image description](https://github.com/Incog89/RetoPai/blob/main/RetoPai/imgReadme/AdminUsuarios.png)

**Formulario de Creacion de Clientes**

![Image description](https://github.com/Incog89/RetoPai/blob/main/RetoPai/imgReadme/CreacionClientes.png)

**Pagina de Inicio para Creacion de Pago**

![Image description](https://github.com/Incog89/RetoPai/blob/main/RetoPai/imgReadme/PagoUnico.png)

**Implementacion de cobro con Stripe, asi como prueba de errores en campos**

![Image description](https://github.com/Incog89/RetoPai/blob/main/RetoPai/imgReadme/PruebaErrores.png)

**Prueba de Compras y Pagos exitosos**

![Image description](https://github.com/Incog89/RetoPai/blob/main/RetoPai/imgReadme/CompraExitosa.png)
![Image description](https://github.com/Incog89/RetoPai/blob/main/RetoPai/imgReadme/PagosExitosos.png)

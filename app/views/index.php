<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= constant('URL') ?>public/img/favicon.png" type="image/x-icon" />
    <!-- SweetAlert -->
    <script src="<?= constant('URL') ?>lib/sweetaler2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="<?= constant('URL') ?>lib/sweetaler2/sweetalert2.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= constant('URL') ?>lib/fontawesome-5.15.2/css/all.min.css" />
    <script src="<?= constant('URL') ?>lib/fontawesome-5.15.2/js/all.min.js"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/normalize.css" />
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/main.css" />
    <title>Sistema de reservación de mesas, gestión de productos y proveedores | Reserva Ya</title>
</head>

<body class="body">
    <!-- Barra de navegación -->
    <header class="nav-bar">
        <img class="nav-bar__img" src="<?= constant('URL') ?>public/img/logo-reservaya.png" alt="Logo Reserva Ya" />
        <nav class="nav-bar__nav">
            <ul class="nav-bar__nav-ul">
                <li class="nav-bar__nav-ul-li"><a href="<?= constant('URL') ?>" class="nav-bar-link"><i class="fas fa-home"></i> Inicio</a></li>
                <li class="nav-bar__nav-ul-li">
                    <a href="#navServices" class="nav-bar-link"><i class="fas fa-box"></i> Servicios</a>
                </li>
                <li class="nav-bar__nav-ul-li">
                    <a href="#navNosotros" class="nav-bar-link"><i class="fas fa-briefcase"></i> Nosotros</a>
                </li>
                <li class="nav-bar__nav-ul-li">
                    <a href="#navContacto" class="nav-bar-link"><i class="fas fa-envelope"></i> Contacto</a>
                </li>
                <li class="nav-bar__nav-ul-li">
                    <a href="<?= constant('URL') ?>carta" class="nav-bar-link"><i class="fas fa-utensils"></i> Productos</a>
                </li>
                <li class="nav-bar__nav-ul-li">
                    <a href="<?= constant('URL') ?>login" class="nav-bar-link"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a>
                </li>
            </ul>
        </nav>
        <div class="menu-btn">
            <i class="fas fa-bars"></i>
        </div>
    </header>

    <!-- Slider -->
    <div class="welcome-slide">
        <div class="welcome-slide-content">
            <h1 class="welcome-slide__h1">
                Sistema de Reservación de Mesas, gestión de productos y reservaciones
            </h1>
            <div class="welcome-slide-container">
                <h3 class="welcome-slide__h3">¡Bienvenido!</h3>
                <img src="<?= constant('URL') ?>public/img/illustration/special_event.svg" alt="" class="welcome-slide__img" />
                <button class="welcome-button"><a href="#navServices">Conoce más</a></button>
            </div>
        </div>
    </div>

    <!-- Servicios -->

    <section class="services" id="navServices">
        <div class="services-container">
            <h2>Servicios</h2>
            <div class="service-item">
                <h3 class="service-topic">Para clientes</h3>
            </div>
            <div class="service-item">
                <i class="fas fa-book icon"></i>
                <h3 class="service-title">Productos</h3>
                <p>Visualiza los productos, su descripción y valor.</p>
            </div>
            <div class="service-item">
                <i class="far fa-address-book icon"></i>
                <h3 class="service-title">Reservaciones</h3>
                <p>Crea reservaciones, asigna el dia, la hora y la escoje la ubicación adecuada.</p>
            </div>
            <div class="service-item icon">
                <h3 class="service-topic">Para empresas</h3>
            </div>
            <div class="service-item">
                <i class="fas fa-truck icon"></i>
                <h3 class="service-title">Proveedores</h3>
                <p>Gestiona los proveedores y su información de contacto</p>
            </div>
            <div class="service-item">
                <i class="fas fa-utensils icon"></i>
                <h3 class="service-title">Insumos</h3>
                <p>Gestiona los insumos, sus cantidades y precio</p>
            </div>
        </div>
    </section>

    <!-- Nosotros -->

    <section class="nosotros" id="navNosotros">
        <div class="nosotros-container">
            <div class="nosotros-item">
                <h2>Nosotros</h2>
                <p>
                    Ubicados en la Calle 57 A SUR # 79 G 24 en Bogotá, Sephia PUB se fundó en el año 2005,
                    cuando una pareja de emprendedores quiso hacer realidad su idea, un restaurante con
                    temática bar, con el transcurso del tiempo se ha mantenido en la competencia ya que se
                    ha innovado en los diferentes platos que ofrece y la temática.
                </p>
                <p>
                    Después de 15 años de trayectoria ha sido un restaurante que se destaca por su comida,
                    su decoración y su buen servicio.
                </p>
            </div>
            <div class="nosotros-item">
                <h2>Misión</h2>
                <p>
                    Nuestro establecimiento Sephia PUB espera competir con los más grandes establecimientos
                    ofreciendo deliciosos platos de comida rápida, bebidas y cócteles, garantizando una
                    excelente atención al cliente y manejando unos precios que nos permitan sobresalir en
                    este ámbito.
                </p>
            </div>
            <div class="nosotros-item">
                <h2>Visión</h2>
                <p>
                    Ser líderes en el mercado gastronómico y de bebidas dándonos a conocer por nuestros
                    platos y bebidas típicas compartiendo nuestra experiencia en el mercado nacional
                    ampliando nuestra posibilidad de mejora mostrando un crecimiento constante en todos los
                    sentidos creando un ambiente donde nuestros trabajadores estén capacitados para todo
                    tipo de situaciones contando con un personal motivado a una mejora constante
                    desarrollando su más alto potencial de productividad recalcando los valores de la
                    empresa
                </p>
            </div>
            <div class="nosotros-item | nosotros-item__img">
                <img src="<?= constant('URL') ?>public/img/Logo-Sephia_PUB.jpg" alt="" />
            </div>
        </div>
    </section>

    <!-- Contacto -->

    <section class="contacto" id="navContacto">
        <div class="contacto-container">
            <div class="contacto-title">
                <h2>Contactanos</h2>
            </div>
            <div class="contacto-form">
                <form method="POST" id="form-contact-client">
                    <p>Nombre</p>
                    <br />
                    <input type="text" id="name" name="name" required /> <br />
                    <p>Correo electronico</p>
                    <br />
                    <input type="email" name="email" id="email" required /> <br />
                    <p>Mensaje</p>
                    <br />
                    <textarea name="message" id="message" cols="30" rows="10" required></textarea>
                    <input type="submit" value="Enviar" id="sendMessage" />
                </form>
            </div>
            <div class="contacto-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2812.089906532743!2d-74.17683276608899!3d4.612686234300271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9e6139b71409%3A0xfe538fa4d3a6855!2sSephia%20Pub!5e0!3m2!1ses!2sco!4v1608993906768!5m2!1ses!2sco" frameborder="0" style="border: 0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <div class="contacto-info">
                    <p>Cl. 57a Sur #79g-23, Bogotá</p>
                    <p>+57 322 8306094</p>
                    <p>contacto@sephia.co</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div>
            <p>&copy Todos los derechos reservados | 2020 - 2021 | Sephia PUB</p>
        </div>
    </footer>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            document.querySelector(".menu-btn").addEventListener("click", () => {
                document.querySelector(".nav-bar__nav-ul").classList.toggle("show");
            });

            let formContactClient = document.getElementById('form-contact-client');
            let btnSendEmail = document.getElementById('sendMessage');
            let name = document.getElementById('name');
            let email = document.getElementById('email');
            let message = document.getElementById('message');

            let validateEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;


            btnSendEmail.addEventListener('click', (e) => {
                e.preventDefault();
                if (name.value == "") {
                    Swal.fire({
                        title: "El nombre no puede estar vacio",
                        icon: "warning",
                        showConfirmButton: false,
                        timer: 700,
                    })
                } else if (!validateEmail.test(email.value)) {
                    Swal.fire({
                        title: "El correo electronico debe ser valido",
                        icon: "warning",
                        showConfirmButton: false,
                        timer: 700,
                    })
                } else if (message.value == "") {
                    Swal.fire({
                        title: "El mensaje no puede estar vacio",
                        icon: "warning",
                        showConfirmButton: false,
                        timer: 700,
                    })
                } else {
                    fetch("email/sendEmailInfo", {
                        body: new FormData(formContactClient),
                        method: "POST"
                    }).then(req => req.text()).then(res => {
                        console.log(res);
                        Swal.fire({
                            title: "Mensaje enviado",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        formContactClient.reset()
                    })
                }
            })
        })
    </script>
</body>

</html>
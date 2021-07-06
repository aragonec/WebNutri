@extends('layouts.main') @section('contenido')

<!-- Header-->
<section class="mb-3 d-flex" style="background-image: url('img/bg4.jpg');">
    <header class="masthead d-flex position-absolute top-50 start-50 translate-middle">
        <div class="container px-4 px-lg-5 text-center">
            <h1 class="display-3 fw-normal mb-2 text-white">NutriWeb</h1>
            <h3 class="mb-5 text-white">
                <em>La mejor web de nutrición</em>
            </h3>
            <a class=" btn-cita w-100 btn btn-lg btn-outline-info" href="#servicios">Conócenos</a>
        </div>
    </header>
</section>

<!-- Servicios-->

<div id="servicios" class="container block-services-1 py-5 mt-3 mb-3 border border-light shadow">
    
        <div class="row">
            <div class="mb-4 mb-lg-0 col-sm-6 col-md-6 col-lg-3">
                <h2 class="mb-3 display-4 fw-normal">Servicios</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
                <!--
                    <p><a href="#" class="d-inline-flex align-items-center block-service-1-more">
                        <span>
                            Todos los servicios
                        </span> 
                    <span class="icon-keyboard_arrow_right icon"></span></a></p>
                -->
            </div>
            <div class="mb-4 mb-lg-0 col-sm-6 col-md-6 col-lg-3">
                <div class="block-service-1-card">
                    <a href="/faq" class="thumbnail-link d-block mb-4"><img src="{{ asset('img/img_1.jpg') }}" alt="Image"
                            class="img-fluid"></a>
                    <h3 class="block-service-1-heading mb-3"><a>Plan Alimenticio</a></h3>
                    <div class="block-service-1-excerpt">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                    </div>
                    <p><a href="/faq" class="d-inline-flex align-items-center block-service-1-more"><span>Más
                                información</span> <span class="icon-keyboard_arrow_right icon"></span></a></p>
                </div>
            </div>
            <div class="mb-4 mb-lg-0 col-sm-6 col-md-6 col-lg-3">
                <div class="block-service-1-card">
                    <a href="/faq" class="thumbnail-link d-block mb-4"><img src="{{ asset('img/img_2.jpg') }}" alt="Image"
                            class="img-fluid"></a>
                    <h3 class="block-service-1-heading mb-3"><a>Fitness Coach</a></h3>
                    <div class="block-service-1-excerpt">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                    </div>
                    <p><a href="/faq" class="d-inline-flex align-items-center block-service-1-more"><span>Más
                                información</span> <span class="icon-keyboard_arrow_right icon"></span></a></p>
                </div>
            </div>
            <div class="mb-4 mb-lg-0 col-sm-6 col-md-6 col-lg-3">
                <div class="block-service-1-card">
                    <a href="https://www.instagram.com/nutriologaalebaeza/guides/" 
                    class="thumbnail-link d-block mb-4"><img src="{{ asset('img/img_3.jpg') }}" alt="Image"
                            class="img-fluid"></a>
                    <h3 class="block-service-1-heading mb-3"><a>Recetas</a></h3>
                    <div class="block-service-1-excerpt">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                    </div>
                    <p><a href="https://www.instagram.com/nutriologaalebaeza/guides/" 
                        class="d-inline-flex align-items-center block-service-1-more"><span>Visita IG
                        </span> <span class="icon-keyboard_arrow_right icon"></span></a></p>
                </div>
            </div>
        </div>
    
</div>

<!--precios-->
<div id="precios" class="container mt-3 mb-3 border border-light shadow">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Precios</h1>
        <p class="fs-5 text-muted">Sujetos a cambio sin previo aviso</p>
    </div>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3 text-white">
                    <h4 class="my-0 fw-normal">Online</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$400<small class="text-muted fw-light">/cita</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Menú a tu medida</li>
                        <li>Seguimiento por WhatsApp</li>
                        <li>Calculo de edad metabólica</li>
                        <li>Porcentaje de grasa corporal</li>
                    </ul>
                    <button type="button" class="btn-precio w-100 btn btn-lg btn-outline-info">Haz una cita</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3 text-white">
                    <h4 class="my-0 fw-normal">Presencial</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$500<small class="text-muted fw-light">/cita</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Menú a tu medida</li>
                        <li>Seguimiento por WhatsApp</li>
                        <li>Calculo de edad metabólica</li>
                        <li>Porcentaje de grasa corporal</li>
                    </ul>
                    <button type="button" class="btn-precio w-100 btn btn-lg btn-outline-info">Haz una cita</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3 text-white">
                    <h4 class="my-0 fw-normal">Parejas</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$900<small class="text-muted fw-light">/cita</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Menú a tu medida</li>
                        <li>Seguimiento por WhatsApp</li>
                        <li>Calculo de edad metabólica</li>
                        <li>Porcentaje de grasa corporal</li>
                    </ul>
                    <button type="button" class="btn-precio w-100 btn btn-lg btn-outline-info">Haz una cita</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contacto -->
<div class="container mt-3 mb-3 text-center border border-light shadow">
<h2 class="mb-3 mt-3 display-4 fw-normal">Contacto</h3>
    <div class="row mb-3">
        <!--Forma de whatsapp-->
        <div class=" whatsapp col ">
            <form id="form" class="w-100 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 border border-light">
                <div class="mb-3 text-center fw-normal fs-3">
                    <label>
                        Saca cita por Whatsapp
                    </label></br>
                </div>
                <div class="mb-4">
                    <label class="d-none"></label>
                    <input class="
                        shadow
                        appearance-none
                        border
                        rounded
                        w-100
                        py-2
                        px-2
                        text-gray-700
                        leading-tight
                        focus:outline-none focus:shadow-outline
                    " name="name" id="name" type="text" placeholder="Ingresa tu nombre" required />
                </div>
                <div class="mb-4">
                    <label class="d-none"></label>
                    <input class="
                        shadow
                        appearance-none
                        border
                        rounded
                        w-100
                        py-2
                        px-2
                        text-gray-700
                        leading-tight
                        focus:outline-none focus:shadow-outline
                    " name="lastname" id="lastname" type="text" placeholder="Ingresa tus apellidos" required />
                </div>
                <div class="mb-4">
                    <label class="d-none"></label>
                    <input class="
                        shadow
                        appearance-none
                        border
                        rounded
                        w-100
                        py-2
                        px-2
                        text-gray-700
                        leading-tight
                        focus:outline-none focus:shadow-outline
                    " name="email" id="email" type="email" placeholder="Ingresa tu correo" required />
                </div>
                <div class="flex items-center justify-between">
                    <button id="submit" class="
                        btn-whats
                        text-white
                        font-bold
                        py-2
                        px-4
                        rounded
                        focus:outline-none focus:shadow-outline
                    " type="submit">
                        <i class="fab fa-whatsapp"></i> Enviar WhatsApp
                    </button>
                </div>
            </form>
        </div>
        <!--forma-whatsapp-->

        <div class="map col col-6 d-none d-lg-block" id="contact">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d875.2725112774132!2d-106.09501827080278!3d28.657022398900512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86ea4316bc0395cb%3A0x597025bfa41f8260!2sMedicina%20900%2C%20Universidad%2C%2031203%20Chihuahua%2C%20Chih.!5e0!3m2!1sen!2smx!4v1625471648906!5m2!1sen!2smx"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

        </div>

    </div>
</div>
<div class="container map d-lg-none  " id="contact1">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d875.2725112774132!2d-106.09501827080278!3d28.657022398900512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86ea4316bc0395cb%3A0x597025bfa41f8260!2sMedicina%20900%2C%20Universidad%2C%2031203%20Chihuahua%2C%20Chih.!5e0!3m2!1sen!2smx!4v1625471648906!5m2!1sen!2smx"
        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

</div>

@endsection @section('scripts')
<script src="{{ asset('js/helpers.js') }}"></script>
<script src="{{ asset('js/whatsapp.js') }}"></script>
@endsection
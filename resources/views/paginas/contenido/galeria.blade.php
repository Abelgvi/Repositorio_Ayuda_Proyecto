@extends('paginas.app')

@section('title', 'Pet Point - Galería')

@section('css')
<link rel="stylesheet" href="{{ asset('css/galeria.css') }}">
@endsection

@section('content')
    <!-- CONTENIDO PRINCIPAL DE LA PÁGINA -->
    <main class="contenido">

        <!-- SECCIÓN DE LA GALERÍA -->
        <div class="galeria-section">

            <!-- Título principal de la galería -->
            <h2 class="galerias-titulo">¡Nuestros Clientes!</h2>

            <!-- Subtítulo para la parte de imágenes -->
            <h2 class="galerias-titulo">Imagenes</h2>

            <!-- Subtítulo reservado para texto adicional -->
            <p class="galeria-subtitulo"></p>

            <!-- Grid que contiene todas las imágenes -->
            <div class="galeria-grid">

                <!-- FOTO 1 -->
                <div class="galeria-card">
                    <div class="galeria-imagen">
                        <!-- Imagen del cliente -->
                        <img class="galeriaImg" src="../../img/conj.jpeg" alt="conejo2">
                    </div>
                    <div class="galeria-contenido">
                        <h3 class="galeria-titulo">Skitels</h3>
                        <p class="galeria-descripcion">
                            Uno de nuestros clientes favoritos, Skitels es un conejito muy feliz
                        </p>
                    </div>
                </div>

                <!-- FOTO 2 -->
                <div class="galeria-card">
                    <div class="galeria-imagen">
                        <img class="galeriaImg" src="../../img/pajaro.jpeg" alt="Periquitos">
                    </div>
                    <div class="galeria-contenido">
                        <h3 class="galeria-titulo">Lolo y Blue</h3>
                        <p class="galeria-descripcion">¡Nuestra pareja favorita!</p>
                    </div>
                </div>

                <!-- FOTO 3 -->
                <div class="galeria-card">
                    <div class="galeria-imagen">
                        <img class="galeriaImg" src="../../img/cobayaaa.jpeg" alt="cobaya">
                    </div>
                    <div class="galeria-contenido">
                        <h3 class="galeria-titulo">Matilde</h3>
                        <p class="galeria-descripcion">Como puedes ver aqui hay una cobaya feliz</p>
                    </div>
                </div>

                <!-- FOTO 4 -->
                <div class="galeria-card">
                    <div class="galeria-imagen">
                        <img class="galeriaImg" src="../../img/WhatsApp Image 2025-12-21 at 20.00.16.jpeg" alt="Ninfa">
                    </div>
                    <div class="galeria-contenido">
                        <h3 class="galeria-titulo">Coco</h3>
                        <p class="galeria-descripcion">Una Ninfa muy inteligente</p>
                    </div>
                </div>

                <!-- FOTO 5 -->
                <div class="galeria-card">
                    <div class="galeria-imagen">
                        <img class="galeriaImg" src="../../img/dev.jpeg" alt="gato posando">
                    </div>
                    <div class="galeria-contenido">
                        <h3 class="galeria-titulo">Perrita modelo</h3>
                        <p class="galeria-descripcion">¡Mira como posa para la foto, que guapa!</p>
                    </div>
                </div>

                <!-- FOTO 6 -->
                <div class="galeria-card">
                    <div class="galeria-imagen">
                        <img class="galeriaImg" src="../../img/tru (1).jpeg" alt="tortuga quieta">
                    </div>
                    <div class="galeria-contenido">
                        <h3 class="galeria-titulo">Trufa</h3>
                        <p class="galeria-descripcion">¡Mira que perrita tan formal!</p>
                    </div>
                </div>

                <!-- FOTO 7 -->
                <div class="galeria-card">
                    <div class="galeria-imagen">
                        <img class="galeriaImg" src="../../img/leo.jpeg" alt="Perrito sacando la lengua">
                    </div>
                    <div class="galeria-contenido">
                        <h3 class="galeria-titulo">Leo</h3>
                        <p class="galeria-descripcion">
                            Mira que alegre y bonito se ve nuestro amigo Leo!
                        </p>
                    </div>
                </div>
            </div>

            <!-- SEPARADOR ENTRE IMÁGENES Y VÍDEOS -->
            <div class="salto-linea">
                <br>
                <h2 class="galerias-titulo">Videos</h2>
            </div>

            <!-- CONTENEDOR DEL CARRUSEL DE VÍDEOS -->
            <div class="videos-carrusel-container">

                <!-- Carrusel visible -->
                <div class="videos-carrusel">

                    <!-- Pista que se mueve horizontalmente -->
                    <div class="carrusel-track" id="carruselTrack">

                        <!-- VIDEO 1 -->
                        <div class="video-slide">
                            <div class="video-wrapper">
                                <video class="galeriaVideo" controls>
                                    <source src="../../img/videonif.mp4" type="video/mp4">
                                    Lo sentimos pero, tu navegador no soporta videos.
                                </video>
                            </div>
                            <div class="video-info">
                                <h3>Coco y sus amigos</h3>
                                <p>A las ninfas les encanta bañarse, mira como disfrutan!</p>
                            </div>
                        </div>

                        <!-- VIDEO 2 -->
                        <div class="video-slide">
                            <div class="video-wrapper">
                                <video class="galeriaVideo" controls>
                                    <source src="../../img/videoperro.mp4" type="video/mp4">
                                    Tu navegador no soporta videos.
                                </video>
                            </div>
                            <div class="video-info">
                                <h3>Leo</h3>
                                <p>Mira como este cachorro juguetón es un mimoso!</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Botón para ir al vídeo anterior -->
                <button class="carrusel-btn prev" onclick="moveCarrusel(-1)">‹</button>

                <!-- Botón para ir al siguiente vídeo -->
                <button class="carrusel-btn next" onclick="moveCarrusel(1)">›</button>

                <!-- Indicadores del carrusel -->
                <div class="carrusel-indicators" id="indicators"></div>
            </div>
        </div>
    </main>
@endsection
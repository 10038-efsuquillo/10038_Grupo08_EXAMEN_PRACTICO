

  
        ScrollReveal().reveal('.div2', {
            delay: 300,      // Retraso en milisegundos
            distance: '100px', // Distancia de desplazamiento
            easing: 'ease-in-out', // Tipo de animación
            origin: 'left', // Desde dónde aparecerá el elemento
            interval: 2000, // Intervalo entre elementos
            reset: true,
        });
        ScrollReveal().reveal('.div3', {
            delay: 300,      // Retraso en milisegundos
            distance: '100px', // Distancia de desplazamiento
            easing: 'ease-in-out', // Tipo de animación
            origin: 'top', // Desde dónde aparecerá el elemento
            interval: 2000,
            reset: true, 
        });
        ScrollReveal().reveal('.div4', {
            delay: 300,      // Retraso en milisegundos
            distance: '100px', // Distancia de desplazamiento
            easing: 'ease-in-out', // Tipo de animación
            origin: 'rigth', // Desde dónde aparecerá el elemento
            interval: 2000, // Intervalo entre elementos
            reset: true,
        });
        ScrollReveal().reveal('.header2', {
            delay: 300,      // Retraso en milisegundos
            duration: 2000, // Distancia de desplazamiento
            easing: 'ease-in-out', // Tipo de animación
            origin: 'center', // Desde dónde aparecerá el elemento
          
            reset: true,
        });



        var isCarouselPaused = false;

        // Esta función se encargará de avanzar el carrusel a la siguiente imagen
        function moveCarouselNext() {
            if (!isCarouselPaused) {
                $('#carouselExample').carousel('next');
            }
        }

        // Mueve automáticamente el carrusel hacia la siguiente imagen cada 5 segundos
        var interval = setInterval(moveCarouselNext, 3500);

        // Pausa/Reanuda el carrusel al hacer clic en los controles de navegación
        $('.carousel-control-prev, .carousel-control-next').click(function () {
            isCarouselPaused = !isCarouselPaused;
        });

        // Pausa el carrusel cuando el mouse está sobre una imagen del carrusel
        $('.carousel-item img').mouseenter(function () {
            clearInterval(interval);
            isCarouselPaused = true;
        });

        // Reanuda el carrusel cuando el mouse sale de una imagen del carrusel
        $('.carousel-item img').mouseleave(function () {
            interval = setInterval(moveCarouselNext, 3500);
            isCarouselPaused = false;
        });



        const openChatButton = document.getElementById("openChatButton");
        const chatbox = document.getElementById("chatbox");

        openChatButton.addEventListener("click", function() {
            chatbox.classList.toggle("show-chatbox");
        });
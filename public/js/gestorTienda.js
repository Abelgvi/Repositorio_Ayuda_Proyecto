document.addEventListener('DOMContentLoaded', function () {
    // Seleccionamos todos los checkboxes
    const filters = document.querySelectorAll('.filters input[type="checkbox"]');

    // Escuchamos cuando alguien marca o desmarca
    filters.forEach(filter => {
        filter.addEventListener('change', function () {
            fetchProducts();
        });
    });

    function fetchProducts() {
        // Recoger qué checkboxes están marcados
        const selectedAnimals = Array.from(document.querySelectorAll('input[name="animal[]"]:checked')).map(el => el.value);
        const selectedCategories = Array.from(document.querySelectorAll('input[name="categoria[]"]:checked')).map(el => el.value);

        // Crear la URL con los parámetros (ej: /tienda?animal[]=perro)
        const params = new URLSearchParams();
        selectedAnimals.forEach(val => params.append('animal[]', val));
        selectedCategories.forEach(val => params.append('categoria[]', val));

        const url = `${window.location.pathname}?${params.toString()}`;

        // Petición AJAX al servidor
        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.text())
            .then(html => {
                // Reemplazamos el contenido del contenedor
                document.getElementById('products-container').innerHTML = html;
                // Cambiamos la URL del navegador sin recargar
                window.history.pushState({}, '', url);
            })
            .catch(error => console.error('Error:', error));
    }
});

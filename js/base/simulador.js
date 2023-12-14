$(document).ready(function () {
// Obtiene elementos del DOM
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
const userImageInput = document.getElementById('userImageInput');
const tattooGallery = document.querySelector('.tattoo-gallery');
const tattoos = document.querySelectorAll('.tattoo');

// Variables para rastrear el estado del simulador
let userImage = null; // Imagen de fondo seleccionada por el usuario
let selectedTattoo = null; // Tatuaje seleccionado desde la galería
let tattooX = 0; // Posición X del tatuaje
let tattooY = 0; // Posición Y del tatuaje
let tattooScale = 1; // Escala del tatuaje
let tattooRotation = 0; // Rotación del tatuaje
let isDragging = false; // Estado para el arrastre del tatuaje

// Evento cuando el usuario carga una imagen de fondo
userImageInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    const reader = new FileReader();

    reader.onload = (event) => {
        const img = new Image();
        img.src = event.target.result;

        img.onload = () => {
            // Redimensiona la imagen si es más grande que 900x900
            const maxSize = 900;
            let newWidth = img.width;
            let newHeight = img.height;

            if (img.width > maxSize || img.height > maxSize) {
                if (img.width > img.height) {
                    newWidth = maxSize;
                    newHeight = (img.height / img.width) * maxSize;
                } else {
                    newHeight = maxSize;
                    newWidth = (img.width / img.height) * maxSize;
                }
            }

            userImage = new Image();
            userImage.src = event.target.result;
            userImage.width = newWidth;
            userImage.height = newHeight;

            canvas.width = newWidth;
            canvas.height = newHeight;
            drawCanvas();
        };
    };

    reader.readAsDataURL(file);
});

// Evento cuando el usuario hace clic en un tatuaje en la galería
tattoos.forEach((tattoo) => {
    tattoo.addEventListener('click', () => {
        selectedTattoo = new Image();
        selectedTattoo.src = tattoo.getAttribute('data-tattoo');
        selectedTattoo.onload = drawCanvas;
    });
});

// Función para dibujar en el canvas
function drawCanvas() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    if (userImage) {
        ctx.drawImage(userImage, 0, 0, canvas.width, canvas.height);
    }

    if (selectedTattoo) {
        ctx.save();
        ctx.translate(tattooX, tattooY);
        ctx.rotate(tattooRotation);
        ctx.scale(tattooScale, tattooScale);
        ctx.drawImage(selectedTattoo, -selectedTattoo.width / 2, -selectedTattoo.height / 2);
        ctx.restore();
    }
}

// Evento cuando el usuario hace clic y arrastra el tatuaje
canvas.addEventListener('mousedown', (e) => {
    const canvasBounds = canvas.getBoundingClientRect();
    const mouseX = e.clientX - canvasBounds.left;
    const mouseY = e.clientY - canvasBounds.top;

    if (selectedTattoo) {
        const centerX = canvas.width / 2;
        const centerY = canvas.height / 2;

        // Calcula el área de detección más grande
        const detectionRadius = Math.max(
            selectedTattoo.width * tattooScale / 5,
            selectedTattoo.height * tattooScale / 5
        ) * 10;

        const offsetX = mouseX - centerX;
        const offsetY = mouseY - centerY;

        const distance = Math.sqrt(offsetX * offsetX + offsetY * offsetY);

        if (distance <= detectionRadius) {
            isDragging = true;

            canvas.addEventListener('mousemove', onMouseMove);
            canvas.addEventListener('mouseup', onMouseUp);

            function onMouseMove(e) {
                if (isDragging) {
                    const newMouseX = e.clientX - canvasBounds.left;
                    const newMouseY = e.clientY - canvasBounds.top;

                    tattooX = newMouseX - offsetX;
                    tattooY = newMouseY - offsetY;
                    drawCanvas();
                }
            }

            function onMouseUp() {
                isDragging = false;
                canvas.removeEventListener('mousemove', onMouseMove);
                canvas.removeEventListener('mouseup', onMouseUp);
            }
        }
    }
});

// Evento para controlar la rotación del tatuaje usando las teclas de flecha
canvas.addEventListener('keydown', (e) => {
    if (selectedTattoo) {
        if (e.key === 'ArrowLeft') {
            tattooRotation -= 0.1;
        } else if (e.key === 'ArrowRight') {
            tattooRotation += 0.1;
        } else if (e.key === 'ArrowUp') {
            tattooScale += 0.1; // Aumentar el tamaño
        } else if (e.key === 'ArrowDown') {
            tattooScale -= 0.1; // Disminuir el tamaño
        }
        drawCanvas();
    }
});

window.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowUp' || e.key === 'ArrowDown' || e.key === 'ArrowLeft' || e.key === 'ArrowRight') {
        e.preventDefault();
    }
});
});//ready
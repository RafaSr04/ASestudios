var productos = [];
$(document).ready(function () {
    
    peticion("tienda", "listadotienda", "").done(function(response){
        if(response != ""){
            var codigo = response["code"];
            var mensaje = response["data"].mensaje;
            if(codigo == "OK"){
                productos = response["data"];
                $(".container-items").empty().html(armar_html(productos));
                
            }else{
                
                muestra_mensaje("error", mensaje,10);
            }
        }else{
            
            muestra_mensaje("error", mensaje,10);
        }
    });
    const btnCart = document.querySelector('.container-cart-icon');
    const containerCartProducts = document.querySelector(
        '.container-cart-products'
    );
    
    btnCart.addEventListener('click', () => {
        containerCartProducts.classList.toggle('hidden-cart');
    });
    
    /* ========================= */
    const cartInfo = document.querySelector('.cart-product');
    const rowProduct = document.querySelector('.row-product');
    
    // Lista de todos los contenedores de productos
    const productsList = document.querySelector('.container-items');
    
    // Variable de arreglos de Productos
    let allProducts = [];
    
    const valorTotal = document.querySelector('.total-pagar');
    
    const countProducts = document.querySelector('#contador-productos');
    
    const cartEmpty = document.querySelector('.cart-empty');
    const cartTotal = document.querySelector('.cart-total');
    
    productsList.addEventListener('click', e => {
        if (e.target.classList.contains('btn-add-cart')) {
            var cantidad = 1;
            const product = e.target.parentElement;
            const infoProduct = {
                quantity: 1,
                title: product.querySelector('h2').textContent,
                price: product.querySelector('p').textContent,
                stock: product.querySelector('h3').textContent
            };
            text = infoProduct.stock.replace("Stock: ", "");
            const exits = allProducts.some(
                product => product.title === infoProduct.title
                );
                if( parseInt(text) > 0){
                if (exits) {
                    const products = allProducts.map(product => {
                    if (product.title === infoProduct.title) {
                        product.quantity++;
                        return product;
                    } else {
                        return product;
                    }
                });
                allProducts = [...products];
                product.querySelector('h3').textContent = "Stock: "+(parseInt(text-1));
            } else {
                product.querySelector('h3').textContent = "Stock: "+(parseInt(text-1));
                allProducts = [...allProducts, infoProduct];
            }   
        }                     
            showHTML();
        }
    });
    
    rowProduct.addEventListener('click', e => {
        if (e.target.classList.contains('icon-close')) {
            const product = e.target.parentElement;
            const title = product.querySelector('p').textContent;
            const cantidad = product.querySelector('span').textContent;
            var stock=$(".stock[producto="+title+"]").text();
            var stockf=stock.replace("Stock: ", "");
            $(".stock[producto="+title+"]").text("Stock: " + (parseInt(stockf)+parseInt(cantidad)));
            allProducts = allProducts.filter(
                product => product.title !== title
                );
    
            showHTML();
        }
    });
    
    // Funcion para mostrar  HTML
    const showHTML = () => {
        if (!allProducts.length) {
            cartEmpty.classList.remove('hidden');
            rowProduct.classList.add('hidden');
            cartTotal.classList.add('hidden');
        } else {
            cartEmpty.classList.add('hidden');
            rowProduct.classList.remove('hidden');
            cartTotal.classList.remove('hidden');
        }
    
        // Limpiar HTML
        rowProduct.innerHTML = '';
    
        let total = 0;
        let totalOfProducts = 0;
    
        allProducts.forEach(product => {
            const containerProduct = document.createElement('div');
            containerProduct.classList.add('cart-product');
    
            containerProduct.innerHTML = `
                <div class="info-cart-product">
                    <span class="cantidad-producto-carrito">${product.quantity}</span>
                    <p class="titulo-producto-carrito">${product.title}</p>
                    <span class="precio-producto-carrito">${product.price}</span>
                </div>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="icon-close"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
            `;
    
            rowProduct.append(containerProduct);
    
            total =
                total + parseInt(product.quantity * product.price.slice(1));
            totalOfProducts = totalOfProducts + product.quantity;
            containerProduct.innerHTML += 
            '<div id="paypalpago">'+
            '<form action="https://www.paypal.com/donate" method="post" target="_top">'+
'                <input type="hidden" name="business" value="QR5UE4GFUSPZW" />'+
                '<input type="hidden" name="amount" class="amount" value="'+total+'" />'+
                '<input type="hidden" name="no_recurring" value="1" />'+
                '<input type="hidden" name="currency_code" value="MXN" />'+
                '<input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_donate_SM.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donar con el botón PayPal" />'+
               ' </form>   '    +                      
        '</div>';
        });
    

        valorTotal.innerText = `$${total}`;
        countProducts.innerText = totalOfProducts;
    };


});//ready

function armar_html(datos){
    let html = "";
    $.each(datos , function (index, value){
      html += '<div class="item">'+
                '<figure>'+
                '<img src="data:image/png;base64,'+value.imagen+'" alt="producto"/>'+
                '</figure>'+
                '<div class="info-product">'+
                '<h2>'+value.descripcion+'</h2>'+
                '<p class="price">$'+value.precio_unitario+'</p>'+
                '<h3 class="stock" producto="'+value.descripcion+'">Stock: '+value.cantidad+'</h3>'+
                '<button class="btn-add-cart">Añadir al carrito</button>'+
                '</div>'+
                '</div>';
    });
    return html;
}
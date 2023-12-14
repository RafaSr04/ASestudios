<script type="text/javascript" src="{$ruta_js}/menu{$extencion_js}?v={$version}"></script>
<link rel="stylesheet" href="css/menu.css" type="text/css" />
<script type="text/javascript" src="js/jquery.fancybox.js?v=1.0.0"></script>
<script type="text/javascript" src="js/jquery.fancybox.pack.js?v=1.0.0"></script>
<div id="contmenu">
    <div id="menu">
    <div id="logo"><img id="logo" src="img/logo.png" class="logo" alt="Logo" /></div>
        {if $rol == 2}
        <div id="menubotones">
            
            <div id="" class="botonesmenu btnquien">
                <a>¿Quiénes Somos?</a>
            </div>
            <div id="" class="botonesmenu btntienda">
                <a href="?op=tienda">Tienda</a>
            </div>
            <div class="container-icon">
				<div class="container-cart-icon">
					<svg
						xmlns="http://www.w3.org/2000/svg"
						fill="none"
						viewBox="0 0 24 24"
						stroke-width="1.5"
						stroke="currentColor"
						class="icon-cart"
					>
						<path
							stroke-linecap="round"
							stroke-linejoin="round"
							d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
						/>
					</svg>
					<div class="count-products">
						<span id="contador-productos">0</span>
					</div>
				</div>

				<div class="container-cart-products hidden-cart">
					<div class="row-product hidden">
						<div class="cart-product">
							<div class="info-cart-product">
								<span class="cantidad-producto-carrito">1</span>
								<p class="titulo-producto-carrito">Zapatos Nike</p>
								<span class="precio-producto-carrito">$80</span>
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
						</div>
					</div>

					<div class="cart-total hidden">
						<h3>Total:</h3>
						<span class="total-pagar">$200</span>
					</div>
					<p class="cart-empty">El carrito está vacío</p>
				</div>
			</div>
            <div class="dropdown">
                <div class="title" id="MenuDrp" class="botonesmenu">
                    <p>Hola Usuario ▾</p>
                </div>
               
               <div class='menud hide'>
                <a href="?op=mi_perfil">
                    <div class="option" id="mi_perfil_menu" name="mi_perfil_menu">Mi perfil</div>
                </a>
                <div class='option' id="mis_solicitudes" name="mis_solicitudes">Mis Citas</div>
                                
                <div class='option' id="cerrarses" name="cerrar_sesion_menu">Cerrar sesión</div>
                
                </div>
            </div>
            {elseif $rol == 1}
            <div class="dropdown">
                <div class="title" id="MenuDrp" class="botonesmenu">
                    <p>Hola Administrador ▾</p>
                </div>
               
               <div class='menud hide'>
                <a href="?op=admintienda">
                    <div class="option" id="mi_perfil_menu" name="mi_perfil_menu">Tienda</div>
                </a>
                <div class='option' id="mis_solicitudes" name="mis_solicitudes">Citas</div>
                
                <div class='option' id="mis_usuarios" name="mis_usuarios">Usuarios</div>
                
                <div class='option' id="cerrarses" name="cerrar_sesion_menu">Cerrar sesión</div>
                
                </div>
            </div>
            {elseif $rol == 3}
            <div class="dropdown">
                <div class="title" id="MenuDrp" class="botonesmenu">
                    <p>Hola Tatuador ▾</p>
                </div>
               
               <div class='menud hide'>
                <a href="?op=solicitudes">
                    <div class="option" id="mi_perfil_menu" name="mi_perfil_menu">Citas Pendientes</div>
                </a>
                                
                <div class='option' id="cerrarses" name="cerrar_sesion_menu">Cerrar sesión</div>
                
                </div>
            </div>
        {/if}
        </div>
    </div>
</div>
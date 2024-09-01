@extends('partials.layout')

@section('content')



@endsection
<main class="cart">
		<div class="products">
			<div class="volver">
				<a href="catalogo.html">
					<i class="fa-solid fa-arrow-left"></i> Continuar comprando
				</a>
			</div>
			<div class="items">
				<b>Carrito de compras</b>
				<p>Tienes # productos en tu carrito</p>
			</div>
			<div class="producto">
				<img src="https://http2.mlstatic.com/D_NQ_NP_911977-MLA44294048723_122020-O.webp" alt="producto" />
				<div class="infoProduc">
					<b>Iphone 11 pro</b>
					<p>256GB, navy blue</p>
				</div>
				<p class="cantidad">2</p>
				<div class="precio">
					<b>$900</b>
					<i class="fa-regular fa-trash-can"></i>
				</div>
			</div>
		</div>
		<div class="pago">
			<b>Forma de pago</b>
			<div class="forma">
				<label for="contactChoice1" class="radio">
					<input type="radio" id="contactChoice1" name="contact" value="email" />
					<span>
						<img width="30" src="https://img.icons8.com/officel/48/000000/visa.png" />
					</span>
				</label>

				<label for="contactChoice2" class="radio">
					<input type="radio" id="contactChoice2" name="contact" value="email" />
					<span>
						<img width="30" src="https://img.icons8.com/color/48/000000/mastercard.png" />
					</span>
				</label>

				<label for="contactChoice3" class="radio">
					<input type="radio" id="contactChoice3" name="contact" value="email" />
					<span>
						<img width="30" src="https://img.icons8.com/ultraviolet/48/000000/amex.png" />
					</span>
				</label>

				<label for="contactChoice4" class="radio">
					<input type="radio" id="contactChoice4" name="contact" value="email" />
					<span>
						<img width="30" src="https://img.icons8.com/officel/48/000000/paypal.png" />
					</span>
				</label>
			</div>
			<br />
			<div class="infoForma">
				<label>Número Tarjeta</label><br />
				<input type="number" placeholder="1234 1234 1234 1234 1234" disabled /><br />
				<div class="fechaCVV">
					<div>
						<label>Fecha expiración</label><br /><input type="number" placeholder="10/25" disabled /><br />
					</div>
					<div>
						<label>CCV</label><br />
						<input type="number" placeholder="123" disabled /><br />
					</div>
				</div>
			</div>
			<div class="infoPrecio">
				<div>
					<p>Subtotal</p>
					<p>Envío</p>
					<p>Total</p>
				</div>
				<div>
					<p>$30000</p>
					<p>$20</p>
					<p>$3020</p>
				</div>
			</div>
			<button class="botonPago">
				<p>3020</p>
				<p>Comprar <i class="fa-solid fa-arrow-right"></i></p>
			</button>
		</div>
	</main>
@section('style')
@vite('resources/css/carrito.css')
@endsection
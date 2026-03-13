
let carrito = [];
let costo = 0;

document.querySelectorAll(".productAgregar").forEach(btn => {

    btn.addEventListener("click", () => {

        const id = btn.dataset.id;
        const nombre = btn.dataset.name;
        const precio = parseFloat(btn.dataset.price);

        const existente = carrito.find(p => p.id === id);

        if(existente){
            existente.cantidad++;
        }else{
            carrito.push({
                id,
                nombre,
                precio,
                cantidad: 1
            });
        }

        renderCart();
    });

});

function renderCart(){

    const cartItems = document.getElementById("cartItems");
    const cartTotal = document.getElementById("cartTotal");

    cartItems.innerHTML = "";

    let total = 0;

    carrito.forEach(producto => {

        total += producto.precio * producto.cantidad;

        cartItems.innerHTML += `
            <div class="cartItem">

                <span>${producto.nombre}</span>

                <input 
                    type="number"
                    min="0"
                    value="${producto.cantidad}"
                    onchange="cambiarCantidad('${producto.id}', this.value)"
                >

                <span>$${producto.precio * producto.cantidad}</span>

                <button 
                    type="button"
                    onclick="eliminarProducto('${producto.id}')"
                >
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    >
                    <path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" />
                    <path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" />
                    </svg>

                </button>

            </div>
        `;
    });

    costo = total;
    cartTotal.textContent = total.toFixed(2);
}
function cambiarCantidad(id, cantidad){

    cantidad = parseInt(cantidad);

    if(cantidad <= 0){
        eliminarProducto(id);
        return;
    }

    const producto = carrito.find(p => p.id === id);

    if(producto){
        producto.cantidad = cantidad;
    }

    renderCart();
}

function eliminarProducto(id){

    carrito = carrito.filter(producto => producto.id !== id);

    renderCart();
}

document.getElementById("comprarBtn").addEventListener("click", () => {

    const cliente = document.getElementById("cliente").value;
    const fecha = document.getElementById("fecha").value;
    const hora = document.getElementById("hora").value;

    if(!cliente){
        alert("Selecciona un cliente");
        return;
    }

    if(!fecha){
        alert("Selecciona una fecha de entrega");
        return;
    }

    if(!hora){
        alert("Selecciona una hora de entrega");
        return;
    }

    if(carrito.length === 0){
        alert("El carrito está vacío");
        return;
    }
    
    const fechaEntrega = new Date(`${fecha}T${hora}`);
    const ahora = new Date();

    if(fechaEntrega <= ahora){
        alert("La fecha y hora de entrega deben ser posteriores a la actual");
        return;
    }

    enviarCompra(cliente, fecha, hora);
});

function enviarCompra(cliente, fecha, hora){

    const data = {
        cliente,
        fecha,
        hora,
        productos: carrito,
        costo: costo
    };
    console.log(JSON.stringify(data, null, 2));

    fetch("/src/queries/guardarCompra.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(data => {
        if(!data.success){
        alert(data.message);
        return;
    }
    alert("Compra guardada");
    location.reload();
    });

}
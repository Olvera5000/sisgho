<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css" />
  <title>GHOSP (Hospedaje en linea)</title>
</head>
<body>


</body>
</html>
<head>

</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Escoja entre varias de nuestras opciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
             
            <a type="button" href="{{ route('productos.create') }}" class="bg-indigo-500 px-12 py-2 rounded text-gray-200 font-semibold hover:bg-indigo-800 transition duration-200 each-in-out">Crear</a><br> <br>
           
<div class="row">
<div class="grid grid-cols-1 md:grid-cols-1 gap-5 md:gap-8 mt-5 mx-7">
    @foreach($productos as $producto)
                <strong><h1 class="font-semibold text-xl text-gray-800 leading-tight">{{ $producto->nombre }}</h1></strong>
                <p><img src="/imagen/{{$producto->imagen}}" class="card-img-top img-fluid" align="left" width="270px"><br>{{ $producto->descripcion }}</p>
                <div class="non">
                <p><strong>Precio: </strong> ${{ $producto->precio }}.00</p>  
                </div>
                    <td>  
                            <!-- botón borrar -->
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="formEliminar">
                             <!-- botón rentar -->
                             <a href="{{ route('productos.rent') }}" class="rounded bg-green-500 hover:bg-gray-600 text-white font-bold py-2 px-4">Rentar</a>
                            <!-- botón editar -->
                            <a href="{{ route('productos.edit', $producto->id) }}" class="rounded bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4">Editar</a>
                            @csrf
                            @method('DELETE')
                                    <button type="submit" class="rounded bg-red-400 hover:bg-pink-500 text-white font-bold py-2 px-4">Borrar</button>
                                </form>
                            </td>
                           <br>  
     @endforeach
</div>
<div>
                    {!! $productos->links() !!}
                </div>
</div>
     


  
<!-- Second Photo Grid-->

            </div>
           

        </div>
        
    </div>
    
</x-app-layout>
<script>
    (function () {
  'use strict'
  //debemos crear la clase formEliminar dentro del form del boton borrar
  //recordar que cada registro a eliminar esta contenido en un form  
  var forms = document.querySelectorAll('.formEliminar')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {        
          event.preventDefault()
          event.stopPropagation()        
          Swal.fire({
                title: '¿Confirma la eliminación del registro?',        
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#20c997',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                    Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.','success');
                }
            })                      
      }, false)
    })
})()
</script>



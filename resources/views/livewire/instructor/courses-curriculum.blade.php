<div>
    <x-slot name="course">
        {{ $course->slug }}
    </x-slot>

    <h1 class="text-2xl font-bold">LECCIONES DEL CURSO</h1>
    <hr class="mt-2 mb-6">

    @foreach ($course->sections as $item)
        
        <article class="card mb-6">
            <div class="card-body bg-gray-100">

                @if ($section->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="section.name" class="text-gray-700 align-middle h-10 rounded-xl w-full" placeholder="Ingrese el nombre de la seccion">

                        @error('section.name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </form>
                @else

                    <header class="flex justify-between items-center">
                        <h1 class="cursor-pointer"><strong>Seccion: </strong>{{ $item->name }}</h1>

                        <div>
                            <i class="fas fa-edit cursor-pointer text-blue-500" wire:click="edit({{ $item }})"></i>
                            <i class="fas fa-eraser cursor-pointer text-red-500" wire:click="destroy({{ $item }})"></i>
                        </div>
                    </header>
                    
                @endif

            </div>
        </article>

    @endforeach

    <div x-data="{open:false}">

        <a x-show="!open" x-on:click="open = true"  class="flex items-center cursor-pointer mb-4">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva seccion
        </a>

        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold">Agregar nueva seccion</h1>

                <div>
                    <input wire:model="name" class="text-gray-700 align-middle h-10 rounded-xl w-full mt-2" placeholder="Escriba el nombre de la seccion">

                    @error('name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end mt-4">
                    <button x-on:click="open = false" class="btn btn-danger">Cancelar</button>
                    <button class=" btn btn-primary ml-2" wire:click="store">Agregar</button>
                </div>
            </div>
        </article>

    </div>
</div>

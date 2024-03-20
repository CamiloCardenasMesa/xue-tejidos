<x-guest-layout>
    <div class="bg-white">
        <header>
            <div class="relative h-screen flex w-full justify-center items-center">
                <img class="object-cover h-full w-full" src="{{ asset('storage/images/guest/header.jpg') }}"
                    alt="gorros tejidos">
                <div class="absolute mt-10 flex flex-col items-center justify-center">
                    <h1 class="text text-2xl lg:text-7xl uppercase font-bold text-white">Tejidos personalizados</h1>
                    <h2 class="text-lg lg:text-3xl font-light text-white">Hechos a tu medida</h2>
                    <x-primary-button class="mt-9 lg:mt-6">
                        QUIENES SOMOS
                    </x-primary-button>
                </div>
            </div>
        </header>
        <main>
            <!-- MUJERES-->
            <section>
                <div class="flex items-center justify-center h-10 lg:h-20">
                    <h3 class="w-full text-center lg:py-2 text-white bg-[#666666] text-lg lg:text-4xl">Mujer</h3>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-1 mt-1 h-[950px] cursor-pointer">
                    <x-product-category-card imageA="storage/images/guest/croptop1.jpg"
                        imageB="storage/images/guest/croptop2.jpg" title="Crop Tops" />
                    <x-product-category-card imageA="storage/images/guest/sueter2.jpg"
                        imageB="storage/images/guest/sueter1.jpg" title="Suéteres" />
                    <x-product-category-card imageA="storage/images/guest/blusa1.jpg"
                        imageB="storage/images/guest/blusa2.jpg" title="Blusas" />
                </div>
            </section>

            <!-- HOMBRES-->
            <section>
                <div class="flex items-center justify-center h-10 lg:h-20">
                    <h3 class="w-full text-center lg:py-2 text-white bg-[#666666] text-lg lg:text-4xl">Hombre</h3>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-1 h-[950px] mt-1 cursor-pointer">
                    <x-product-category-card imageA="storage/images/guest/sueterHombre2.jpg"
                        imageB="storage/images/guest/sueterHombre1.jpg" title="Suéteres" />
                    <x-product-category-card imageA="storage/images/guest/cuello2.jpg"
                        imageB="storage/images/guest/cuello1.jpg" title="Buffs-Cuellos" />
                    <x-product-category-card imageA="storage/images/guest/gorro2.jpg"
                        imageB="storage/images/guest/gorro1.jpg" title="Gorros-Pasamontañas" />
                </div>
            </section>
        </main>
    </div>
</x-guest-layout>

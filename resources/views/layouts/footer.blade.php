<footer>
    <div class="flex flex-col justify-center items-center overflow-hidden">
        <section class="grid gap-3 grid-cols-1">
            <div class="flex flex-col items-center gap-3 justify-center">
                <p class=" text-center text-md font-regular">Regístrate para recibir noticias de sorteos, promociones y
                    descuentos</p>
                <x-button-link href="{{ route('register') }}" class="flex items-center justify-center p-3">
                    {{ trans('Register') }}
                </x-button-link>
            </div>
            <div class="flex items-center justify-center gap-3">
                <figure>
                    <a href="https://www.facebook.com/xuetejidos" target="blank">
                        @include('icons.media.facebook')
                    </a>
                </figure>
                <figure>
                    <a href="https://www.instagram.com/xue_tejidos/" target="blank">
                        @include('icons.media.instagram')
                    </a>
                </figure>
                <figure>
                    <a href="https://co.pinterest.com/xuetejidos/" target="blank">
                        @include('icons.media.pinterest')
                    </a>
                </figure>
            </div>
        </section>
    </div>
</footer>

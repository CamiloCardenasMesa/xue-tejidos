<div class="justify-center m-10">
    <div class="flex">
        <input class="mr-5" type="text" wire:model="otraCosa">
        <h1 class="text text-5xl font-bold">{{ $otraCosa }}</h1>
    </div>
    <div>
        <input type="text" wire:model="search">
        <ul>
            @foreach ($articles as $article)
                <li>{{ $article->content }}</li>
                <li>{{ $article->title }}</li>
            @endforeach
        </ul>
</div>
</div>

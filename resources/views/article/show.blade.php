
<x-layout  :titre="$art->titre">
    {{-- Div permettant l'espacement --}}
    <div class="space-y-8 md:space-y-6" id="article_pdf">

        {{-- Article --}}
        <article class="flex flex-col lg:flex-row pb-8 md:pb-4 border-b border-slate-50    bg-white/10 backdrop-blur-md border border-white/20 rounded-lg p-2 lg:p-6 shadow-lg ">

            {{-- Image --}}
            <div class="lg:w-5/12">
                @if ($art->image)

                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents($art->image_url)) }}" class="w-full h-full object-cover lg:h-full rounded-sm"/>

                @endif

                @if ($art->image == null)
                    <?php
                        $bgColor = sprintf('%02x%02x%02x', rand(0, 255), rand(0, 255), rand(0, 255)); // Couleur de fond
                        $textColor = sprintf('%02x%02x%02x', rand(0, 255), rand(0, 255), rand(0, 255)); // Couleur du texte
                        $imageText = 'New';
                        // Création de l'article
                        $image = "https://placehold.co/600x400/{$bgColor}/{$textColor}?text={$imageText}";
                    ?>
                    <img src="{{$image }}" alt="" class="w-full h-full object-cover lg:h-full rounded-sm">
                @endif
            </div>

            {{-- Texte --}}
            <div class="flex flex-col items-start mt-5 space-y-5 lg:w-7/12 lg:mt-0 lg:ml-12">
                <h1 class="font-bold text-3xl  text-slate-50 ">{{ $art->titre }}</h1>
                <h2 class="text-2xl font-bold">Context</h2>
                <p class="text-justify lg:text-xl text-base text-wrap" style="font-family: 'jetbrains Mono'; font-weight: lighter; ">
                    {!!   nl2br(e( $art->context )) !!}
                </p>

                {{-- Qrcode --}}
                <div class="lg:absolute lg:bottom-2 lg:left-2">
                    {!! $art->qrcode!!}
                </div>

                <h2 class="text-2xl font-bold">Instruction</h2>
                <p class="text-justify lg:text-xl text-base">{{ $art->instruction }}</p>
                

            </div>
        </article>
    </div>

</x-layout>

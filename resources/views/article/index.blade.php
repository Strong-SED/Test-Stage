
<x-layout>
    {{-- Div permettant l'espacement --}}
    <div
        class="space-y-8 md:space-y-6"
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)">

        {{-- Errors section --}}
        @if (session("success"))
                <template x-if = "show">
                    <div
                        class="w-7/12 rounded-full bg-green-700 text-slate-50 text-lg text-center animate-pulse duration-700 p-4"
                    >
                        {{ session("success") }}
                    </div>
                </template>
            @endif

            @if (session("error"))
            <template x-if ="show">
                    <div class="w-7/12 rounded-full bg-red-700 text-slate-50 text-lg text-center animate-pulse duration-700 p-4">
                        {{ session("error") }}
                    </div>
            </template>
            @endif

        @foreach ( $arts as  $art)

        {{-- Article --}}
        <article
            x-transition.duration.800ms
            class="flex flex-col lg:flex-row pb-8 md:pb-4 border-b border-slate-50      bg-white/10 backdrop-blur-md border border-white/20 rounded-lg lg:p-6 p-2 shadow-lg lg:hover:translate-x-6 lg:hover:scale-100 transition-all duration-700"
            x-data="{
                // On stocke la largeur de l'écran dans une variable dédiée.
                screenWidth: window.innerWidth,
                // Le booléen menu est utilisé pour contrôler l'affichage sur grand écran.
                menu: true,
                // Propriété calculée pour savoir si l'écran est considéré comme mobile.
                get isMobile() {
                    return this.screenWidth < 1024 == true;
                },
                init() {
                    // Met à jour screenWidth à chaque redimensionnement.
                    window.addEventListener('resize', () => {
                        this.screenWidth = window.innerWidth;
                    });
                }
            }">



            {{-- Image --}}
            <div class="lg:w-5/12 max-h-96 overflow-hidden">
                @if ($art->image)

                <img src="data:image/png;base64,{{ base64_encode(file_get_contents($art->image_url)) }}" class="w-full max-h-72 overflow-hidden object-cover lg:max-h-72 rounded-sm"/>

                @elseif($art->image == null)
                <?php
                    $bgColor = sprintf('%02x%02x%02x', rand(0, 255), rand(0, 255), rand(0, 255)); // Couleur de fond
                    $textColor = sprintf('%02x%02x%02x', rand(0, 255), rand(0, 255), rand(0, 255)); // Couleur du texte
                    $imageText = 'New';
                    // Création de l'article
                    $image = "https://placehold.co/600x400/{$bgColor}/{$textColor}?text={$imageText}";
                    ?>

                    <img src="{{$image }}" alt="" class="w-full max-h-72 object-cover lg:max-h-full rounded-sm">

                @endif
            </div>

            {{-- Texte --}}
            <div class="flex flex-col items-start mt-5 space-y-5 lg:w-7/12 lg:mt-0 lg:ml-12 relative">

                <h1 class="font-bold text-3xl  text-slate-50 ">{{ $art->titre }}</h1>

                <p class="text-justify text-xl">{{ $art->description }}.</p>

                {{-- Section lien --}}
                <div class="lg:absolute lg:bottom-2 lg:right-2 hidden lg:block">


                    <button
                        x-cloak
                        class="flex items-center font-bold text-lg rounded-full p-4 hover:scale-105 hover:bg-slate-50 hover:text-orange-700 transition-all text-slate-50 bg-orange-700 duration-700"
                        @click="menu = !menu">
                        <span
                            x-cloak
                            x-text="menu ? 'Option' : 'Moins'">
                        </span>
                        <svg x-cloak x-show="menu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 h-5 w-5 ml-2">
                            <path fill-rule="evenodd" d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75ZM4.117 19.125a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z" clip-rule="evenodd" />
                            <path d="m10.076 8.64-2.201-2.2V4.874a.75.75 0 0 0-.364-.643l-3.75-2.25a.75.75 0 0 0-.916.113l-.75.75a.75.75 0 0 0-.113.916l2.25 3.75a.75.75 0 0 0 .643.364h1.564l2.062 2.062 1.575-1.297Z" />
                            <path fill-rule="evenodd" d="m12.556 17.329 4.183 4.182a3.375 3.375 0 0 0 4.773-4.773l-3.306-3.305a6.803 6.803 0 0 1-1.53.043c-.394-.034-.682-.006-.867.042a.589.589 0 0 0-.167.063l-3.086 3.748Zm3.414-1.36a.75.75 0 0 1 1.06 0l1.875 1.876a.75.75 0 1 1-1.06 1.06L15.97 17.03a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>

                        <svg x-cloak x-show="!menu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 h-5 w-5 ml-2">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <div
                    x-show="isMobile || !menu"
                    x-cloak
                    x-transition.duration.800ms
                    class="lg:absolute lg:top-48 lg:-right-60 z-10 lg:bg-slate-300 flex flex-row justify-center w-full lg:flex-col lg:w-52 rounded-md overflow-hidden py-2">
                    <a
                        x-transition.duration.800ms
                        href="{{ route('show', ['art' => $art]) }}"
                        class="inline-flex font-bold text-orange-700 p-4 rounded-full bg-slate-300 hover:bg-slate-50 hover:scale-105 transition-all duration-700 lg:w-full mx-3 lg:mx-0">
                        <span class="hidden lg:inline-flex">Lire l'article</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-6 h-6 text-orange-700 lg:ml-2">
                            <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375ZM6 12a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V12Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 15a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V15Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 18a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V18Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                        </svg>
                    </a>

                    <a
                        x-cloak
                        x-transition.duration.800ms
                        href="{{ route("pdfView" , $art) }}"
                        class="inline-flex font-bold text-orange-700 p-4 rounded-full bg-slate-300 hover:bg-slate-50 hover:scale-105 transition-all duration-700 lg:w-full mx-3 lg:mx-0">
                        <span class="hidden lg:inline-flex">Rendu PDF</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-6 h-6 text-orange-700 lg:ml-2">
                            <path d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5H5.625Z" />
                            <path d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
                        </svg>
                    </a>

                    @if(auth()->user()->id == $art->user_id)
                        <a
                            x-cloak
                            x-transition.duration.800ms
                            class="inline-flex font-bold text-orange-700 p-4 rounded-full bg-slate-300 hover:bg-slate-50 hover:scale-110 transition-all duration-700 lg:w-full mx-3 lg:mx-0"
                            href="{{ route('article.modify', ['art' => $art]) }}">
                            <span class="hidden lg:inline-flex">Modifier</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-6 h-6 text-orange-700 font-bold lg:ml-2">
                                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                            </svg>
                        </a>

                        <form
                            action="{{ route('destroy', ['art' => $art]) }}"
                            method="POST"
                            class="">
                            @csrf
                            @method('DELETE')
                            <button
                                x-cloak
                                x-transition.duration.800ms
                                class="inline-flex font-bold text-orange-700 p-4 rounded-full bg-slate-300 hover:bg-slate-50 hover:scale-110 transition-all duration-700 lg:w-full mx-3 lg:mx-0"
                                onclick="return confirm('Voulez-vous vraiment supprimer cet article ?')">
                                <span class="hidden lg:inline-flex">supprimer</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-orange-700 font-bold lgm:l-2">
                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    @endif



                </div>

            </div>
        </article>
        @endforeach

        {{-- Pagination --}}
        {{ $arts->links() }}
    </div>
</x-layout>

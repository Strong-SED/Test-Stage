<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config("app.name").  " | "  . $art->titre}}</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased pt-10 pb-16 bg-slate-950 text-slate-50 ">

    {{-- Début : corps de la page  --}}
    <div class="mx-auto px-4 max-w-7xl  sm:px-6 lg:px-8">

        {{-- Header --}}
        <header class="flex justify-between items-center border-b border-slate-50 pb-2 border-opacity-50 rounded-md sticky top-0 z-10 bg-slate-950 pt-6">

            {{-- Logo --}}
            <a href="{{ route("Index") }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-14 h-14 text-slate-50 hover:text-orange-700 hover:scale-110 transition-all">
                    <path fill-rule="evenodd" d="M1.5 9.832v1.793c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875V9.832a3 3 0 0 0-.722-1.952l-3.285-3.832A3 3 0 0 0 16.215 3h-8.43a3 3 0 0 0-2.278 1.048L2.222 7.88A3 3 0 0 0 1.5 9.832ZM7.785 4.5a1.5 1.5 0 0 0-1.139.524L3.881 8.25h3.165a3 3 0 0 1 2.496 1.336l.164.246a1.5 1.5 0 0 0 1.248.668h2.092a1.5 1.5 0 0 0 1.248-.668l.164-.246a3 3 0 0 1 2.496-1.336h3.165l-2.765-3.226a1.5 1.5 0 0 0-1.139-.524h-8.43Z" clip-rule="evenodd" />
                    <path d="M2.813 15c-.725 0-1.313.588-1.313 1.313V18a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-1.688c0-.724-.588-1.312-1.313-1.312h-4.233a3 3 0 0 0-2.496 1.336l-.164.246a1.5 1.5 0 0 1-1.248.668h-2.092a1.5 1.5 0 0 1-1.248-.668l-.164-.246A3 3 0 0 0 7.046 15H2.812Z" />
                </svg>
            </a>

            {{-- Titre de site --}}
            <h1 class="text-4xl text-slate-50 font-bold ml-5">
                Mon <span class="text-orange-700 hover:scale-125 hover:px-3 transition-all inline-block">blog</span> !
            </h1>

            {{-- Navigation --}}
            <nav class=" flex justify-between items-center ">
                <a href="{{ route("article.create") }}" class="flex items-center font-bold text-orange-700 text-lg rounded-full px-4 py-4 bg-slate-300 hover:scale-105 hover:bg-slate-50 transition-all">
                    Ajouter
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-6 h-6 text-orange-700 font-bold ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                      </svg>
                </a>

                <a href="{{ route("Index") }}" class="flex items-center font-bold text-orange-700 text-lg rounded-full p-4 bg-slate-300 hover:scale-105 hover:bg-slate-50 transition-all duration-700 ml-3">
                    Acceuil
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-6 h-6 text-orange-700 font-bold ml-2">
                        <path d="M5.223 2.25c-.497 0-.974.198-1.325.55l-1.3 1.298A3.75 3.75 0 0 0 7.5 9.75c.627.47 1.406.75 2.25.75.844 0 1.624-.28 2.25-.75.626.47 1.406.75 2.25.75.844 0 1.623-.28 2.25-.75a3.75 3.75 0 0 0 4.902-5.652l-1.3-1.299a1.875 1.875 0 0 0-1.325-.549H5.223Z" />
                        <path fill-rule="evenodd" d="M3 20.25v-8.755c1.42.674 3.08.673 4.5 0A5.234 5.234 0 0 0 9.75 12c.804 0 1.568-.182 2.25-.506a5.234 5.234 0 0 0 2.25.506c.804 0 1.567-.182 2.25-.506 1.42.674 3.08.675 4.5.001v8.755h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3Zm3-6a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-.75.75h-3a.75.75 0 0 1-.75-.75v-3Zm8.25-.75a.75.75 0 0 0-.75.75v5.25c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-5.25a.75.75 0 0 0-.75-.75h-3Z" clip-rule="evenodd" />
                      </svg>

                </a>
            </nav>
        </header>

        {{-- Corps de la page avec les articles --}}
        <main class=" mt-8 py-5 px-5 rounded-md">

            {{-- Div permettant l'espacement --}}
            <div class="space-y-8 md:space-y-6">

                {{-- Article --}}
                <article class="flex flex-col lg:flex-row pb-8 md:pb-4 border-b border-slate-50      bg-white/10 backdrop-blur-md border border-white/20 rounded-lg p-6 shadow-lg ">

                    {{-- Image --}}
                    <div class="lg:w-5/12">
                        <img src="{{ $art->image }}" alt="" class="w-full h-full object-cover lg:h-full rounded-sm">
                    </div>

                    {{-- Texte --}}
                    <div class="flex flex-col items-start mt-5 space-y-5 lg:w-7/12 lg:mt-0 lg:ml-12">
                        <h1 class="font-bold text-3xl  text-slate-50 ">{{ $art->titre }}</h1>
                        <h2 class="text-2xl font-bold">Context</h2>
                        <pre class="text-justify text-xl text-wrap">{{ $art->context }}.</pre>

                        <h2 class="text-2xl font-bold">Instruction</h2>
                        <p class="text-justify text-xl">{{ $art->instruction }}</p>

                        <form
                            action="{{ route("destroy" , ['art'=>$art]) }}"
                            method="post"
                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                            @csrf
                            @method("DELETE")

                            <button
                                class="hover:scale-110 transition-all duration-700 lg:absolute lg:bottom-2 lg:right-2"
                                type="submit"
                                >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-10 h-10 text-orange-700 font-bold">
                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                                  </svg>

                                </button>
                        </form>

                    </div>
                </article>
            </div>
        </main>
    </div>
</body>
</html>

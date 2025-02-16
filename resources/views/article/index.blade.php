<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config("app.name").  " | "  . "Acceuil" }}</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased pt-10 pb-16 bg-slate-950 text-slate-50 ">

    {{-- Début : corps de la page  --}}
    <div
        x-data ="{ active : true}"
        class="mx-auto px-4 max-w-7xl  sm:px-6 lg:px-8">

        {{-- Header --}}
        <header class="flex justify-between items-center border-b border-slate-50 pb-2 border-opacity-50 rounded-md sticky top-0 z-10 bg-slate-950 pt-6">

            {{-- Logo --}}
            <a href="{{ route("Index") }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-14 h-14 text-slate-50 hover:text-orange-700 hover:scale-110 transition-all duration-700">
                    <path fill-rule="evenodd" d="M1.5 9.832v1.793c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875V9.832a3 3 0 0 0-.722-1.952l-3.285-3.832A3 3 0 0 0 16.215 3h-8.43a3 3 0 0 0-2.278 1.048L2.222 7.88A3 3 0 0 0 1.5 9.832ZM7.785 4.5a1.5 1.5 0 0 0-1.139.524L3.881 8.25h3.165a3 3 0 0 1 2.496 1.336l.164.246a1.5 1.5 0 0 0 1.248.668h2.092a1.5 1.5 0 0 0 1.248-.668l.164-.246a3 3 0 0 1 2.496-1.336h3.165l-2.765-3.226a1.5 1.5 0 0 0-1.139-.524h-8.43Z" clip-rule="evenodd" />
                    <path d="M2.813 15c-.725 0-1.313.588-1.313 1.313V18a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-1.688c0-.724-.588-1.312-1.313-1.312h-4.233a3 3 0 0 0-2.496 1.336l-.164.246a1.5 1.5 0 0 1-1.248.668h-2.092a1.5 1.5 0 0 1-1.248-.668l-.164-.246A3 3 0 0 0 7.046 15H2.812Z" />
                </svg>
            </a>

            {{-- Titre de site --}}
            <h1 class="text-4xl text-slate-50 font-bold lg:ml-20 hidden md:block">
                Mon <span class="text-orange-700 hover:scale-125 hover:px-3 transition-all duration-700 inline-block">blog</span> !
            </h1>

            {{-- Navigation --}}
            <nav class=" flex justify-between items-center ">
                <a href="{{ route("article.create") }}" class="flex items-center font-bold text-orange-700 text-lg rounded-full px-4 py-4 bg-slate-300 hover:scale-105 hover:bg-slate-50 transition-all duration-700">
                    Ajouter
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-6 h-6 text-orange-700 font-bold ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                      </svg>
                </a>

                <button
                    @click = "active = !active "
                    class="flex items-center font-bold text-orange-700 text-lg rounded-full p-4 bg-slate-300 hover:scale-105 hover:bg-slate-50 transition-all duration-700 ml-3">

                    <span
                        x-text = "active? 'Modifier' : 'Voir plus' "
                        x-transition.800ms   ></span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-6 h-6 text-orange-700 font-bold ml-2">
                        <path fill-rule="evenodd" d="M15.97 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 1 1-1.06-1.06l3.22-3.22H7.5a.75.75 0 0 1 0-1.5h11.69l-3.22-3.22a.75.75 0 0 1 0-1.06Zm-7.94 9a.75.75 0 0 1 0 1.06l-3.22 3.22H16.5a.75.75 0 0 1 0 1.5H4.81l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                      </svg>


                </button>
            </nav>
        </header>

        {{-- Corps de la page avec les articles --}}
        <main class=" mt-8 py-5 px-5 rounded-md">

            {{-- Div permettant l'espacement --}}
            <div
                class="space-y-8 md:space-y-6"
                x-data="{ show: true }"
                x-init="setTimeout(() => show = false, 3000)">

                {{-- Article --}}
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
                <article class="flex flex-col lg:flex-row pb-8 md:pb-4 border-b border-slate-50      bg-white/10 backdrop-blur-md border border-white/20 rounded-lg p-6 shadow-lg lg:hover:translate-x-10 lg:hover:scale-100 hover:scale-105 transition-all duration-700">

                    {{-- Image --}}
                    <div class="lg:w-5/12">
                        <img src="{{ $art->image }}" alt="" class="w-full max-h-72 object-cover lg:max-h-full rounded-sm">
                    </div>

                    {{-- Texte --}}
                    <div class="flex flex-col items-start mt-5 space-y-5 lg:w-7/12 lg:mt-0 lg:ml-12">

                        <h1 class="font-bold text-3xl  text-slate-50 ">{{ $art->titre }}</h1>

                        <p class="text-justify text-xl">{{ $art->description }}.</p>

                        <a
                            x-show = "active"
                            x-transition.duration.800ms
                            href="{{ route("show" , ['art' => $art]) }}"
                            class="flex justify-between items-center font-bold text-orange-700 p-4 rounded-full bg-slate-300  hover:bg-slate-50 hover:scale-110 transition-all duration-700 lg:absolute lg:bottom-6  ">
                            Lire l'article
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-6 h-6 text-orange-700 ml-3 ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                              </svg>
                        </a>

                        <a
                            x-show="!active"
                            x-transition.duration.800ms
                            class="flex justify-between items-center font-bold text-orange-700 p-4 rounded-full bg-slate-300  hover:bg-slate-50 hover:scale-110 transition-all duration-700 lg:absolute lg:bottom-6 "
                            href="{{ route("article.modify" , ["art" => $art]) }}">
                            Modifier
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-6 h-6 text-orange-700 font-bold ml-2">
                                <path fill-rule="evenodd" d="M10.5 3.75a6 6 0 0 0-5.98 6.496A5.25 5.25 0 0 0 6.75 20.25H18a4.5 4.5 0 0 0 2.206-8.423 3.75 3.75 0 0 0-4.133-4.303A6.001 6.001 0 0 0 10.5 3.75Zm2.25 6a.75.75 0 0 0-1.5 0v4.94l-1.72-1.72a.75.75 0 0 0-1.06 1.06l3 3a.75.75 0 0 0 1.06 0l3-3a.75.75 0 1 0-1.06-1.06l-1.72 1.72V9.75Z" clip-rule="evenodd" />
                              </svg>

                        </a>
                    </div>
                </article>
                @endforeach

                {{-- Pagination --}}
                {{ $arts->links() }}
            </div>
        </main>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $art->titre }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: "Jetbrains Mono";
            letter-spacing: -2px;
            line-height: 1.6;
            margin: 0 auto;
            width: 100%;
            max-width: 1000px;
            padding: 20px;
            height: auto;
        }

        h1 {
            font: normal bold 30px / 1 "Jetbrains Mono";
            color: #000;
            text-align: center;
            padding: 50px 0;
        }

        h2 {
            font: normal bold 25px / 1 "Jetbrains Mono";
            color: #000;
            margin-top: 30px;
        }

        .content {
            margin-top: 20px;
        }

        .content p {
            font: normal lighter 18px / 1 "Jetbrains Mono";
            margin: 20px 0;
            text-align: justify;
        }

        .gala {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .image, .qrcode {
            width: 300px;
            height: 300px;
            margin: 10px;
            overflow: hidden;
        }

        .image img, .qrcode img {
            width: 100%;
            height: auto;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 10px;
            color: gray;
        }

        .footer p {
            font: normal bold 25px / 1 "Oswald";
        }

        @media (max-width : 1024px){
            body {
                width: 90%;
                padding: 10px;
            }

            .gala {
                flex-direction: column;
            }

            .image, .qrcode {
                width: 100%;
                max-width: 300px;
                margin: 10px auto;
            }

            .content p {
                font: normal lighter 18px / 1 "Jetbrains Mono";
                margin: 20px 0;
                text-align: justify;
            }
        }
    </style>
</head>
<body id="article_pdf">
    <h1>{{ $art->titre }}</h1>

    <div class="gala">
        <div class="image">
            @if ($art->image_url)
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents($art->image_url)) }}" alt="mon article"/>
            @endif
        </div>

        <div class="qrcode">
            {!! $art->qrcode !!}
        </div>
    </div>

    <div class="content">
        <h2>Context</h2>
        <p>{!! nl2br(e($art->context)) !!}</p>

        <h2>Instruction</h2>
        <p>{{ $art->instruction }}</p>

        <button
            x-transition.duration.800ms
            id="download"
            class="inline-flex font-bold text-orange-700 p-4 rounded-full bg-slate-300 hover:bg-slate-50 hover:scale-105 transition-all duration-700 lg:w-full mx-3 lg:mx-0">
            <span class="hidden lg:inline-flex">Télécharger le PDF</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-6 h-6 text-orange-700 lg:ml-2">
                <path d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5H5.625Z" />
                <path d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
            </svg>
        </button>
    </div>

    <div class="footer">
        <p>Généré automatiquement le {{ now()->format('d/m/Y') }}</p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("download").addEventListener("click", function () {
                const element = document.getElementById("article_pdf");
                html2pdf().from(element).save('Document.pdf');
            });
        });
    </script>
</body>
</html>

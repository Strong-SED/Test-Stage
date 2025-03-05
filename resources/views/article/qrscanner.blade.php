<x-layout>
    <h1 style="text-align: center;">Scanner votre QR Code</h1>
    <div id="qr-reader" class="w-96 h-96 m-auto "></div>
    <div id="qr-reader-results" style="text-align: center; margin-top: 20px;"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script>
        // Fonction pour vérifier la signature
        function verifySignature(id, signature, secretKey) {
            const expectedSignature = CryptoJS.HmacSHA256(id, secretKey).toString();
            return expectedSignature === signature;
        }

         // Fonction pour vérifier si une chaîne est un JSON valide
         function isValidJson(text) {
            try {
                JSON.parse(text);
                return true;
            } catch (e) {
                return false;
            }
        }

        // Fonction de callback lors de la détection du QR code
        function onScanSuccess(decodedText, decodedResult) {
            const secretKey = "shazam";
            if (isValidJson(decodedText)) {
                try {
                    const qrData = JSON.parse(decodedText);
                    const { id, signature } = qrData;

                    if (verifySignature(id, signature, secretKey)) {
                        // Affiche le résultat dans la page
                        document.getElementById('qr-reader-results').innerHTML = `QR Code détecté : <a href="${id}" target="_blank">${id}</a>`;

                        // Arrête le scanner si nécessaire
                        // html5QrcodeScanner.clear();
                    } else {
                        document.getElementById('qr-reader-results').innerText = `QR Code non reconnu.`;
                    }
                } catch (e) {
                    document.getElementById('qr-reader-results').innerText = `Erreur lors de la lecture du QR Code`;
                    console.error("Erreur lors de la lecture du QR Code : ", e);
                }
            } else {
                document.getElementById('qr-reader-results').innerText = `QR Code non valide.`;
                console.warn("QR Code non valide.");
            }
        }

    // Options pour le scanner
    let config = { fps: 10, qrbox: 500 };
    // Initialise le scanner dans le div avec id 'qr-reader'
    let html5QrcodeScanner = new Html5Qrcode("qr-reader");
    html5QrcodeScanner.start(
        { facingMode: "environment" }, // Utilise la caméra arrière si disponible
        config,
        onScanSuccess
    ).catch(err => {
        // En cas d'erreur d'initialisation
        console.error(`Erreur lors de l'initialisation du scanner. ${err}`);
    });
    </script>
</x-layout>

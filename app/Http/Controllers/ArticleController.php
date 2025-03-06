<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ArticleController extends Controller
{
    //Affiche l'interface d'acceuil
    public function index():View    {
        $articles = Article::latest()->paginate(5);
        //Génération de Qrcode pour un article... dependances composer require simplesoftwareio/simple-qrcode
        foreach($articles as $art){
            $art["image_url"] = public_path('images/' . $art->image);
        }
        return view("article.index" , [
            'arts' => $articles,
        ]);
    }

    //Affiche le contenu d'un seul article en détaille
    public function show(Article $art):View     {

        $art["image_url"] = public_path('images/' . $art->image);
        return view("article.show", [
            "art" => $art
        ]);
    }

    //Affiche le formulaire de création d'un article
    public function create():View   {
        return view("article.create");
    }


    //Gère l'enregistrement d'un article
    public function store(Request $request) {
        // Validation des données
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'context' => 'required|string',
            'instruction' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'user_id' => 'required|string',
        ], [
           'required' => 'Veuillez remplir tous les champs obligatoires.',
           'image' => 'Veuillez fournir une image valide (jpeg, png, jpg) de 2MB max.'
        ]);


        try {

            if ($request->hasFile("image")) {
                $imageFile = $request->file('image');
                $name = time().".".$imageFile->getClientOriginalExtension();
                $destinationPath = public_path("/images");
                $imageFile-> move($destinationPath, $name );
                $image = $name;

            } else {
                // Générer une couleur de fond et une couleur de texte aléatoires
                $bgColor = sprintf('%02x%02x%02x', rand(0, 255), rand(0, 255), rand(0, 255)); // Couleur de fond
                $textColor = sprintf('%02x%02x%02x', rand(0, 255), rand(0, 255), rand(0, 255)); // Couleur du texte
                $imageText = 'New';

                // Création de l'article
                $image = "https://placehold.co/600x400/{$bgColor}/{$textColor}?text={$imageText}";
            }

            // Sauvegarde en base de données
            Article::create([
                "titre" => $request->titre,
                "description" => $request->description,
                "context" => $request->context,
                "instruction" => $request->instruction,
                "image" => $image,
                "user_id" => $request->user_id
            ]);

            // Redirection vers la vue avec les données de l'article
            return redirect()->back()
                                    ->with('success', 'Article ajouter avec succès !');

        } catch (\Exception $e) {
            return redirect()->back()
                                    ->with('error', 'Erreur lors de l\'enregistrement de l\'article : ' . $e->getMessage());
        }
    }

    //Affiche le formulaire de modification
    public function modify(Article $art):View   {
        return view("article.modify" , [
            "art" => $art
        ]);
    }

    //Gère la modification d'un article
    public function upgrade(Request $request ,Article $art) {
         // Validation des données
         $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'context' => 'required|string',
            'instruction' => 'required|string',
        ]);

        try {

            $article = Article::findOrFail($art->id);

            // Mise à jour des données
            $article->titre = $request->titre;
            $article->description = $request->description;
            $article->context = $request->context;
            $article->instruction = $request->instruction;
            $article->save();

            return redirect()->back()->with('success', 'Article mis à jour avec succès !');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour de l\'article : ' . $e->getMessage());
        }
    }

    //Gère la suppression d'un article
    public function destroy(Article $art) {
        try {

            $article = Article::findOrFail($art->id);
            $article->delete();
            return redirect()->route('Index')->with('success', 'Article supprimé avec succès !');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la suppression de l\'article : ' . $e->getMessage());
        }
    }

    public function sign($text,$key){
        return hash_hmac('sha256' , $text , $key);
    }

    public function PDFView(Article $art){
        // Recherche d'article de par son id
        $art = Article::findOrFail($art->id);
        $uniqid = "http://127.0.0.1:8000/". $art->id;
        $key = "shazam";
        $signature = $this->sign($uniqid , $key);
        $qr_content = json_encode(['id' => $uniqid, 'signature' => $signature]);
        // Génération de qrcode
        $qrcode = QrCode::size(200)->generate($qr_content);
        $art["qrcode"] = $qrcode;
        $art["image_url"] = public_path('images/' . $art->image);
        return view("article.pdf" , compact("art"));
    }

    public function qrscan() {
        return view("article.qrscanner");
    }
}





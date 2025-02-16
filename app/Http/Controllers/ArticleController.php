<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    public function index():View    {

        $articles = Article::latest()->paginate(5);
        return view("article.index" , [
            'arts' => $articles
        ]);
    }

    public function show(Article $art):View     {
        return view("article.show", [
            "art" => $art
        ]);
    }

    public function create():View   {
        return view("article.create");
    }



    public function store(Request $request) {
        // Validation des données
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'context' => 'required|string',
            'instruction' => 'required|string',
        ]);

        try {
            // Générer une couleur de fond et une couleur de texte aléatoires
            $bgColor = sprintf('%02x%02x%02x', rand(0, 255), rand(0, 255), rand(0, 255)); // Couleur de fond
            $textColor = sprintf('%02x%02x%02x', rand(0, 255), rand(0, 255), rand(0, 255)); // Couleur du texte
            $imageText = 'New';

            // Création de l'article
            $image = "https://placehold.co/600x400/{$bgColor}/{$textColor}?text={$imageText}";

            // Sauvegarde en base de données
            Article::create([
                "titre" => $request->titre,
                "description" => $request->description,
                "context" => $request->context,
                "instruction" => $request->instruction,
                "image" => $image
            ]);

            // Redirection vers la vue avec les données de l'article
            return redirect()->back()->with('success', 'Article ajouter avec succès !');

        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'enregistrement de l\'article : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erreur lors de l\'enregistrement de l\'article : ' . $e->getMessage());
        }
    }


    public function modify(Article $art):View   {
        return view("article.modify" , [
            "art" => $art
        ]);
    }


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
            Log::error('Erreur lors de la mise à jour de l\'article : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour de l\'article : ' . $e->getMessage());
        }
    }

    public function destroy(Article $art) {
        try {
            //code...
            $article = Article::findOrFail($art->id);
            $article->delete();
            return redirect()->route('Index')->with('success', 'Article supprimé avec succès !');
            
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour de l\'article : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erreur lors de la suppression de l\'article : ' . $e->getMessage());
        }
    }
}

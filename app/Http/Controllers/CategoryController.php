<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category = Category::all();
        return view('/category/CategoryShow', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = Category::all();
        return view('/category/CategoryCreate')->with(['category' => $category]);;
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = request()->validate([

            'name_category' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description'=>'required'

        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalExtension();

            // Guardar la imagen en el almacenamiento 
            $path = $image->storeAs('public/images', $imageName);

            // Obtener la ruta de la imagen para guardarla en la base de datos
            $imageUrl = Storage::url($path);

            // Crear el registro en la base de datos con la ruta de la imagen
            Category::create([
                'name_category' => $data['name_category'],
                'img' => $imageUrl,
                'description' => $data['description']
            ]);
        }

        //Redireccionar
        return redirect('/category/show');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_category)
    {
        //
        $category = Category::find($id_category);
        return view('/category/CategoryUpdate')->with(['category' => $category]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $categories)
    {
        //
        $data = request()->validate([
            'name_category' => 'required',
            'img' => '|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description'=>'required'
        ]);
        
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalExtension();

            // Guardar la nueva imagen en el almacenamiento y obtener su ruta
            $path = $image->storeAs('public/images', $imageName);
            $imageUrl = Storage::url($path);

            // Eliminar la imagen anterior si existe
            Storage::delete($categories->img); // Elimina la imagen antigua

            // Actualizar los datos, incluida la nueva ruta de la imagen
            $categories->update([
                'name_category' => $data['name_category'],
                'img' => $imageUrl,
                'description' => $data['description']
            ]);
        } 
        else {
            // Si no se proporcionó una nueva imagen, actualizar otros datos solamente
            $categories->update([
                'name_category' => $data['name_category'],
                'description' => $data['description']
            ]);
        }

        return redirect('/category/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Category::destroy($id);

        //Retornar una respuesta json
        return response()->json(array('res' => true));
    }

}

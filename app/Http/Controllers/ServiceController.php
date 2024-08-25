<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view for service show
        $service = Service::select(

            "service.id_service",
            "service.name_service",
            "service.timeframe",
            "service.img",
            "service.description",
            "service.precio",
            "service.fk_category",

            "category.id_category", // category 
            "category.name_category as category", //category - name category
            
        )->join("category", "category.id_category", "=", "service.fk_category")
        ->get();

        return view('/service/ServiceShow')->with(['service' => $service]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // show view to create new service
        $category = Category::all();
        $service = Service::all();
        return view('/service/ServiceCreate')
        ->with(['service' => $service])
        ->with(['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $data = request()->validate([
            'name_service'=> 'required',
            'timeframe' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description'=>'required',
            'precio' => 'required',
            'fk_category' => 'required'
        ]);//validacion

        //guardar info
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalExtension();

            // Guardar la imagen en el almacenamiento
            $path = $image->storeAs('public/images', $imageName);

            // Obtener la ruta de la imagen para guardarla en la base de datos
            $imageUrl = Storage::url($path);

            // Crear el registro en la base de datos con la ruta de la imagen
            Service::create([
                'name_service'=> $data['name_service'],
                'timeframe'=> $data['timeframe'],
                'img' => $imageUrl,
                'description' => $data['description'],
                'precio'=> $data['precio'],
                'fk_category'=> $data['fk_category']
            ]);
        }


        //Redireccionar
        return redirect('/service/show');
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
    public function edit($id_service)
    {
        //
        $service = Service::select(
            "service.id_service",
            "service.name_service",
            "service.timeframe",
            "service.img",
            "service.description",
            "service.precio",
            "service.fk_category",
    
            "category.id_category",
            "category.name_category as category"
        )
        ->join("category", "category.id_category", "=", "service.fk_category")
        ->find($id_service);

        $category = Category::all();
      
        return view('/service/ServiceUpdate')->with(['service' =>  $service, 'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $services)
    {
        //validar info
        $data = request()->validate([
            'name_service' => 'required',
            'timeframe' => 'required',
            'img' => '|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description'=>'required',
            'precio' => 'required',
            'fk_category' => 'required',
        ]);

        if($request->hasFile('img')){
            $image =$request->file('img');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            // Guardar la nueva imagen en el almacenamiento y obtener su ruta
            $path = $image->storeAs('public/images', $imageName);
            $imageUrl = Storage::url($path);

            // Eliminar la imagen anterior si existe
            Storage::delete($services->img); // Elimina la imagen antigua

            $services->update([
                'name_service'=> $data['name_service'],
                'timeframe'=> $data['timeframe'],
                'img' => $imageUrl,
                'description' => $data['description'],
                'precio'=> $data['precio'],
                'fk_category'=> $data['fk_category']
            ]);

        }else{
             // Si no se proporcionó una nueva imagen, actualizar otros datos solamente
             $services->update([
                'name_service'=> $data['name_service'],
                'timeframe'=> $data['timeframe'],
                'description' => $data['description'],
                'precio'=> $data['precio'],
                'fk_category'=> $data['fk_category']
            ]);
        }

        return redirect('/service/show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Service::destroy($id);

        //Retornar una respuesta json
        return response()->json(array('res' => true));
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewClientController extends Controller
{
    //
    public function viewClient(){

        $category = Category::all();
        return view('/category/ClientCategoryShow')->with(['category'=>$category]);

    }

// Mostrar servicios por categoría
    public function search($id_category){
        $category = Category::find($id_category);

        $service = Service::where('fk_category', $id_category)->get();
      
        return view('/category/ClientServiceShow')->with(['service' => $service, 'category' => $category]);
    }

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

        return view('/service/ServiceShowAll')->with(['service' => $service]);
    }
    
    // without login 
    public function home()
    {
        $category = Category::all();
        
        return view('Home')->with(['category'=>$category]);
    }

    public function service($id_category){
        $category = Category::find($id_category);

        $service = Service::where('fk_category', $id_category)->get();
      
        return view('/Home/HomeService')->with(['service' => $service, 'category' => $category]);
    }

}

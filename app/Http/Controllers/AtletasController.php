<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Atletas;
use App\Competicion;
use Illuminate\Http\Request;

class AtletasController extends Controller
{
    
    public function index(){
        
         $atletas=Atletas::with("Categoria","Competicion")->get();
         return response()->json(['atletas' =>  $atletas],200);
    }
    public function create(Request $request){
        
        $dpi = $request['dpi'];
        $atleta=Atletas::with("Competicion")->where('dpi',$dpi)->where('id_competicion',$competicion)->get();

        if($atleta->isEmpty())
        {
            $atletas = new Atletas();
            $atletas->fill($request->all());
            $atletas->save();
            
            if($atletas)
            {
                return response()->json(['atletas'=>$atletas,'status'=>1]);
            }
            else{
                return response()->json(['status'=>'Error']);
            }
            
        }
        else
        {
            return response()->json(['mensaje'=>"No existe"]);
           
        }
       
    }
   
  
    public function update($id, Request $request){
        $atleta = Atletas::find($id);
        $atleta->fill( $request->all());
        $atleta->save();
        return $atleta;
    }
    
    public function destroy($id){
        return Atletas::destroy($id);
    }

    
    public function show($id)
    {
      return $atleta = Atletas::with("Categoria","Competicion")->find($id) ;
    }


    
}

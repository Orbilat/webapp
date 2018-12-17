<?php

namespace App\Http\Controllers;

use Crypt;
use App\Clients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminsController extends Controller
{
    // Index Page (/)
    public function index ()
    {
        return view('admin.index');
    }
    //Adding Client (/)

    //FROM routes/web.php -> Route::post
    protected function addClient (Request $request)
    {
        $client = new Clients;
        $client->client_name = $request->name;
        $client->entity = $request->entity;
        $client->address = $request->address;
        $client->contact = $request->contact;
        $client->email = $request->email;
        $saved = $client->save();
        if(!$saved){
            abort(500, 'Unsuccessful!');
        }
        else{
            return view('admin.success');
        }
    }

    protected function updateClient (Request $request)
    {
        $key = Crypt::decrypt($request->id);
        Clients::where('id', $key)->update(array(
            'client_name' => $request->name,
            'entity' => $request->entity,
            'address' => $request->address, 
            'contact' => $request->contact,
            'email' => $request->email
            
        ));
        return redirect('/home');
    }

    //SOFT DELETE FUNCTION
    protected function delete ($client)
    {
        $data = Crypt::decrypt($client);
        Clients::where('id',$data)->update(array('is_deleted'=> true));

        return redirect('/home');
    }

    //UPDATE FUNCTION
    protected function edit ($id)
    {
        $data = Crypt::decrypt($id);
        $array = Clients::where('id', $data)->get();
        
        return view('admin.update', compact('array'));
    }
}

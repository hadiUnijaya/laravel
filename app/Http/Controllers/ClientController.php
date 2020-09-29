<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAllPosts()
    {
        $client = new Client(['base_uri' => 'https://gorest.co.in/public-api/']);
        $response = $client->request('GET', 'users');
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);
        $finaldata = $data['data'];
        
        return view('frontend.view2',compact('finaldata'));
    }

    public function create()
    {
        return view('frontend.create');
    }

    public function getPostById($id)
    {
        
        $client = new Client(['base_uri' => 'https://gorest.co.in/public-api/']);
        $response = $client->request('GET', 'users/'.$id.'');
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);
        $finaldata = $data['data'];
        //var_dump($finaldata);die;
 
        return view('frontend.show',compact('finaldata'));
    }


    public function store()
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'status' => 'required',
        ]);
        $response = $client->request('POST', 'https://gorest.co.in/public-api/users', [
            'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ]
        ]);

        // echo $response->getBody()->getContents();die;
        
        return redirect('/json');
    }

    public function editPost($id)
    {
        $client = new Client(['base_uri' => 'https://gorest.co.in/public-api/']);
        $response = $client->request('GET', 'users/'.$id.'');
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);
        $finaldata = $data['data'];
        //var_dump($finaldata);die;

        return view('frontend.edit',compact('finaldata'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'status' => 'required',
        ]);
        $token = 'e7b9809c9eddfe566ebcf4d105f4bd063d35a8d9d1cf27774f2d69ff0cae317a';
        $client = new Client();
        $response = $client->request('PUT', 'https://gorest.co.in/public-api/users/'.$request->id.'', [
            'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
    ],
     'form_params' => [
        'name' => $request->name,
        'email' => $request->email,
    ]
    ]);

      // echo $response->getBody()->getContents();die;
      
      return redirect('/json');
    }

    public function delete($id)
    {
     $token = 'e7b9809c9eddfe566ebcf4d105f4bd063d35a8d9d1cf27774f2d69ff0cae317a';
      $client = new Client();
      $response = $client->request('DELETE', 'https://gorest.co.in/public-api/users/'.$id.'', [
         'headers' => [
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . $token,
    ]
    ]);

      // toastr()->success('User has been deleted successfully!');
      return redirect('/json');
    }
}

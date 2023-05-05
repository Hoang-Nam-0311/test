<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index(Request $req)
    {
        $attri = Attribute::all();

        return view('admin.attribute.index', compact('attri'));
    }

    public function create()
    {
        return view('admin.attribute.create');
    }

    public function store(Request $req)
    {
       

        $form_data = $req->all('name', 'status', 'value');

        Attribute::create($form_data);
        return redirect()->route('attribute.index');
    }

    public function edit(Attribute $attri)
    {
        
        return view('admin.category.edit', compact('attr'));
    }

    public function update(Request $req, Attribute $attri)
    {
       

        $form_data = $req->all('name', 'value','status');

        $attri->update($form_data); 
        return redirect()->route('attribute.index');
    }

    public function delete(Attribute $attri)
    {
        $attri->delete();
        return redirect()->route('attribute.index');
    }
}

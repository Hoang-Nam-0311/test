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
       

        $form_data = $req->all('name', 'value', 'description');

        Attribute::create($form_data);
        return redirect()->route('attribute.index');
    }

    public function edit(Attribute $attr)
    {
        
        return view('admin.attribute.edit', compact('attr'));
    }

    public function update(Request $req, Attribute $attr)
    {
       

        $form_data = $req->all('name', 'value', 'description');

        $attr->update($form_data); 
        return redirect()->route('attribute.index');
    }

    public function delete(Attribute $attr)
    {
        $attr->delete();
        return redirect()->route('attribute.index');
    }
}

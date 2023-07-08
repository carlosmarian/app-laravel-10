<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Dotenv\Util\Str;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support){

        $supports = $support->all();
        return view('admin.supports/index', compact('supports'));
    }

    public function show(string | int $id){

        if(!$support = Support::find($id)){
            return redirect()->back();
        }
        return view('admin.supports/show', compact('support'));

    }

    public function create(){
        return view('admin/supports/create');
    }

    public function edit(string | int $id){

        if(!$support = Support::find($id)){
            return redirect()->back();
        }
        return view('admin.supports.edit', compact('support'));
    }


    public function store(Request $request, Support $support){
        $data = $request->all();
        $data['status'] = 'A';

        $support->create($data);

        return redirect()->route('supports.index');
    }

    public function update(Request $request, Support $supports, string | int $id){
        if(!$support = $supports->find($id)){
            return redirect()->back();
        }

        $support->update($request->only(['subject', 'body']));

        return redirect()->route('supports.index');
    }

    public function delete(string | int $id){

        if(!$support = Support::find($id)){
            return redirect()->back();
        }

        $support->delete();

        return redirect()->route('supports.index');
    }
}

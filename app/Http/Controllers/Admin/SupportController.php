<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Models\Support;
use App\Services\SupportService;
use Dotenv\Util\Str;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(protected SupportService $service)
    {

    }


    public function index(Support $support){

        $supports = $this->service->getAll();
        return view('admin.supports/index', compact('supports'));
    }

    public function show(string $id){

        if(!$support = $this->service->findOne($id)){
            return redirect()->back();
        }
        return view('admin.supports/show', compact('support'));

    }

    public function create(){
        return view('admin/supports/create');
    }

    public function edit(string $id){

        if(!$support = $this->service->findOne($id)){
            return redirect()->back();
        }
        return view('admin.supports.edit', compact('support'));
    }


    public function store(StoreUpdateSupportRequest $request, Support $support){
        //$data = $request->all();
        //O "validated" traz só os campos validados
        /*
        $data = $request->validated();
        $data['status'] = 'A';

        $support->create($data);
        */

        $this->service->new(CreateSupportDTO::makeFromRequest($request));

        return redirect()->route('supports.index');
    }

    public function update(StoreUpdateSupportRequest $request, Support $supports, string | int $id){
        /*
        if(!$support = $supports->find($id)){
            return redirect()->back();
        }

        $support->update($request->only(['subject', 'body']));
        */

        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));
        if(!$support){
            return redirect()->back();
        }


        return redirect()->route('supports.index');
    }

    public function delete(string $id){

        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}

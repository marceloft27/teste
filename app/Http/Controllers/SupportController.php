<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    ){}

    public function index(Request $request)
    {
        $supports = $this->service->getAll($request->filter);
        return view('index', compact('supports'));
    }

    public function create()
    {
        return view('create');
    }

    public function show(string|int $id)
    {
        if(!$support = $this->service->findOne($id)){
            return back();
        }
        return view('show', compact('support'));
    }


    public function store(StoreUpdateSupport $request, Support $support)
    {
        $data = $request->all();
        $data['status'] = 'a';

        $support->create($data);
        return redirect()->route('support.index');
    }

    public function edit(string$id)
    {
        if(!$support = $this->service->findOne($id)){
            return back();
        }
        return view('edit', compact('support'));
    }

    public function update(Request $request,Support $support, string $id)
    {
        if(!$support = Support::find($id)){
            return back();
        }

        $support->update($request->only([
            'subject', 'body'
        ]));

        return redirect()->route('support.index');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('support.index');

    }
}

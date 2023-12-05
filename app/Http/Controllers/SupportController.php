<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();
        return view('index', compact('supports'));
    }

    public function create()
    {
        return view('create');
    }

    public function show(string|int $id)
    {
        if(!$support = Support::find($id)){
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

    public function edit(string|int $id)
    {
        if(!$support = Support::find($id)){
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

    public function destroy(string|int $id)
    {
        if(!$support = Support::find($id)){
            return back();
        }
        $support->delete();
        return redirect()->route('support.index');

    }
}

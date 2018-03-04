<?php

namespace Moga\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Moga\Models\Audit;

class SurveyController extends Controller
{
    public function index()
    {
        $audits = Audit::orderBy('created_at', 'desc')->paginate(10);

        return view('survey::survey-index', compact('audits'));
    }

    public function add()
    {
        return view('survey::survey-add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return redirect(route('survery-add'))
                ->withErrors($validator)
                ->withInput();
        }

        $published = false;

        if ($request->has('published')) {
            $published = true;
        }

        Audit::create([
            'name' => $request->input('name'),
            'is_published' => $published,
            'user_id' => 1,
            'checklist_id' => 1,
        ]);

        return redirect()->back();
    }

    public function view(Audit $audit)
    {
        if ($audit->is_published == 0) {
            abort(403, 'Permission denied');
        }

        return view('survey::survey-view', compact('audit'));
    }

    public function createNewSurvey()
    {
        $audits = Audit::where('is_published', 1)->orderBy('name', 'asc')->get();
        $users = User::all();
        
        return view('survey::survey-map', compact('audits', 'users'));
    }
}
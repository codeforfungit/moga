<?php

namespace Moga\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Survey\Models\ChecklistItem;

class AuditController extends Controller
{
    public function questionSave(Request $request)
    {
        $data = $request->validate([
            'text' => 'required|min:3',
            'audit_id' => 'exists:audits,id',
        ]);

        ChecklistItem::create([
            'description' => $data['text'],
            'is_archived' => 0,
            'correct_answer' => ($request->has('correct_answer') ? $request->input('correct_answer') : 0),
            'audit_id' => $data['audit_id'],
        ]);

        return redirect()->back();
    }
}
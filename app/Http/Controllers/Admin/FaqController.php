<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;



use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function storeFaq(Request $request)
    {
        $request->validate([
            'question'      => 'required|string|max:255',
            'faq_category'  => 'required|string|max:255',
            'answer'        => 'required|string',
        ]);

        Faq::create([
            'question'     => $request->input('question'),
            'faq_category' => $request->input('faq_category'),
            'answer'       => $request->input('answer'),
        ]);

        return redirect()->back()->with('success', 'FAQ submitted successfully!');
    }

    public function manageFaq()
    {
        $data = Faq::all();
        return view('cms.manage-faq', compact('data'));
    }
    public function createFaq()
    {
        return view('cms.create-faq');
    }
     public function manageAbout()
    {
        return view('cms.manage-about');
    }
     public function manageNews()
    {
        return view('cms.manage-news');
    }
     public function manageTerms()
    {
        return view('cms.manage-terms');
    }
    public function editFaq( $id)
    {
        
    $faq = Faq::findOrFail($id);

   
    return view('cms.edit-faq', compact('faq'));
    }
    public function deleteFaq($id)
{
    $faq = Faq::find($id);
    if ($faq) {
        $faq->delete();
        return redirect()->route('faq.manage')->with('success', 'FAQ deleted successfully');
    }

    return redirect()->route('faq.manage')->with('error', 'FAQ not found');
}
public function updateFaq(Request $request, $id)
{
    // Validate the request
    $validated = $request->validate([
        'question' => 'required|string|max:255',
        'faq_category' => 'required|string|max:255',
        'answer' => 'required|string',
    ]);

    // Find the FAQ and update it
    $faq = Faq::findOrFail($id);
    $faq->update([
        'question' => $validated['question'],
        'faq_category' => $validated['faq_category'],
        'answer' => $validated['answer'],
    ]);

    // Redirect with a success message
    return redirect()->route('manage-faq')->with('success', 'FAQ updated successfully!');
}


}

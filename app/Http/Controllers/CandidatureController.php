<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreCandidatureRequest;
use App\Http\Requests\UpdateCandidatureRequest;
use App\Models\Candidature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CandidatureController extends Controller
{
        use AuthorizesRequests;

    public function index(Request $request): View
    {
        $this->authorize('viewAny', Candidature::class);

        $candidatures = Candidature::where('user_id', $request->user()->id)
            ->with('entretiens')
            ->orderBy('applied_at', 'desc')
            ->paginate(10);

        return view('candidatures.index', compact('candidatures'));
    }

    public function create(): View
    {
        $this->authorize('create', Candidature::class);

        return view('candidatures.create');
    }

    public function store(StoreCandidatureRequest $request): RedirectResponse
    {
        $this->authorize('create', Candidature::class);

        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;

        Candidature::create($validated);

        return redirect()->route('candidatures.index')
            ->with('success', 'Candidature created successfully.');
    }

    public function show(Candidature $candidature): View
    {
        $this->authorize('view', $candidature);

        $candidature->load('entretiens');

        return view('candidatures.show', compact('candidature'));
    }

    public function edit(Candidature $candidature): View
    {
        $this->authorize('update', $candidature);

        return view('candidatures.edit', compact('candidature'));
    }

    public function update(UpdateCandidatureRequest $request, Candidature $candidature): RedirectResponse
    {
        $this->authorize('update', $candidature);

        $candidature->update($request->validated());

        return redirect()->route('candidatures.show', $candidature)
            ->with('success', 'Candidature updated successfully.');
    }

    public function destroy(Candidature $candidature): RedirectResponse
    {
        $this->authorize('delete', $candidature);

        $candidature->delete();

        return redirect()->route('candidatures.index')
            ->with('success', 'Candidature archived successfully.');
    }
    public function archives(Request $request): View
{
    $candidatures = Candidature::onlyTrashed()
        ->where('user_id', $request->user()->id)
        ->latest()
        ->get();

    return view('candidatures.archives', compact('candidatures'));
}

    public function restore(Request $request, int $id): RedirectResponse
    {
        $candidature = Candidature::withTrashed()->findOrFail($id);

        $this->authorize('restore', $candidature);

        $candidature->restore();

        return redirect()->route('candidatures.index')
            ->with('success', 'Candidature restored successfully.');
    }
}
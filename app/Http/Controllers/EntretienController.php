<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntretienRequest;
use App\Http\Requests\UpdateEntretienRequest;
use App\Models\Entretien;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EntretienController extends Controller
{
    use AuthorizesRequests;

    /**
     * Page globale  /entretiens  —  tous les entretiens de l'utilisateur connecté.
     */
    public function index(Request $request): View
    {
        $userId = $request->user()->id;

        $entretiens = Entretien::whereHas('candidature', function ($q) use ($userId) {
                $q->where('user_id', $userId)->whereNull('deleted_at');
            })
            ->with('candidature')
            ->orderBy('scheduled_at', 'asc')
            ->paginate(10);

        return view('entretiens.index', compact('entretiens'));
    }

    /**
     * Créer un entretien depuis la modale.
     */
   public function store(StoreEntretienRequest $request): RedirectResponse
{
    $request->user()
        ->candidatures()
        ->findOrFail($request->candidature_id);

    $data = $request->validated();

    $data['scheduled_at'] = $data['date'] . ' ' . $data['time'];

    Entretien::create($data);

    return redirect()
        ->route('entretiens.index')
        ->with('success', 'Interview scheduled successfully.');
}
    /**
     * Modifier un entretien.
     */
    public function update(UpdateEntretienRequest $request, Entretien $entretien): RedirectResponse
{
    $this->authorize('update', $entretien);

    $data = $request->validated();

    if (isset($data['date']) && isset($data['time'])) {
        $data['scheduled_at'] = $data['date'] . ' ' . $data['time'];

        unset($data['date']);
        unset($data['time']);
    }

    $entretien->update($data);

    return redirect()->back()
        ->with('success', 'Interview updated successfully.');
}

    /**
     * Supprimer un entretien.
     */
    public function destroy(Entretien $entretien): RedirectResponse
    {
        $this->authorize('delete', $entretien);
        $entretien->delete();

        return redirect()->route('entretiens.index')
            ->with('success', 'Interview deleted successfully.');
    }
}
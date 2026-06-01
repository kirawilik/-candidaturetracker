<x-app-layout>

    <div class="min-h-screen bg-[#0B1120] text-white">

        <div class="flex">

            {{-- ============================================================
                 SIDEBAR  (identique au dashboard)
            ============================================================ --}}
            <aside class="w-64 min-h-screen bg-[#111827] border-r border-white/10 p-6 flex-shrink-0">

                <h1 class="text-2xl font-bold mb-10">CandidatureTracker</h1>

                <nav class="space-y-3">

                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                        {{-- icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2
                                     2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0
                                     011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </a>

                    <a href="{{ route('candidatures.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1
                                     1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Applications
                    </a>

                    {{-- ACTIVE : Interviews --}}
                    <a href="{{ route('entretiens.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-2xl
                              bg-gradient-to-r from-indigo-500 to-purple-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0
                                     00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Interviews
                    </a>

<a href="{{ route('candidatures.archives') }}"                       class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0
                                     002 2h10a2 2 0 002-2V8m-9 4h4"/>
                        </svg>
                        Archive
                    </a>

                    <a href="{{ route('profile.edit') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-white/10 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0
                                     002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0
                                     001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0
                                     00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724
                                     0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724
                                     1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724
                                     1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724
                                     1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608
                                     2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Settings
                    </a>

                </nav>

            </aside>

            {{-- ============================================================
                 MAIN CONTENT
            ============================================================ --}}
            <main class="flex-1 p-10 overflow-auto">

                {{-- ── HEADER ────────────────────────────────────────────── --}}
                <div class="flex items-center justify-between mb-10">

                    <div>
                        <h2 class="text-4xl font-bold">Interviews</h2>
                        <p class="text-gray-400 mt-2">Manage and schedule your upcoming interviews</p>
                    </div>

                    {{-- Bouton qui ouvre la modale --}}
                    <button onclick="document.getElementById('scheduleModal').classList.remove('hidden')"
                            class="flex items-center gap-2 px-6 py-3 rounded-2xl
                                   bg-gradient-to-r from-indigo-500 to-purple-600
                                   hover:opacity-90 transition font-medium">
                        <span class="text-lg leading-none">+</span>
                        Schedule Interview
                    </button>

                </div>

                {{-- ── FLASH MESSAGE ─────────────────────────────────────── --}}
                @if(session('success'))
                    <div class="mb-6 px-5 py-4 rounded-2xl bg-green-500/20 text-green-400 border border-green-500/30">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- ── GRILLE DE CARDS ───────────────────────────────────── --}}
                @php
                    $typeIcons = [
                        'video'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 10l4.553-2.276A1 1 0 0121 8.723v6.554a1 1 0
                                             01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0
                                             00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>',
                        'phone'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498
                                             4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042
                                             11.042 0 005.516 5.516l1.13-2.257a1 1 0
                                             011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2
                                             2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>',
                        'onsite' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14
                                             0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1
                                             4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>',
                    ];

                    $typeColors = [
                        'video'  => ['badge' => 'bg-blue-500/20 text-blue-400',   'icon' => 'from-blue-500 to-indigo-600'],
                        'phone'  => ['badge' => 'bg-green-500/20 text-green-400', 'icon' => 'from-emerald-500 to-teal-600'],
                        'onsite' => ['badge' => 'bg-purple-500/20 text-purple-400','icon'=> 'from-violet-500 to-purple-700'],
                    ];
                @endphp

                <div class="grid md:grid-cols-2 gap-6">

                    @forelse($entretiens as $entretien)

                        @php
                            $typeKey  = strtolower($entretien->type ?? 'onsite');
                            $colors   = $typeColors[$typeKey]  ?? $typeColors['onsite'];
                            $iconPath = $typeIcons[$typeKey]   ?? $typeIcons['onsite'];
                        @endphp

                        <div class="bg-[#111827] rounded-3xl p-6 border border-white/10
                                    hover:border-indigo-500/40 transition-all duration-200">

                            <div class="flex items-start justify-between mb-4">

                                {{-- Icône + titre --}}
                                <div class="flex items-center gap-4">

                                    <div class="w-14 h-14 rounded-2xl flex-shrink-0
                                                bg-gradient-to-br {{ $colors['icon'] }}
                                                flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="h-7 w-7 text-white" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            {!! $iconPath !!}
                                        </svg>
                                    </div>

                                    <div>
                                        <h3 class="text-xl font-bold leading-tight">
                                            {{ $entretien->candidature->company_name }}
                                        </h3>
                                        <p class="text-gray-400 mt-0.5 text-sm">
                                            {{ $entretien->candidature->job_title }}
                                        </p>
                                    </div>

                                </div>

                                {{-- Badge type --}}
                                <span class="px-3 py-1 rounded-full text-xs font-medium {{ $colors['badge'] }}">
                                    {{ $entretien->type }}
                                </span>

                            </div>

                            {{-- Date & heure --}}
                            <div class="flex items-center gap-6 mt-4 text-sm text-gray-300">

                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2
                                              2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $entretien->scheduled_at->format('Y-m-d') }}
                                </div>

                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ $entretien->scheduled_at->format('g:i A') }}
                                </div>

                            </div>

                            {{-- Résultat (si disponible) --}}
                            @if($entretien->result)
                                <p class="mt-3 text-sm text-gray-400 italic">
                                    {{ $entretien->result }}
                                </p>
                            @endif

                            {{-- Actions --}}
                            <div class="flex gap-3 mt-5">

                                <a href="{{ route('candidatures.show', $entretien->candidature) }}"
                                   class="flex-1 text-center px-4 py-2 rounded-xl
                                          bg-white/10 hover:bg-white/20 transition text-sm font-medium">
                                    View Details
                                </a>
                                 {{-- EDIT --}}
    <button
        onclick="openEditModal(
            {{ $entretien->id }},
            '{{ $entretien->scheduled_at->format('Y-m-d') }}',
            '{{ $entretien->scheduled_at->format('H:i') }}',
            '{{ $entretien->type }}',
            `{{ addslashes($entretien->notes ?? '') }}`
        )"
        class="px-4 py-2 rounded-xl bg-yellow-500/20
               hover:bg-yellow-500/30 text-yellow-400 transition text-sm">
        Edit
    </button>

                                <button
                                    onclick="openPrepModal({{ $entretien->id }}, '{{ addslashes($entretien->candidature->company_name) }}', `{{ addslashes($entretien->notes ?? '') }}`)"
                                    class="flex-1 px-4 py-2 rounded-xl text-sm font-medium
                                           bg-gradient-to-r from-indigo-500 to-purple-600
                                           hover:opacity-90 transition">
                                    Start Prep
                                </button>

                                {{-- Supprimer --}}
                                <form method="POST"
                                      action="{{ route('entretiens.destroy', $entretien) }}"
                                      onsubmit="return confirm('Delete this interview?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-2 rounded-xl bg-red-500/20
                                                   hover:bg-red-500/30 text-red-400 transition text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2" d="M19 7l-.867 12.142A2 2 0
                                                  01 16.138 21H7.862a2 2 0 01-1.995-1.858L5
                                                  7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1
                                                  0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                                

                            </div>

                        </div>

                    @empty

                        <div class="col-span-2 bg-[#111827] p-12 rounded-3xl
                                    text-center text-gray-400 border border-white/10">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-12 w-12 mx-auto mb-4 text-gray-600" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2
                                      2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-lg">No interviews planned.</p>
                            <p class="text-sm mt-1">Click "Schedule Interview" to add one.</p>
                        </div>

                    @endforelse

                </div>

                {{-- Pagination --}}
                <div class="mt-8">
                    {{ $entretiens->links() }}
                </div>

            </main>

        </div>

    </div>

    {{-- ================================================================
         MODALE  — Schedule New Interview
    ================================================================ --}}
    <div id="scheduleModal"
         class="hidden fixed inset-0 z-50 flex items-center justify-center
                bg-black/60 backdrop-blur-sm px-4">

        <div class="bg-[#131C2E] border border-white/10 rounded-3xl w-full max-w-lg p-8
                    shadow-2xl relative">

            {{-- Fermer --}}
            <button onclick="document.getElementById('scheduleModal').classList.add('hidden')"
                    class="absolute top-5 right-5 text-gray-400 hover:text-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <h2 class="text-2xl font-bold mb-6">Schedule New Interview</h2>

            <form method="POST" action="{{ route('entretiens.store') }}" class="space-y-5">
                @csrf

                {{-- Entreprise --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Company</label>
                    <select name="candidature_id" required
                            class="w-full bg-[#0D1626] border border-white/10 rounded-xl
                                   px-4 py-3 text-white focus:outline-none focus:border-indigo-500
                                   transition appearance-none">
                        <option value="" disabled selected>Select a company</option>
                        @foreach(auth()->user()->candidatures()->whereNull('deleted_at')->get() as $cand)
                            <option value="{{ $cand->id }}">
                                {{ $cand->company_name }} — {{ $cand->job_title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Date + Heure --}}
                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Date</label>
                        <input type="date" name="date" required
                               class="w-full bg-[#0D1626] border border-white/10 rounded-xl
                                      px-4 py-3 text-white focus:outline-none focus:border-indigo-500
                                      transition [color-scheme:dark]"/>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Time</label>
                        <input type="time" name="time" required
                               class="w-full bg-[#0D1626] border border-white/10 rounded-xl
                                      px-4 py-3 text-white focus:outline-none focus:border-indigo-500
                                      transition [color-scheme:dark]"/>
                    </div>

                </div>

                {{-- Type --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Interview Type</label>
                    <select name="type" required
                            class="w-full bg-[#0D1626] border border-white/10 rounded-xl
                                   px-4 py-3 text-white focus:outline-none focus:border-indigo-500
                                   transition appearance-none">
                        <option value="" disabled selected>Select type</option>
                       <option value="technical">Technical</option>
<option value="hr">HR</option>
<option value="phone">Phone</option>
<option value="onsite">Onsite</option>
                    </select>
                </div>

                {{-- Notes --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        Preparation Notes
                    </label>
                    <textarea name="notes" rows="4"
                              placeholder="Add preparation notes, questions to ask, etc."
                              class="w-full bg-[#0D1626] border border-white/10 rounded-xl
                                     px-4 py-3 text-white placeholder-gray-500
                                     focus:outline-none focus:border-indigo-500
                                     transition resize-none"></textarea>
                </div>

                {{-- Boutons --}}
                <div class="flex justify-end gap-3 pt-2">

                    <button type="button"
                            onclick="document.getElementById('scheduleModal').classList.add('hidden')"
                            class="px-6 py-3 rounded-xl bg-white/10 hover:bg-white/20
                                   transition font-medium">
                        Cancel
                    </button>

                    <button type="submit"
                            class="px-6 py-3 rounded-xl font-medium
                                   bg-gradient-to-r from-indigo-500 to-purple-600
                                   hover:opacity-90 transition">
                        Schedule Interview
                    </button>

                </div>

            </form>

        </div>

    </div>

    {{-- ================================================================
         MODALE  — Start Prep (notes de préparation)
    ================================================================ --}}
    <div id="prepModal"
         class="hidden fixed inset-0 z-50 flex items-center justify-center
                bg-black/60 backdrop-blur-sm px-4">

        <div class="bg-[#131C2E] border border-white/10 rounded-3xl w-full max-w-lg p-8
                    shadow-2xl relative">

            <button onclick="document.getElementById('prepModal').classList.add('hidden')"
                    class="absolute top-5 right-5 text-gray-400 hover:text-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <h2 class="text-2xl font-bold mb-2">Preparation Notes</h2>
            <p id="prepCompany" class="text-gray-400 mb-6 text-sm"></p>
            

            <div id="prepContent"
                 class="bg-[#0D1626] border border-white/10 rounded-xl p-4
                        text-gray-300 text-sm leading-relaxed min-h-[120px] whitespace-pre-wrap">
            </div>

            <div class="flex justify-end mt-6">
                <button onclick="document.getElementById('prepModal').classList.add('hidden')"
                        class="px-6 py-3 rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600
                               hover:opacity-90 transition font-medium">
                    Close
                </button>
            </div>

        </div>

    </div>
    <div id="editModal"
     class="hidden fixed inset-0 z-50 flex items-center justify-center
            bg-black/60 backdrop-blur-sm px-4">

    <div class="bg-[#131C2E] border border-white/10 rounded-3xl w-full max-w-lg p-8">

        <h2 class="text-2xl font-bold mb-6">Edit Interview</h2>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-4">

                <input id="edit_date" type="date" name="date" class="w-full ...">

                <input id="edit_time" type="time" name="time" class="w-full ...">

                <select id="edit_type" name="type" class="w-full ...">
                    <option value="technical">Technical</option>
                    <option value="hr">HR</option>
                    <option value="phone">Phone</option>
                    <option value="onsite">Onsite</option>
                </select>

                <textarea id="edit_notes" name="notes" class="w-full ..."></textarea>

            </div>

            <div class="flex justify-end gap-3 mt-6">
                <button type="button"
                        onclick="document.getElementById('editModal').classList.add('hidden')"
                        class="px-5 py-2 rounded-xl bg-white/10">
                    Cancel
                </button>

                <button type="submit"
                        class="px-5 py-2 rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600">
                    Update
                </button>
            </div>

        </form>

    </div>
</div>

    <script>
        function openPrepModal(id, company, notes) {
            document.getElementById('prepCompany').textContent = company;
            document.getElementById('prepContent').textContent =
                notes.trim() !== '' ? notes : 'No preparation notes added yet.';
            document.getElementById('prepModal').classList.remove('hidden');
        }

        // Fermer modales en cliquant sur l'overlay
        ['scheduleModal', 'prepModal'].forEach(function(id) {
            document.getElementById(id).addEventListener('click', function(e) {
                if (e.target === this) this.classList.add('hidden');
            });
        });
        function openEditModal(id, date, time, type, notes) {
    document.getElementById('editForm').action = `/entretiens/${id}`;

    document.getElementById('edit_date').value = date;
    document.getElementById('edit_time').value = time;
    document.getElementById('edit_type').value = type;
    document.getElementById('edit_notes').value = notes;

    document.getElementById('editModal').classList.remove('hidden');
}
    </script>

</x-app-layout>
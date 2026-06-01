<x-app-layout>
    <div class="max-w-6xl mx-auto py-10 px-4">

        <!-- HEADER -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Archive</h1>
            <p class="mt-1 text-indigo-400 text-sm">View your archived and rejected applications</p>
        </div>

        @if($candidatures->isEmpty())
            <!-- EMPTY STATE -->
            <div class="bg-gray-800/60 border border-gray-700 rounded-2xl p-16 flex flex-col items-center justify-center text-center">
                <!-- Archive icon -->
                <div class="mb-5 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M5 8h14M5 8a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v1a2 2 0 01-2 2M5 8v11a2 2 0 002 2h10a2 2 0 002-2V8" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-white mb-2">No Archived Applications</h2>
                <p class="text-gray-400 text-sm max-w-sm mb-8">
                    Applications you archive will appear here. This helps keep your active applications organized.
                </p>
                <a href="{{ route('candidatures.index') }}"
                   class="px-5 py-2 rounded-xl border border-gray-500 text-gray-300 text-sm hover:bg-gray-700 transition">
                    View Active Applications
                </a>
            </div>

        @else
            <!-- LIST OF ARCHIVED CANDIDATURES -->
            <div class="space-y-4">
                @foreach($candidatures as $candidature)
                    <div class="bg-gray-800 border border-gray-700 rounded-2xl shadow p-5 flex justify-between items-center">
                        <!-- LEFT -->
                        <div>
                            <h2 class="text-lg font-semibold text-white">
                                {{ $candidature->job_title }}
                            </h2>
                            <p class="text-gray-400 text-sm">
                                {{ $candidature->company_name }}
                            </p>
                            <div class="flex gap-3 mt-2 text-xs text-gray-500">
                                <span>Status : {{ $candidature->status->value }}</span>
                                <span>Priorité : {{ $candidature->priority->value }}</span>
                                <span>Archivée le : {{ $candidature->deleted_at->format('d/m/Y') }}</span>
                            </div>
                        </div>

                        <!-- ACTIONS -->
                        <div class="flex items-center gap-3">
                            <!-- RESTORE -->
                            <form method="POST"
                                  action="{{ route('candidatures.restore', $candidature->id) }}"
                                  onsubmit="return confirm('Restaurer cette candidature ?')">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                        class="px-3 py-1 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white text-sm transition">
                                    Restaurer
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- BACK LINK -->
            <div class="mt-8">
                <a href="{{ route('candidatures.index') }}"
                   class="text-sm text-indigo-400 hover:underline">
                    ← Retour aux candidatures actives
                </a>
            </div>
        @endif

    </div>
</x-app-layout>
<x-app-layout>
    <div class="container">

        <h1>{{ $candidature->company_name }}</h1>

        <p>{{ $candidature->job_title }}</p>

        <p>{{ $candidature->status->value }}</p>

        <p>{{ $candidature->priority->value }}</p>

        <p>{{ $candidature->notes }}</p>

        <hr>

        <h2>Entretiens</h2>

        @forelse($candidature->entretiens as $entretien)

            <div class="card">

                <p>{{ $entretien->type }}</p>

                <p>
                    {{ $entretien->scheduled_at->format('d/m/Y H:i') }}
                </p>

                <p>{{ $entretien->result }}</p>

            </div>

        @empty
            <p>Aucun entretien.</p>
        @endforelse

    </div>
</x-app-layout>
<x-app-layout>
    <div class="container">

        <h1>Modifier candidature</h1>

        <form method="POST"
              action="{{ route('candidatures.update', $candidature) }}">

            @csrf
            @method('PUT')

            <input type="text"
                   name="company_name"
                   value="{{ $candidature->company_name }}">

            <input type="text"
                   name="job_title"
                   value="{{ $candidature->job_title }}">

            <button type="submit">
                Modifier
            </button>

        </form>

    </div>
</x-app-layout>
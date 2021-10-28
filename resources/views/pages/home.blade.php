<x-page-layout>
    <x-slot name="title">MPV - Lista de documento</x-slot>
    <x-slot name="description">Lista de documentos registrados en la mesa de partes virtual de la DREA.</x-slot>
    <x-page.header />
    <div class="wrapper mt-6 px-0 md:px-32 md:mt-24">
        <h4>Términos y Condiciones</h4>
        <p class="mt-3 text-gray-500 text-justify leading-relaxed">Lorem Ipsum is simply dummy text of the printing and
            typesetting
            industry. Lorem
            Ipsum has been
            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged.</p>
        <ol class="mt-5">
            <li class="leading-relaxed text-gray-500 pb-3">1. Sydney College in Virginia, looked up one of the more
                obscure
                Latin
                words,
                consectetur, from a Lorem
                Ipsum passage, and going through the cites.</li>
            <li class="leading-relaxed text-gray-500 pb-3">2. It has survived not only five centuries, but also the leap
                into
                electronic
                typesetting, remaining
                essentially unchanged. </li>
            <li class="leading-relaxed text-gray-500 pb-3">3. Lorem Ipsum is simply dummy text of the printing and
                typesetting
                industry. Lorem
                Ipsum has been the
                industry's standard dummy text ever since the 1500s.</li>
        </ol>
    </div>
    <div class="wrapper px-0 md:px-32 mt-8 mb-10">
        <div class="flex justify-end">
            <a href="{{ route('documents.create') }}"
                class="btn btn-primary justify-center w-full md:w-auto text-center">Acepto</a>
        </div>
    </div>
</x-page-layout>
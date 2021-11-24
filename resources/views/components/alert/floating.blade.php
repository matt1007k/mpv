@if (session()->has('message'))
<div class="fixed top-2 right-0 left-0 flex items-center justify-center transform transition-all duration-300 ease-linear"
    id="alert">
    <div
        class="bg-green-100 text-green-600 border border-green-500 py-3 px-4 rounded-lg font-semibold flex items-center gap-3">
        <span>
            {{ session('message') }}
        </span>
        <button onclick="closeAlert()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>
@endif
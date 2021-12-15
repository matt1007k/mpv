@props(['status'])
<span class="font-medium @if($status == 'be_processed') text-red-500 @else text-green-500 @endif">
    {{ $status === 'be_processed' ? 'Por tramitar' : 'Tramitado' }}
</span>
@php
    use Illuminate\Support\Facades\Storage;
@endphp

<div class="relative bg-white rounded-2xl shadow-sm overflow-hidden border group">

    {{-- Action Buttons --}}
    <div class="absolute top-3 right-3 z-10 flex gap-2 opacity-0 group-hover:opacity-100 transition">
        {{ $getAction('edit') }}
        {{ $getAction('delete') }}
    </div>

    {{-- Image --}}
    <div class="aspect-square overflow-hidden">
        <img
            src="{{ Storage::disk('public')->url($getRecord()->foto) }}"
            alt="Gallery Image"
            class="w-full h-full object-cover transition duration-300 group-hover:scale-105"
        >
    </div>

    {{-- Description --}}
    @if($getRecord()->deskripsi)
        <div class="p-4">
            <p class="text-sm text-gray-600 leading-relaxed line-clamp-3">
                {{ $getRecord()->deskripsi }}
            </p>
        </div>
    @endif

</div>

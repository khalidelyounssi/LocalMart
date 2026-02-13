@props(['active', 'icon', 'label'])

<a {{ $attributes }} class="flex items-center gap-4 px-4 py-3.5 rounded-2xl font-bold transition-all duration-300 group {{ $active ? 'bg-green-50 text-green-700 shadow-sm border border-green-100/50' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
    <div class="w-5 flex justify-center">
        <i class="fa-solid {{ $icon }} text-lg {{ $active ? 'text-green-600' : 'group-hover:text-gray-900' }}"></i>
    </div>
    <span class="text-sm tracking-tight">{{ $label }}</span>
    @if($active)
        <div class="ml-auto w-1.5 h-1.5 bg-green-600 rounded-full shadow-[0_0_8px_rgba(22,163,74,0.6)]"></div>
    @endif
</a>
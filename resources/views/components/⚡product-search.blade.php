<?php

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public $search = '';
    public $sortBy = 'highest';

    public function with()
    {
        return [
            'products' => Product::query()
                ->whereHas('reports') 
                ->withCount('reports')
                ->with(['reports' => function($q) {
                    $q->latest(); 
                }, 'user'])
                ->when($this->search, function ($query) {
                    $query->where('title', 'like', '%' . $this->search . '%');
                })
                ->when($this->sortBy === 'highest', fn($q) => $q->orderBy('reports_count', 'desc'))
                ->when($this->sortBy === 'newest', fn($q) => $q->orderByDesc(
                    \App\Models\Report::select('created_at')
                        ->whereColumn('reportable_id', 'products.id')
                        ->where('reportable_type', 'product')
                        ->latest()
                        ->take(1)
                ))
                ->paginate(10)
        ];
    }
};
?>

<div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
    
    {{-- قسم البحث والفلتر --}}
    <div class="p-5 border-b border-gray-100 bg-white flex flex-col md:flex-row gap-4">
        <div class="relative flex-1">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
            {{-- حقل البحث بالاسم --}}
            <input wire:model.live.debounce.300ms="search" 
                   type="text" 
                   placeholder="Search by Product Name..." 
                   class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
        </div>

        <div class="relative w-full md:w-64">
            <select wire:model.live="sortBy" class="w-full appearance-none border border-gray-200 rounded-lg px-4 py-2.5 bg-gray-50 text-sm outline-none cursor-pointer text-gray-600">
                <option value="highest">Most Reported</option>
                <option value="newest">Recently Reported</option>
            </select>
            <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-[10px] pointer-events-none"></i>
        </div>
    </div>

    {{-- الجدول --}}
    <div class="overflow-x-auto relative">
        <div wire:loading.flex class="absolute inset-0 bg-white/50 z-10 items-center justify-center">
            <div class="text-blue-500 font-bold">Loading...</div>
        </div>

        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 text-gray-500 text-[11px] uppercase tracking-wider font-bold">
                <tr>
                    <th class="px-6 py-4">Product</th>
                    <th class="px-6 py-4 text-center">Reports</th>
                    <th class="px-6 py-4">Reason</th>
                    <th class="px-6 py-4 text-center">Status</th>
                    <th class="px-6 py-4 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 bg-white">
                @forelse($products as $product)
                    <tr class="hover:bg-gray-50 transition group">
                        
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-box text-gray-500"></i>
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900 text-sm">{{ $product->title }}</div>
                                    <div class="text-xs text-gray-400">ID: #{{ $product->id }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-bold">
                                {{ $product->reports_count }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-600 block truncate w-48" title="{{ $product->reports->first()->reason ?? '' }}">
                                {{ Str::limit($product->reports->first()->reason ?? 'No reason', 30) }}
                            </span>
                            <div class="text-xs text-gray-400 mt-1">
                                {{ $product->reports->first()?->created_at->diffForHumans() }}
                            </div>
                        </td>

                        <td class="px-6 py-4 text-center">
                            @php
                                $status = $product->reports->first()->status ?? 'pending';
                                $color = $status === 'pending' ? 'bg-yellow-50 text-yellow-600' : 'bg-green-50 text-green-600';
                            @endphp
                            <span class="px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wide {{ $color }}">
                                {{ $status }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.comments.product' , $product->id ) }}" class="text-blue-600 hover:text-blue-800 text-sm font-bold">
                                Manage <i class="fa-solid fa-arrow-right ml-1"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                            No reported products found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="p-4 border-t border-gray-100 bg-gray-50">
        {{ $products->links() }}
    </div>
</div>
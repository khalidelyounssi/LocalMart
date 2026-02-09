@extends('layouts.admin')

@section('content')
<div class="container mx-auto">
    <div class="mb-8">
        <h2 class="text-3xl font-black text-gray-800">Avis Clients</h2>
        <p class="text-gray-500">Ce que les clients disent de vos produits.</p>
    </div>

    <div class="bg-white shadow-xl rounded-3xl overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="text-left text-xs font-black text-gray-400 uppercase tracking-widest">
                        <th class="px-8 py-5">Client</th>
                        <th class="px-8 py-5">Produit</th>
                        <th class="px-8 py-5 text-center">Note</th>
                        <th class="px-8 py-5">Commentaire</th>
                        <th class="px-8 py-5 text-right">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($reviews as $review)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-8 py-6 font-bold text-gray-700">
                            {{ $review->user->name }}
                        </td>
                        <td class="px-8 py-6 text-indigo-600 font-semibold">
                            {{ $review->product->title }}
                        </td>
                        <td class="px-8 py-6 text-center">
                            <div class="flex justify-center text-yellow-400">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fa-{{ $i <= $review->rating ? 'solid' : 'regular' }} fa-star"></i>
                                @endfor
                            </div>
                        </td>
                        <td class="px-8 py-6 text-gray-600 italic">
                            "{{ $review->comment }}"
                        </td>
                        <td class="px-8 py-6 text-right text-gray-400 text-sm">
                            {{ $review->created_at->format('d/m/Y') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-12 text-center text-gray-400">
                            Aucun avis pour le moment.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
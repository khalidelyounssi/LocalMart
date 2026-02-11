<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow-sm">
        <h1 class="text-2xl font-bold mb-6">Récapitulatif de la commande</h1>

        @if($cart && $cart->items->count())
            <div class="space-y-4">
                @php $total = 0; @endphp
                @foreach($cart->items as $item)
                    @php $total += $item->product->price * $item->quantity; @endphp
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span>{{ $item->product->title }} × {{ $item->quantity }}</span>
                        <span class="font-bold text-green-600">{{ number_format($item->product->price * $item->quantity, 2) }} DH</span>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-between mt-6 text-lg font-bold">
                <span>Total</span>
                <span class="text-green-600">{{ number_format($total, 2) }} DH</span>
            </div>

            <form action="{{ route('checkout.confirm') }}" method="POST" class="mt-6">
                @csrf
                <button type="submit"
                    class="w-full py-3 bg-green-600 text-white font-bold rounded-xl hover:bg-green-700 transition-all">
                    Confirmer la commande
                </button>
            </form>
        @else
            <p>Votre panier est vide.</p>
        @endif
    </div>
</x-app-layout>

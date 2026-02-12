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

                <div class="flex justify-between mt-6 text-lg font-bold border-b pb-4">
                    <span>Total</span>
                    <span class="text-green-600">{{ number_format($total, 2) }} DH</span>
                </div>

                <form action="{{ route('checkout.confirm') }}" method="POST" class="mt-8">
                    @csrf
                    <h3 class="text-lg font-bold mb-4 text-gray-800">Mode de paiement</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                        <label class="relative flex p-4 bg-gray-50 rounded-xl border-2 cursor-pointer focus:outline-none hover:border-green-500 transition-all">
                            <input type="radio" name="payment_method" value="cod" class="mt-1 h-4 w-4 text-green-600" checked>
                            <div class="ml-3">
                                <span class="block text-sm font-bold text-gray-900 uppercase">Cash on Delivery</span>
                                <span class="block text-xs text-gray-500">Payer en espèces à la livraison</span>
                            </div>
                        </label>

                        <label class="relative flex p-4 bg-gray-50 rounded-xl border-2 cursor-pointer focus:outline-none hover:border-blue-500 transition-all">
                            <input type="radio" name="payment_method" value="stripe" class="mt-1 h-4 w-4 text-blue-600">
                            <div class="ml-3">
                                <span class="block text-sm font-bold text-gray-900 uppercase">Carte Bancaire</span>
                                <span class="block text-xs text-gray-500">Paiement sécurisé via Stripe</span>
                            </div>
                        </label>
                    </div>

                    <button type="submit"
                        class="w-full py-4 bg-[#1DB954] text-white font-black rounded-2xl hover:bg-[#16a34a] transition-all shadow-lg uppercase tracking-wide">
                        Confirmer et passer au paiement
                    </button>
                </form>
                
            @else
                <div class="text-center py-10">
                    <p class="text-gray-500">Votre panier est vide.</p>
                    <a href="{{ route('dashboard') }}" class="text-green-600 font-bold underline">Retour aux produits</a>
                </div>
            @endif
        </div>
    </x-app-layout>
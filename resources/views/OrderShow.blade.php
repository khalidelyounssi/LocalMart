<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow-sm">
        <h1 class="text-2xl font-bold mb-4">
            Commande #{{ $order->id }}
        </h1>

        <p class="mb-6">
            Statut :
            <span class="font-bold text-green-600 uppercase">
                {{ $order->status }}
            </span>
        </p>

        <div class="space-y-4">
            @foreach($order->items as $item)
                <div class="flex justify-between bg-gray-50 p-3 rounded-lg">
                    <span>
                        {{ $item->product->title }} × {{ $item->quantity }}
                    </span>
                    <span class="font-bold">
                        {{ number_format($item->price_at_purchase * $item->quantity, 2) }} DH
                    </span>
                </div>
            @endforeach
        </div>

        <div class="flex justify-between mt-6 text-lg font-bold">
            <span>Total</span>
            <span class="text-green-600">
                {{ number_format($order->total_amount, 2) }} DH
            </span>
        </div>
    </div>
</x-app-layout>

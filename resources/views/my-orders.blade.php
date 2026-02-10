<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow-sm">
        <h1 class="text-2xl font-bold mb-6">Mes commandes</h1>

        @if($orders->count())
            <div class="space-y-4">
                @foreach($orders as $order)
                    <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg border">
                        <div>
                            <span class="font-bold">Commande #{{ $order->id }}</span><br>
                            <span class="text-sm text-gray-500 uppercase">{{ $order->status }}</span>
                        </div>
                        <a href="{{ route('OrderShow', ['order' => $order->id]) }}"
                           class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-all">
                            Voir
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p>Vous n'avez pas encore passé de commande.</p>
        @endif
    </div>
</x-app-layout>

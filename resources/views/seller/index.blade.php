<h1>Mes Produits</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1">
    <thead>
        <tr>
            <th>Image</th>
            <th>Titre</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" width="50">
                @else
                    Pas d'image
                @endif
            </td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->price }} DH</td>
            <td>{{ $product->stock }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}">Modifier</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('products.create') }}">Ajouter un nouveau produit</a>
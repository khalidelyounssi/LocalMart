<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Titre du produit" required>
    <textarea name="description" placeholder="Description"></textarea>
    <input type="number" name="price" placeholder="Prix" step="0.01" required>
    <input type="number" name="stock" placeholder="Quantité en stock" required>
    
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <input type="file" name="image">
    
    <button type="submit">Ajouter le produit</button>
</form>
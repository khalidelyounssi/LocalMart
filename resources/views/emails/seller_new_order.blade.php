<h2>Bonjour !</h2>
<p>Vous avez une nouvelle commande sur <strong>LocalMart</strong>.</p>

<ul>
    <li><strong>Produit :</strong> {{ $item->product->title }}</li>
    <li><strong>Quantité :</strong> {{ $item->quantity }}</li>
    <li><strong>Prix Unitaire :</strong> {{ $item->price_at_purchase }} DH</li>
</ul>

<p>Veuillez vous connecter à votre espace vendeur pour préparer la commande.</p>
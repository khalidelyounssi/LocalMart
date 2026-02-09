<h1>Bonjour {{ $orderItem->order->user->name }},</h1>
<p>Le statut de votre commande <strong>#{{ $orderItem->order->id }}</strong> a été modifié.</p>
<p>Produit : <strong>{{ $orderItem->product->title }}</strong></p>
<p>Nouveau statut : <strong>{{ $orderItem->status }}</strong></p>
<p>Merci pour votre confiance !</p>
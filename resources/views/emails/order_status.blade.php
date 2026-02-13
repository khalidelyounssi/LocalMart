<div style="font-family: sans-serif; color: #333; max-width: 600px; margin: auto; border: 1px solid #eee; padding: 20px; border-radius: 15px;">
    <h2 style="color: #1DB954;">Mise à jour de votre commande</h2>
    
    <p>Bonjour <strong>{{ $order->user->name }}</strong>,</p>
    
    <p>La commande <strong>#{{ $order->id }}</strong> est passée au statut : 
       <span style="background: #f0fdf4; color: #16a34a; padding: 4px 10px; rounded: 5px; font-weight: bold;">
           {{ strtoupper($order->status) }}
       </span>
    </p>

    <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">

    <h3>Détails de la commande :</h3>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #f9fafb;">
                <th style="text-align: left; padding: 10px; border-bottom: 1px solid #eee;">Produit</th>
                <th style="text-align: center; padding: 10px; border-bottom: 1px solid #eee;">Qté</th>
                <th style="text-align: right; padding: 10px; border-bottom: 1px solid #eee;">Prix</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $item->product->title }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #eee; text-align: center;">{{ $item->quantity }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #eee; text-align: right;">{{ number_format($item->price_at_purchase, 2) }} DH</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="text-align: right; margin-top: 20px;">
        <p style="font-size: 18px; font-weight: bold;">Total : {{ number_format($order->total_amount, 2) }} DH</p>
    </div>

    <p style="margin-top: 40px; font-size: 12px; color: #999; text-align: center;">
        Merci d'avoir choisi LocalMart !
    </p>
</div>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Courses</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        h1 {
            color: white;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .stat-card h3 {
            color: #667eea;
            margin-bottom: 10px;
            font-size: 1.1em;
        }
        .stat-value {
            font-size: 2em;
            font-weight: bold;
            color: #333;
        }
        .form-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            margin-bottom: 30px;
        }
        .form-card h2 {
            color: #667eea;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: 600;
        }
        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1em;
            transition: border-color 0.3s;
        }
        input:focus {
            outline: none;
            border-color: #667eea;
        }
        button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 1.1em;
            cursor: pointer;
            transition: transform 0.2s;
        }
        button:hover {
            transform: translateY(-2px);
        }
        .history-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .history-card h2 {
            color: #667eea;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background: #667eea;
            color: white;
            padding: 15px;
            text-align: left;
        }
        td {
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
        }
        tr:hover {
            background: #f5f5f5;
        }
        .alert {
            background: #4caf50;
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📊 Gestion des Courses Familiales</h1>

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <div class="stats-container">
            <div class="stat-card">
                <h3>💰 Total des Dépenses</h3>
                <div class="stat-value">{{ number_format($totalDepenses, 2) }} €</div>
            </div>
            <div class="stat-card">
                <h3>🏆 Produit le Plus Acheté</h3>
                <div class="stat-value">
                    @if($topProduit)
                        {{ $topProduit->nom }} ({{ $topProduit->nombre }}x)
                    @else
                        Aucun achat
                    @endif
                </div>
            </div>
            <div class="stat-card">
                <h3>📦 Nombre d'Achats</h3>
                <div class="stat-value">{{ $achats->count() }}</div>
            </div>
        </div>

        <div class="form-card">
            <h2>➕ Ajouter un Achat</h2>
            <form action="{{ route('achats.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom du Produit</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="prix">Prix (€)</label>
                    <input type="number" id="prix" name="prix" step="0.01" min="0" required>
                </div>
                <div class="form-group">
                    <label for="date_achat">Date d'Achat</label>
                    <input type="date" id="date_achat" name="date_achat" required value="{{ date('Y-m-d') }}">
                </div>
                <button type="submit">Enregistrer l'Achat</button>
            </form>
        </div>

        <div class="history-card">
            <h2>📜 Historique des Achats</h2>
            @if($achats->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Produit</th>
                            <th>Prix</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($achats as $achat)
                            <tr>
                                <td>{{ $achat->date_achat->format('d/m/Y') }}</td>
                                <td>{{ $achat->nom }}</td>
                                <td>{{ number_format($achat->prix, 2) }} Fcfa</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <p>Aucun achat enregistré pour le moment.</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
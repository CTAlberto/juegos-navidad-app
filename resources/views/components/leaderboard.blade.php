<div>
<div class="leaderboard">
    <h3>Leaderboard</h3>
    <table>
        <thead>
            <tr>
                <th>Posición</th>
                <th>Nombre</th>
                <th>Puntos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($scores as $index => $score)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $score->user->name ?? 'Anónimo' }}</td>  <!-- Asegúrate de que la relación con el usuario esté definida -->
                    <td>{{ $score->points }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    .leaderboard table {
        width: 100%;
        border-collapse: collapse;
    }
    .leaderboard th, .leaderboard td {
        padding: 8px;
        text-align: center;
    }
    .leaderboard th {
        background-color: #f4f4f4;
    }
    .leaderboard tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>
</div>
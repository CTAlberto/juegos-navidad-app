<?php
$scores = session('scores');
?>

<div class="bg-black p-8 rounded-lg shadow-lg max-w-4xl mx-auto mt-10">
    <div class="leaderboard text-white">
        <h3 class="text-4xl font-extrabold text-center mb-6 text-gradient bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-cyan-500 animate-pulse">Leaderboard</h3>
        
        <table class="w-full table-auto text-center border-collapse">
            <thead>
                <tr>
                    <th class="text-xl font-semibold p-4 border-b-2 border-indigo-600 text-purple-400">Posición</th>
                    <th class="text-xl font-semibold p-4 border-b-2 border-indigo-600 text-green-400">Nombre</th>
                    <th class="text-xl font-semibold p-4 border-b-2 border-indigo-600 text-blue-400">Puntos</th>
                </tr>
            </thead>
            <tbody class="space-y-2">
                @foreach ($scores as $index => $score)
                    <tr class="border-b-2 border-gray-700 hover:bg-indigo-700 transition-all duration-300">
                        <td class="py-3 px-6 text-lg text-pink-400">{{ $index + 1 }}</td>
                        <td class="py-3 px-6 text-lg text-yellow-400">{{ $score->user->name ?? 'Anónimo' }}</td>
                        <td class="py-3 px-6 text-lg text-teal-400">{{ $score->points }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

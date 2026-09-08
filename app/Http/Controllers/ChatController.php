<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
{
    $userId = auth()->user()->id;

    // Ambil pengguna-pengguna yang bukan pengguna saat ini
    $users = User::where('id', '!=', $userId)->get();

    // Ambil ID dari semua pengguna kecuali pengguna saat ini
    $userIds = $users->pluck('id')->toArray();

    // Query untuk mengambil pesan terbaru untuk setiap pengguna
    $latestMessages = collect();

    foreach ($userIds as $otherUserId) {
        // Subquery untuk mengambil ID pesan terbaru antara $userId dan $otherUserId
        $latestMessageId = Message::whereIn('id', function ($query) use ($userId, $otherUserId) {
                $query->selectRaw('MAX(id)')
                      ->from('messages')
                      ->where(function ($query) use ($userId, $otherUserId) {
                          $query->where('from_user_id', $userId)
                                ->where('to_user_id', $otherUserId);
                      })
                      ->orWhere(function ($query) use ($userId, $otherUserId) {
                          $query->where('from_user_id', $otherUserId)
                                ->where('to_user_id', $userId);
                      })
                      ->groupBy('from_user_id', 'to_user_id');
            })
            ->orderByDesc('created_at')
            ->first();

        // Hitung jumlah pesan yang belum dibaca dari pengguna lain
        $unreadMessagesCount = Message::where('to_user_id', $userId)
                                      ->where('from_user_id', $otherUserId)
                                      ->whereNull('read_at')
                                      ->count();

        // Simpan data pengguna dan informasi pesan terbaru beserta jumlah pesan belum dibaca
        $latestMessages->put($otherUserId, [
            'latest_message' => $latestMessageId ? Message::find($latestMessageId->id) : null,
            'unread_count' => $unreadMessagesCount,
        ]);
    }

    return view('chat.index', compact('users', 'latestMessages'));
}

}

<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;

class Chat extends Component
{
    public User $user;

    public $message = '';

    public function render()
    {
        $messages = Message::with(['fromUser', 'toUser'])
            ->where(function ($query) {
                $query->where('from_user_id', auth()->id())
                      ->orWhere('to_user_id', auth()->id());
            })
            ->where(function ($query) {
                $query->where('from_user_id', $this->user->id)
                      ->orWhere('to_user_id', $this->user->id);
            })
            ->oldest()
            ->get();

        // Mark messages as read
        Message::where('to_user_id', auth()->id())
            ->where('from_user_id', $this->user->id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return view('livewire.chat', compact('messages'));
    }

    public function sendMessage()
    {
        Message::create([
            'from_user_id' => auth()->user()->id,
            'to_user_id' => $this->user->id,
            'message' => $this->message,
        ]);

        $this->reset('message');
    }

    public function readMessage(Message $message)
    {
        // Lakukan validasi apakah pengguna memiliki akses untuk membaca pesan ini

        // Perbarui kolom read_at untuk menandai pesan telah dibaca
        $message->read_at = now(); // atau gunakan nilai timestamp lainnya sesuai kebutuhan
        $message->save();

        // Redirect atau kembali ke halaman pesan dengan notifikasi berhasil dibaca
    }
}

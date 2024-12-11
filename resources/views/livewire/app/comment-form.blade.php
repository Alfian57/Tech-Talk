@props(['post'])

<div class="tt-item p-3" style="display: flex; justify-content: center;">
    @if ($post->is_closed)
        <span>
            Topik ini sudah ditutup
        </span>
    @elseif(auth()->check())
        <form wire:submit.prevent="addComment" style="width: 100%;">
            <div class="form-group" style="width: 100%;">
                <textarea class="form-control" rows="5" wire:model="content" placeholder="Tambahkan komentar..." style="width: 100%;"></textarea>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mt-2">Kirim</button>
            </div>
        </form>
    @else
        <span>
            Silahkan <a href="{{ route('login') }}">login</a> untuk memberikan komentar
        </span>
    @endif
</div>

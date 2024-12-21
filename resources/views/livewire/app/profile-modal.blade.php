 <div id="js-popup-settings" class="tt-popup-settings" wire:ignore.self>
     <div class="tt-btn-col-close">
         <a href="#">
             <span class="tt-icon-title">
                 <svg>
                     <use xlink:href="#icon-settings_fill"></use>
                 </svg>
             </span>
             <span class="tt-icon-text">
                 Pengaturan Profil
             </span>
             <span class="tt-icon-close">
                 <svg>
                     <use xlink:href="#icon-cancel"></use>
                 </svg>
             </span>
         </a>
     </div>
     <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="tt-form-upload">
             <div class="row no-gutter" style="align-items: center !important;">
                 <div class="col-2">
                     <div class="tt-avatar">
                         @if (auth()->user()->profile_picture)
                             <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                                 alt="{{ auth()->user()->name }}" class="img-fluid"
                                 style="width: 40px; height: 40px; border-radius: 50%;">
                         @else
                             @php
                                 $letter = strtolower(auth()->user()->name[0]);
                             @endphp
                             <svg class="tt-icon">
                                 <use xlink:href="#icon-ava-{{ $letter }}"></use>
                             </svg>
                         @endif
                     </div>
                 </div>
                 <div class="col-10">
                     <div class="form-group" style="margin-top: 10px;">
                         <input type="file" class="form-control" name="profile_picture"
                             wire:model.live="profile_picture">
                         @error('profile_picture')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>
                 </div>
             </div>

             <div class="row justify-content-end">
                 <button type="submit" class="btn btn-secondary btn-sm mt-3">Ubah Foto</button>
             </div>
         </div>
     </form>
     <form class="form-default" wire:submit.prevent="update">
         <div class="form-group">
             <label for="name">Nama</label>
             <input type="text" name="name" class="form-control" id="name" placeholder="user"
                 wire:model="name">
             @error('name')
                 <span class="text-danger">{{ $message }}</span>
             @enderror
         </div>
         <div class="form-group">
             <label for="bio">Bio</label>
             <textarea name="bio" placeholder="Few words about you" class="form-control" id="bio" wire:model="bio"></textarea>
             @error('bio')
                 <span class="text-danger">{{ $message }}</span>
             @enderror
         </div>
         <div class="form-group">
             <label for="email">Email</label>
             <input type="email" name="email" class="form-control" id="email" placeholder="example@example.com"
                 wire:model="email">
             @error('email')
                 <span class="text-danger">{{ $message }}</span>
             @enderror
         </div>
         <div class="form-group">
             <label for="password">Password</label>
             <input type="password" name="password" class="form-control" id="password" placeholder="************"
                 wire:model="password">
             @error('password')
                 <span class="text-danger">{{ $message }}</span>
             @enderror
         </div>
         <div class="form-group">
             <label for="password_confirmation">Konfirmasi Password</label>
             <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                 placeholder="************" wire:model="password_confirmation">
             @error('password_confirmation')
                 <span class="text-danger">{{ $message }}</span>
             @enderror
         </div>
         <span class="text-primary">*Kosongkan password jika tidak ingin mengubah</span>
         <div class="form-group">
             <div class="row justify-content-end">
                 <button type="submit" class="btn btn-sm btn-secondary" wire:loading.attr="disabled"
                     wire:loading.class="loading">
                     <span wire:loading.remove>Ubah Profil</span>
                     <span wire:loading>Loading...</span>
                 </button>
             </div>
         </div>
     </form>
 </div>

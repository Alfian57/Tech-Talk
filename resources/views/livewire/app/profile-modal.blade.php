 <div id="js-popup-settings" class="tt-popup-settings">
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
     <form class="form-default" wire:submit.prevent="update">
         <div class="tt-form-upload">
             <div class="row no-gutter">
                 <div class="col-auto">
                     <div class="tt-avatar">
                         @if (auth()->user()->profile_picture)
                             <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                                 alt="{{ auth()->user()->name }}" class="img-fluid"
                                 style="width: 40px; height: 40px; border-radius: 50%;">
                         @else
                             @php
                                 $letter = strtolower(auth()->user()->name[0]);
                             @endphp
                             <use xlink:href="#icon-ava-{{ $letter }}"></use>
                         @endif
                     </div>
                 </div>
                 <div class="form-group">
                     <input type="file" class="form-control" name="profile_picture" id=""
                         wire:model="profile_picture">
                     @error('profile_picture')
                         <span class="text-danger">{{ $message }}</span>
                     @enderror
                 </div>
             </div>
         </div>
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
             <button type="submit" class="btn btn-secondary">Ubah</button>
         </div>
     </form>
 </div>
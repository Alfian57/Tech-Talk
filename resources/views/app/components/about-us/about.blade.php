<div class="tab-pane show fade active" id="tt-tab-01" role="tabpanel">
    <div class="tt-layout-tab">
        <div class="tt-wrapper-inner">
            <h2 class="tt-title">
                Tentang TechTalk
            </h2>
            Selamat datang di TechTalk, tempat di mana komunitas pecinta teknologi berkumpul untuk berbagi wawasan,
            bertukar ide, dan menyelesaikan tantangan dunia digital bersama.

            TechTalk lahir dari semangat untuk menciptakan ruang diskusi yang inklusif dan dinamis bagi siapa saja yang
            memiliki ketertarikan pada dunia komputer dan teknologi, baik pemula maupun profesional.
            <h3 class="tt-title">
                List Admin
            </h3>
            <div class="tt-list-avatar">
                <div class="row">
                    @foreach ($admins as $admin)
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="#" class="tt-avatar">
                                <div class="tt-col-icon">
                                    @if ($admin->profile_picture)
                                        <img src="{{ asset('storage/' . $admin->profile_picture) }}"
                                            alt="{{ $admin->name }}" class="img-fluid"
                                            style="width: 50px; height: 50px; border-radius: 50%;">
                                    @else
                                        @php
                                            $letter = strtolower($post->user->name[0]);
                                        @endphp
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-ava-{{ $letter }}"></use>
                                        </svg>
                                    @endif
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title">{{ $admin->name }}</h6>
                                    <div class="tt-value">{{ $admin->email }}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <h4 class="tt-title">
                Moderators
            </h4>
            <div class="tt-list-avatar">
                <div class="row">
                    @foreach ($moderators as $moderator)
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="#" class="tt-avatar">
                                <div class="tt-col-icon">
                                    @if ($moderator->profile_picture)
                                        <img src="{{ asset('storage/' . $moderator->profile_picture) }}"
                                            alt="{{ $moderator->name }}" class="img-fluid"
                                            style="width: 50px; height: 50px; border-radius: 50%;">
                                    @else
                                        @php
                                            $letter = strtolower($post->user->name[0]);
                                        @endphp
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-ava-{{ $letter }}"></use>
                                        </svg>
                                    @endif
                                </div>
                                <div class="tt-col-description">
                                    <h6 class="tt-title">{{ $moderator->name }}</h6>
                                    <div class="tt-value">{{ $moderator->email }}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="table-responsive-sm tt-indent-top">
            <table class="table-01">
                <caption>Statistik</caption>
                <thead>
                    <tr>
                        <th>Topik</th>
                        <th>Sepanjang Waktu</th>
                        <th>7 Hari Terakhir</th>
                        <th>30 Hari Terakhir</th>
                    </tr>
                </thead>
                <tbody class="table-zebra">
                    <tr>
                        <td>Topik</td>
                        <td>{{ number_format($topicCount) }}</td>
                        <td>{{ number_format($topicCountInWeek) }}</td>
                        <td>{{ number_format($topicCountInMonth) }}</td>
                    </tr>
                    <tr>
                        <td>Komentar</td>
                        <td>{{ number_format($commentCount) }}</td>
                        <td>{{ number_format($commentCountInWeek) }}</td>
                        <td>{{ number_format($commentCountInMonth) }}</td>
                    </tr>
                    <tr>
                        <td>Pengguna</td>
                        <td>{{ number_format($userCount) }}</td>
                        <td>{{ number_format($userCountInWeek) }}</td>
                        <td>{{ number_format($userCountInMonth) }}</td>
                    </tr>
                    <tr>
                        <td>Suka</td>
                        <td>{{ number_format($likeCount) }}</td>
                        <td>{{ number_format($likeCountInWeek) }}</td>
                        <td>{{ number_format($likeCountInMonth) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tt-wrapper-inner tt-indent-top">
            <h4 class="tt-title">
                Kontak Kami
            </h4>
            Silakan tinggalkan pesan kepada kami di admin@techtalk.com
        </div>
    </div>
</div>

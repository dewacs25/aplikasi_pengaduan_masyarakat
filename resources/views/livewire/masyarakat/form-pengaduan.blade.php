<div>
    @include('layouts.navMasyarakat')

    @if ($pengaturan == true)
        @include('livewire.masyarakat.pengaturan')
    @elseif($petugas == true)
        @include('livewire.masyarakat.petugas')
    @elseif($detail == true)
        @include('livewire.masyarakat.detailLaporan')
    @else
        @auth
            @include('livewire.masyarakat.historyPengaduan')
        @endauth
        @guest
            <section class="hero">
                <h1>Laporkan keluhan Anda sekarang!</h1>
            </section>
            <section class="layanan">
                <div class="isiLayanan">
                    <i class="fa fa-user"></i>
                    <h2>Daftar Akun</h2>
                    <p>
                        Daftarkan akun Anda untuk dapat melaporkan pengad an dengan mudah
                        dan cepat.
                    </p>
                </div>
                <div class="isiLayanan">
                    <i class="fa fa-comments"></i>
                    <h2>Laporkan Pengaduan</h2>
                    <p>
                        Laporkan pengaduan Anda secara langsung melalui aplikasi ini tanpa
                        harus datang ke kantor.
                    </p>
                </div>
                <div class="isiLayanan">
                    <i class="fa fa-clock"></i>
                    <h2>Proses Cepat</h2>
                    <p>
                        Pengaduan yang dilaporkan akan segera diproses oleh petugas kami
                        dengan waktu yang cepat.
                    </p>
                </div>
                <div class="isiLayanan">
                    <i class="fa fa-check"></i>
                    <h2>Penanganan Terpercaya</h2>
                    <p>
                        Pengaduan Anda akan ditangani oleh petugas yang terpercaya dan
                        profesional.
                    </p>
                </div>
            </section>
        @endguest
        <section class="cta">
            <h2>Ayo laporkan pengaduan Anda sekarang juga!</h2>
            <p>Untuk melaporkan pengaduan, silahkan klik tombol di bawah ini.</p>
            <button wire:click='btnBuatLaporan'>Laporkan Sekarang</button>
        </section>
        <footer class="footer">
            <p>© 2023 Aplikasi Pengaduan Masyarakat By Haudy</p>
        </footer>
        @if ($btnBuatLaporan)
            @include('livewire.masyarakat.form')
        @endif
        @if (session()->has('success'))
            <div class="alert">
                <button class="closeAlert" wire:click='DeleteSession'>&times;</button>
                <p>{{ session('success') }}</p>
            </div>
        @endif
    @endif


</div>

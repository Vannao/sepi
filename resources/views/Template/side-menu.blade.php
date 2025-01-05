<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="/dashboard"><i class="fa fa-home"></i><span
                        class="menu-title">Dashboard</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item active" href="{{ route('audit.index') }}">Laporan Hasil Audit</a>
                    </li>
                    <li><a class="menu-item" href="{{ route('tindak-lanjut.index') }}">Tindak
                            Lanjut</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="fa fa-files-o"></i><span
                        class="menu-title">Laporan</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('laporan.index') }}">Laporan Kegiatan SPI</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

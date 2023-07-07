<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-dark">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            <a href="/dashboard"
                class="list-group-item list-group-item-action py-2 ripple 
                    {{ collect(explode('/', url()->current()))->pop() === 'dashboard' ? 'active' : 'bg-dark text-white' }}"
                aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3"></i>
                <span>Dashboard</span>
            </a>
            <a href="/pemilik"
                class="list-group-item list-group-item-action py-2 ripple 
                    {{ collect(explode('/', url()->current()))->pop() === 'pemilik' ? 'active' : 'bg-dark text-white' }}"
                aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3"></i>
                <span>Admin</span>
            </a>
            <a href="/penyewa" class="list-group-item list-group-item-action py-2 ripple  
                        {{ collect(explode('/', url()->current()))->pop() === 'penyewa' ||
                        collect(explode('/', url()->current()))->contains('penyewa') ||
                        request()->has('cariPenyewa')
                            ? 'active'
                            : 'bg-dark text-white' }}">
                <i class="fas fa-chart-area fa-fw me-3"></i>
                <span>Penyewa</span>
            </a>
            <a href="/kos" class="
                        list-group-item list-group-item-action py-2 ripple 
                        {{ collect(explode('/', url()->current()))->pop() === 'kos' ||
                        (collect(explode('/', url()->current()))->contains('kamar') &&
                            collect(explode('/', url()->current()))->last() === $id) ||
                        request()->has('cariKos') ||
                        request()->has('cariKamar')
                            ? 'active'
                            : 'bg-dark text-white' }}">
                <i class="fas fa-lock fa-fw me-3"></i>
                <span>kos</span>
            </a>
            <a href="/pilih-kos" class="list-group-item list-group-item-action py-2 ripple 
                    {{ collect(explode('/', url()->current()))->pop() === 'pilih-kos' ||
                    (collect(explode('/', url()->current()))->contains('kontrak') &&
                        collect(explode('/', url()->current()))->last() === $id) ||
                    request()->has('cariKontrak')
                        ? 'active'
                        : 'bg-dark text-white' }}">
                <i class="fas fa-chart-line fa-fw me-3"></i>
                <span>Kontrak</span>
            </a>
            <a href="/laporan" class="list-group-item list-group-item-action py-2 ripple 
                    {{ collect(explode('/', url()->current()))->pop() === 'laporan' || request()->has('cari')
                        ? 'active'
                        : 'bg-dark text-white' }}">
                <i class="fas fa-chart-pie fa-fw me-3"></i>
                <span>Laporan</span>
            </a>
        </div>
    </div>
</nav>
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-dark">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            <a
                href="/dashboard"
                class="list-group-item list-group-item-action py-2 ripple {{ collect(explode('/', url()->current()))->pop() === 'dashboard' ? 'active' : 'bg-dark text-white' }}"
"
                aria-current="true"
            >
                <i class="fas fa-tachometer-alt fa-fw me-3"></i
                ><span>Dashboard</span>
            </a>
            <a
                href="/penyewa"
                class="list-group-item list-group-item-action py-2 ripple text-white {{ collect(explode('/', url()->current()))->pop() === 'penyewa' ? 'active' : 'bg-dark text-white' }}"
            >
                <i class="fas fa-chart-area fa-fw me-3"></i
                ><span>Penyeawa</span>
            </a>
            <a
                href="/kos"
                class="
                    list-group-item list-group-item-action py-2 ripple text-white 
                    {{ collect(explode('/', url()->current()))->pop() === 'kos' ? 'active' : 'bg-dark text-white' }}"
                ><i class="fas fa-lock fa-fw me-3"></i><span>Kos</span></a
            >
            <a
                href="/pilih-kos"
                class="list-group-item list-group-item-action py-2 ripple {{ collect(explode('/', url()->current()))->pop() === 'pilih-kos' ? 'active' : 'bg-dark text-white' }}"
                ><i class="fas fa-chart-line fa-fw me-3"></i
                ><span>Kontrak</span></a
            >
            <a
                href="/laporan"
                class="list-group-item list-group-item-action py-2 ripple {{ collect(explode('/', url()->current()))->pop() === 'laporan' ? 'active' : 'bg-dark text-white' }}"
"
            >
                <i class="fas fa-chart-pie fa-fw me-3"></i><span>Laporan</span>
            </a>
        </div>
    </div>
</nav>

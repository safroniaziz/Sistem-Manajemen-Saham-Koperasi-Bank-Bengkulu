<li class="{{ set_active('home') }}">
    <a href="{{ route('home') }}">
        <i class="fa fa-home"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="{{ set_active('ketuaKoperasi') }}">
    <a href="{{ route('ketuaKoperasi') }}">
        <i class="fa fa-user-tie"></i>
        <span>Data Ketua Koperasi</span>
    </a>
</li>

<li class="{{ set_active('pejabatBerwenang') }}">
    <a href="{{ route('pejabatBerwenang') }}">
        <i class="fa fa-suitcase"></i>
        <span>Data Pejabat Berwenang</span>
    </a>
</li>

<li class="{{ set_active('agenPemasaran') }}">
    <a href="{{ route('agenPemasaran') }}">
        <i class="fa fa-tags"></i>
        <span>Data Agen Pemasaran</span>
    </a>
</li>

<li class="{{ set_active('user') }}">
    <a href="{{ route('user') }}">
        <i class="fa fa-user-clock"></i>
        <span>Data Operator</span>
    </a>
</li>

<li class="header" style="font-weight:bold; padding-bottom:1px !important;">REKENING INDIVIDUAL</li>
<li class="{{ set_active(['investor','investor.create','investor.edit']) }}">
    <a href="{{ route('investor') }}">
        <i class="fa fa-credit-card"></i>
        <span>Data Investor</span>
    </a>
</li>

<li class="{{ set_active(['sahamInvestor','sahamInvestor.create','sahamInvestor.edit','sahamInvestor.alihkan']) }}">
    <a href="{{ route('sahamInvestor') }}">
        <i class="fa fa-chart-line"></i>
        <span>Data Saham Investor</span>
    </a>
</li>   

<li class="header" style="font-weight:bold; padding-bottom:1px !important;">REKENING INSTITUSI</li>
<li class="{{ set_active(['institusi','institusi.create','institusi.edit']) }}">
    <a href="{{ route('institusi') }}">
        <i class="fa fa-university"></i>
        <span>Data Institusi</span>
    </a>
</li>

<li class="{{ set_active(['sahamInstitusi','sahamInstitusi.create','sahamInstitusi.edit','sahamInstitusi.alihkan']) }}">
    <a href="{{ route('sahamInstitusi') }}">
        <i class="fa fa-chart-bar"></i>
        <span>Data Saham Institusi</span>
    </a>
</li>   

<li>
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        <i class="fa fa-power-off text-danger"></i>{{__('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>

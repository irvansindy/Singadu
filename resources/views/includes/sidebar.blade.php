<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @if (Auth::user()->role =='1')
                    <span class="ml-4">Admin Approval</span>
                    <li>
                        <a href="{{route('admin')}}" class="waves-effect"><i class="fa fa-home m-r-10" aria-hidden="true"></i>Home</a>
                    </li>
                    <li>
                        <a href="{{route('formDataType')}}" class="waves-effect"><i class="fa fa-pencil m-r-10" aria-hidden="true"></i>Add Type</a>
                    </li>
                    <li>
                        <a href="{{route('dataClient')}}" class="waves-effect"><i class="fa fa-table m-r-10" aria-hidden="true"></i>Data Client</a>
                    </li>
                    <li>
                        <a href="{{route('dataTeknisi')}}" class="waves-effect"><i class="fa fa-table m-r-10" aria-hidden="true"></i>Data Teknisi</a>
                    </li>
                    <li>
                        <a href="{{route('dataLaporan')}}" class="waves-effect"><i class="fa fa-table m-r-10" aria-hidden="true"></i>Riwayat Laporan</a>
                    </li>
                    <hr/>
                @elseif (Auth::user()->role == '2')
                    <span class="ml-4">Client</span>
                    <li>
                        <a href="{{route('client')}}" class="waves-effect"><i class="fa fa-table m-r-10" aria-hidden="true"></i>Data Pengaduan</a>
                    </li>
                    <hr/>
                @elseif (Auth::user()->role == '3')
                    <span class="ml-4">Teknisi</span>
                    <li>
                        <a href="{{route('teknisi')}}" class="waves-effect"><i class="fa fa-table m-r-10" aria-hidden="true"></i>Data Pengaduan</a>
                    </li>
                    <hr/>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
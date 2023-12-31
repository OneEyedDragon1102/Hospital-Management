@include('./doctor.components.header')

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('./doctor.components.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('./doctor.components.navbar')
            <!-- Navbar End -->


            <!-- main-->
            <!-- Sale & Revenue Start -->
            @include('./doctor.components.main')
            <!-- Widgets End -->
            <!-- main-->


            <!-- Footer Start -->
            @include('./doctor.components.footer')
            {{-- Footer End --}}
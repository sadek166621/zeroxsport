@extends('FrontEnd.master')
@section('title')
Home
@endsection
@section('content')

<style>


    /* Two Column Layout */
    .main-content-wrapper {
        display: flex;
        gap: 20px;
        margin-top: 20px;
    }

    .side-menu-container {
        /* flex: 0 0 250px; */
        position: sticky;
        top: 155px;
        height: fit-content;
        /* max-height: calc(100vh - 20px); */
        overflow-y: auto;
        padding-bottom: 10px;
    }

    .content-container {
        flex: 1;
        overflow: hidden;
    }

    @media (max-width: 992px) {
        .main-content-wrapper {
            flex-direction: column;
        }

        .side-menu-container {
            position: static;
            width: 100%;
            max-height: none;
        }
    }
</style>

<div class="main-content-wrapper custom_container mt-3">
    <!-- Side Menu Column -->
    <div class="side-menu-container d-md-block d-none">
        @include('FrontEnd.home.sidebar')
    </div>
    <!-- Side Menu Column End -->
    <!-- Main Content Column -->
    <div class="content-container">
        @include('FrontEnd.home.hero_section')
        @include('FrontEnd.home.featured_product_section')
        @include('FrontEnd.home.flash_sale_section')
        @include('FrontEnd.home.latest_product_section')
        @include('FrontEnd.home.about_section')
    </div>
    <!-- Main Content Column End -->
</div>

@include('FrontEnd.include.cart-contianer')
@endsection

@push('js')
<script>
    function wholesellerAlert() {
        Swal.fire({
            icon: 'info',
            title: 'You are a Wholeseller!',
            text: 'Please go to your dashboard to manage orders.',
            showCancelButton: true,
            confirmButtonText: 'Go to Dashboard',
            cancelButtonText: 'Close',
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('wholeseller.dashboard') }}";
            }
        });
    }
</script>
@endpush
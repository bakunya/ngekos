@inject('pass', 'App\Helpers\RandomPassword')

@extends('layouts.base')

@section('title', 'Manajemen Penyewa')

@section('push_head')
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}" />
@endsection

@section('content')
    <div id="app">
        <x-sidebar active-nav="{{ $active_nav }}" active-subnav="{{ $active_subnav }}" />
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <x-page-title title="{{ $title ?? '' }}" subtitle="{{ $subtitle ?? '' }}" current="{{ $current ?? '' }}" />

                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <form class="col-12" enctype="multipart/form-data" method="post" action="{{ route('POST.admin.kos.create') }}">
                            @csrf
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <textarea name="post" id="default" cols="30" rows="10"></textarea>
                                            </div>
                                            <div class="col-12 my-4">
                                                <input name="images[]" type="file" class="multiple-files-filepond m-0 p-0" multiple />
                                            </div>
                                            <div class="col-6 ms-auto">
                                                <button type="submit" class="btn btn-primary container-fluid">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
                <!-- // Basic Horizontal form layout section end -->
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>
                            Crafted with
                            <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="https://saugi.me">Saugi</a>
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection

@section('push_scripts')
    <x-swal />
    <script src="{{ asset('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/extensions/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/tinymce.js') }}"></script>

    <script>
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageCrop,
            FilePondPluginImageExifOrientation,
            FilePondPluginImageFilter,
            FilePondPluginImageResize,
            FilePondPluginFileValidateSize,
            FilePondPluginFileValidateType,
        )

        // Filepond: Multiple Files
        FilePond.create(document.querySelector(".multiple-files-filepond"), {
            credits: null,
            allowImagePreview: true,
            allowMultiple: true,
            allowFileEncode: false,
            required: true,
            storeAsFile: true,
            maxFileSize: '2mb',
            allowFileSizeValidation: true,
            acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg"],
        })
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const themeOptions = document.body.classList.contains("theme-dark") ?
                {
                    skin: "oxide-dark",
                    content_css: "dark",
                } :
                {
                    skin: "oxide",
                    content_css: "default",
                }

            tinymce.init({
                selector: "#default",
                ...themeOptions
            })
            tinymce.init({
                selector: "#dark",
                toolbar: "undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code",
                plugins: "code",
                ...themeOptions,
            })
        })
    </script>
@endsection

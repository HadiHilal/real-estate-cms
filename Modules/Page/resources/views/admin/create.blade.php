@extends('layouts.admin.base')

@section('title' , __('New Page'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Pages' , 'url' => route('admin.pages.index')],
            ['label' => 'New Page'],
        ];
    @endphp
    <x-admin.breadcrumb pageTitle="New Page" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3"></div>
@endsection

@section('content')
    <x-admin.create-card title="New Page" :formUrl="route('admin.pages.store')">
        <div class="row mb-8">

            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Image')}} <span class="text-danger">*</span>
                </div>
            </div>

            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <!--begin::Image input-->
                <div class="image-input image-input-outline " data-kt-image-input="true"
                     style="background-image: url('{{asset('images/default.jpg')}}')">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                         style="background-size: 75%; background-image: url({{asset('images/default.jpg')}})"></div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label
                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="img" accept=".png, .jpg, .jpeg, .webp" required/>
                        <input type="hidden" name="avatar_remove"/>
                        <!--end::Inputs-->
                    </label>
                    <!--end::Label-->
                    <!--begin::Cancel-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                          data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Cancel-->
                    <!--begin::Remove-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                          data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Remove-->
                </div>
                <!--end::Image input-->
                <!--begin::Hint-->
                <div class="form-text"> 900px * 600px</div>
                <!--end::Hint-->
            </div>
            <!--end::Col-->
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Url')}} <span class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" id="gslug" placeholder="example: About us "/>
                <input type="hidden" name="slug" value="{{old('slug')}}" id="slug">
                <div class="my-3" id="link">{{old('slug')}}</div>
                <div class="my-3" id="error"></div>
            </div>

        </div>

        <!--begin::Row-->
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Country')}} <span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <select class="form-select" name="country_id" data-control="select2" id="country_id" required
                        data-placeholder="{{__('Please Chose One')}}">
                    <option></option>
                    @foreach($countries as $country)
                        <option value="{{$country->id }}">{{$country->name}}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <!--end::Row-->

        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-translate text-primary mx-1 "></i>{{__('Title')}} <span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" name="title" value="{{old('title')}}"
                       placeholder="About us"/>
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-translate text-primary mx-1 "></i>{{__('Brief Description')}} <span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <p class="text-success fw-bold mb-1">{{__('This Description Very Important For SEO Should Be Between 150-160 characters')}}</p>
                <input type="text" class="form-control form-control-solid" name="description" id="description"
                       value="{{old('description')}}" placeholder="We are a powerfull company..."/>
                <small class="text-muted" id="wordCountDisplay"></small>

            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i>{{__('Content')}}
                    <span class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <textarea name="content" class="form-control form-control-solid "
                          id="tinymce">{!! old('content') !!}</textarea>
            </div>
        </div>

        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i class="bi bi-translate text-primary mx-1 "></i>{{__('Keywords')}}
                    <span class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input class="form-control" value="{{old('keywords' , 'Real Estate,')}}" name="keywords"
                       id="kt_tagify_1"/>
            </div>
        </div>


        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Page Type')}} <span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" checked type="radio" name="type" id="inlineRadio1"
                           value="custom">
                    <label class="form-check-label" for="inlineRadio1">{{__('General Page')}}</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="inlineRadio2"
                           value="service">
                    <label class="form-check-label" for="inlineRadio2">{{__('Service Page')}}</label>
                </div>

            </div>
        </div>

        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Publish')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <div class="form-check form-switch form-check-custom form-check-solid me-10">
                    <input class="form-check-input h-30px w-50px" checked type="checkbox" name="publish"
                           id="flexSwitch30x50"/>
                </div>
            </div>
        </div>
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Featured')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <div class="form-check form-switch form-check-custom form-check-solid me-10">
                    <input class="form-check-input h-30px w-50px" checked type="checkbox" name="featured"
                           id="flexSwitch30x50"/>
                </div>
            </div>
        </div>
    </x-admin.create-card>
@endsection

@section('js')
    <script src="https://cdn.tiny.cloud/1/{{Config::get('core.tinymce_key')}}/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        $(document).ready(function (e) {
            var input1 = document.querySelector("#kt_tagify_1");
            new Tagify(input1);

            $('#gslug').on('input', function () {
                var val = $(this).val();
                var slug = generateSlug(val);
                if (slug !== '') {
                    $('#link').addClass('text-primary').text("{{env('APP_URL')}}/p/" + slug);
                    $('#slug').val(slug);
                } else {
                    $('#link').addClass('text-danger').text("{{__('The Slug Should Be English')}}");
                }

            });

            $("#description").on("input", function () {
                var text = $(this).val();
                var charCount = text.length;
                $("#wordCountDisplay").text(charCount + ' ' + '{{__('Character')}}');
            });

            function generateSlug(text) {
                return text
                    .toLowerCase()
                    .replace(/[^\w\s-]/g, '') // Remove non-word characters
                    .replace(/\s+/g, '-') // Replace whitespace with dashes
                    .replace(/--+/g, '-') // Replace multiple dashes with a single dash
                    .trim(); // Trim leading/trailing whitespace and dashes
            }

            tinymce.init({
                selector: 'textarea',
                height: 750,
                plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                toolbar: 'undo redo | blocks  fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                @if(app()->getLocale() == 'ar') language: 'ar', @endif
                ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
            });

        })

    </script>

@endsection

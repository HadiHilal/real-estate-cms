    <div class="menu-item">
        <div class="menu-content pb-2">
            <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{ __('Admin Tools') }}</span>
        </div>
    </div>
     @can('Manage Settings')
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ isset($active['settings']) ? 'show hover' : '' }}">
            <span class="menu-link">
                <span class="menu-icon">
                    <i class="bi bi-wrench-adjustable"></i>
                </span>
                <span class="menu-title">{{ __('Settings') }}</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['website_settings']) ? 'show' : '' }}">
                <div class="menu-item">
                    <a class="menu-link {{ isset($active['website_settings']) ? 'active' : '' }}"
                        href="{{ route('admin.settings.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('Website Configurations') }}</span>
                    </a>
                </div>
            </div>
            <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['website_seo']) ? 'show' : '' }}">
                <div class="menu-item">
                    <a class="menu-link {{ isset($active['website_seo']) ? 'active' : '' }}"
                        href="{{ route('admin.seo.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('Seo Configurations') }}</span>
                    </a>
                </div>
            </div>
        </div>
    @endcan

    @can('Manage Lands')
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ isset($active['lands']) ? 'show hover' : '' }}">
            <span class="menu-link">
                <span class="menu-icon">
                    <i class="bi bi-map"></i>
                </span>
                <span class="menu-title">{{ __('Lands') }}</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['lands_types']) ? 'show' : '' }}">
                <div class="menu-item">
                    <a class="menu-link {{ isset($active['lands_types']) ? 'active' : '' }}"
                        href="{{ route('admin.lands.types.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('Lands Types') }}</span>
                    </a>
                </div>
            </div>
            <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['lands_features']) ? 'show' : '' }}">
                <div class="menu-item">
                    <a class="menu-link {{ isset($active['lands_features']) ? 'active' : '' }}"
                        href="{{ route('admin.lands.features.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('Lands Features') }}</span>
                    </a>
                </div>
            </div>

            <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['lands_lists']) ? 'show' : '' }}">
                <div class="menu-item">
                    <a class="menu-link {{ isset($active['lands_lists']) ? 'active' : '' }}"
                        href="{{ route('admin.lands.lists.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('Lands Lists') }}</span>
                    </a>
                </div>
            </div>

        </div>
    @endcan

     @can('Manage Properties')
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ isset($active['properties']) ? 'show hover' : '' }}">
            <span class="menu-link">
                <span class="menu-icon">
                    <i class="bi bi-buildings"></i>
                </span>
                <span class="menu-title">{{ __('Properties') }}</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['types']) ? 'show' : '' }}">
                <div class="menu-item">
                    <a class="menu-link {{ isset($active['types']) ? 'active' : '' }}"
                        href="{{ route('admin.properties.types.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('Properties Types') }}</span>
                    </a>
                </div>
            </div>
            <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['features']) ? 'show' : '' }}">
                <div class="menu-item">
                    <a class="menu-link {{ isset($active['features']) ? 'active' : '' }}"
                        href="{{ route('admin.properties.features.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('Properties Features') }}</span>
                    </a>
                </div>
            </div>

            <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['properties_lists']) ? 'show' : '' }}">
                <div class="menu-item">
                    <a class="menu-link {{ isset($active['properties_lists']) ? 'active' : '' }}"
                        href="{{ route('admin.properties.lists.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('Properties Lists') }}</span>
                    </a>
                </div>
            </div>

        </div>
    @endcan

      @can('Manage Blogs')
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ isset($active['blogs']) ? 'show hover' : '' }}">
            <span class="menu-link">
                <span class="menu-icon">
                    <i class="bi bi-columns-gap"></i>
                </span>
                <span class="menu-title">{{ __('Blogs') }}</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['categories']) ? 'show' : '' }}">
                <div class="menu-item">
                    <a class="menu-link {{ isset($active['categories']) ? 'active' : '' }}"
                        href="{{ route('admin.blogs.categories.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('Categories') }}</span>
                    </a>
                </div>
            </div>
             <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['posts']) ? 'show' : '' }}">
                <div class="menu-item">
                    <a class="menu-link {{ isset($active['posts']) ? 'active' : '' }}"
                        href="{{ route('admin.blogs.posts.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('Posts') }}</span>
                    </a>
                </div>
            </div>
        </div>
    @endcan

    @can('Manage Pages')
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ isset($active['pages']) ? 'show hover' : '' }}">
            <span class="menu-link">
                <span class="menu-icon">
                    <i class="bi bi-calendar4-range"></i>
                </span>
                <span class="menu-title">{{ __('Pages') }}</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['pages']) ? 'show' : '' }}">
                <div class="menu-item">
                    <a class="menu-link {{ isset($active['custom_pages']) ? 'active' : '' }}"
                        href="{{ route('admin.pages.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('General Pages') }}</span>
                    </a>
                </div>
            </div>
        </div>
    @endcan

    @can('Manage FileManger')
        <div class="menu-item">
            <a class="menu-link {{ isset($active['FileManger']) ? 'active' : '' }}"
                href="{{ route('admin.file-manger.index') }}">
                <span class="menu-icon">
                    <i class="bi bi-cloud-arrow-down"></i>
                </span>
                <span class="menu-title">{{ __('File Manger') }}</span>
            </a>
        </div>
    @endcan
    @can('Manage Faqs')
        <div class="menu-item">
            <a class="menu-link {{ isset($active['faqs']) ? 'active' : '' }}" href="{{ route('admin.faqs.index') }}">
                <span class="menu-icon">
                    <i class="bi bi-patch-question"></i>
                </span>
                <span class="menu-title">{{ __('FAQs') }}</span>
            </a>
        </div>
    @endcan
    @can('Manage Testimonials')
        <div class="menu-item">
            <a class="menu-link {{ isset($active['testimonials']) ? 'active' : '' }}"
                href="{{ route('admin.testimonials.index') }}">
                <span class="menu-icon">
                    <i class="bi bi-chat-left-quote-fill"></i>
                </span>
                <span class="menu-title">{{ __('Testimonials') }}</span>
            </a>
        </div>
    @endcan

    @can('Manage Subscribers')
        <div class="menu-item">
            <a class="menu-link {{ isset($active['subscribers']) ? 'active' : '' }}"
                href="{{ route('admin.subscribers.index') }}">
                <span class="menu-icon">
                    <i class="bi bi-envelope-open-heart"></i>
                </span>
                <span class="menu-title">{{ __('Subscribers') }}</span>
            </a>
        </div>
    @endcan

        @can('Manage Contacts')
        <div class="menu-item">
            <a class="menu-link {{ isset($active['contacts']) ? 'active' : '' }}"
                href="{{ route('admin.contacts.index') }}">
                <span class="menu-icon">
                    <i class="bi bi-envelope-check"></i>
                </span>
                <span class="menu-title">{{ __('Contacts') }}</span>
            </a>
        </div>
    @endcan

    @can('Manage Currencies')
        <div class="menu-item">
            <a class="menu-link {{ isset($active['currencies']) ? 'active' : '' }}"
                href="{{ route('admin.currencies.index') }}">
                <span class="menu-icon">
                    <i class="bi bi-currency-exchange"></i>
                </span>
                <span class="menu-title">{{ __('Currencies') }}</span>
            </a>
        </div>
    @endcan

    @can('Manage Roles')
        <div class="menu-item">
            <a class="menu-link {{ isset($active['roles']) ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">
                <span class="menu-icon">
                    <i class="bi bi-shield-lock"></i>
                </span>
                <span class="menu-title">{{ __('Roles') }}</span>
            </a>
        </div>
    @endcan

    @can('Manage Users & Admins')
        <div data-kt-menu-trigger="click"
            class="menu-item menu-accordion {{ isset($active['users lists']) ? 'show hover' : '' }}">
            <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                    <i class="bi bi-people"></i>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">{{ __('Users') }}</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['admins']) ? 'show' : '' }}">
                <div class="menu-item">
                    <a class="menu-link {{ isset($active['admins']) ? 'active' : '' }}"
                        href="{{ route('admin.admins.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('Admins') }}</span>
                    </a>
                </div>
            </div>
            <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['users']) ? 'show' : '' }}">
                <div class="menu-item">
                    <a class="menu-link {{ isset($active['users']) ? 'active' : '' }}"
                        href="{{ route('admin.users.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('Users') }}</span>
                    </a>
                </div>
            </div>


        </div>
    @endcan

    {{--            <div class="menu-item"> --}}
    {{--                <div class="menu-content"> --}}
    {{--                    <div class="separator mx-1 my-4"></div> --}}
    {{--                </div> --}}
    {{--            </div> --}}

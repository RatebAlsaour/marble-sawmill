<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Marble<span>Sawmill</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">




                <li class="nav-item {{ \App\Helpers\TemplateHelper::active_class(['suppliers']) }}">
                    <a class="nav-link" href="{{ route('suppliers.index') }}" role="button"
                       aria-expanded="{{ \App\Helpers\TemplateHelper::is_active_route(['suppliers']) }}"
                       aria-controls="email">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">{{__('common.suppliers_management')}}</span>
                        {{--<i class="link-arrow" data-feather="chevron-down"></i>--}}
                    </a>
                </li>

            <li class="nav-item {{ \App\Helpers\TemplateHelper::active_class(['supplier-invoices']) }}">
                <a class="nav-link" href="{{ route('supplier-invoices.index') }}" role="button"
                   aria-expanded="{{ \App\Helpers\TemplateHelper::is_active_route(['supplier-invoices']) }}"
                   aria-controls="email">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">{{__('common.supplier_invoice')}}</span>
                </a>
            <li class="nav-item {{ \App\Helpers\TemplateHelper::active_class(['email/*']) }}">
                <a class="nav-link" href="{{ route('clients.index') }}" role="button"
                   aria-expanded="{{ \App\Helpers\TemplateHelper::is_active_route(['email/*']) }}"
                   aria-controls="email">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">{{__('common.clients_management')}}</span>
                    {{--<i class="link-arrow" data-feather="chevron-down"></i>--}}
                </a>
            </li>
            </li>
            <li class="nav-item {{ \App\Helpers\TemplateHelper::active_class(['client-invoices']) }}">
                <a class="nav-link" href="{{ route('client-invoices.index') }}" role="button"
                   aria-expanded="{{ \App\Helpers\TemplateHelper::is_active_route(['client-invoices']) }}"
                   aria-controls="email">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">{{__('common.invoices')}}</span>
                </a>
            </li>


             <li class="nav-item {{ \App\Helpers\TemplateHelper::active_class(['users']) }}">
                <a class="nav-link" href="{{ route('users.index') }}" role="button"
                   aria-expanded="{{ \App\Helpers\TemplateHelper::is_active_route(['users']) }}"
                   aria-controls="email">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">{{__('common.users_management')}}</span>
                    {{--<i class="link-arrow" data-feather="chevron-down"></i>--}}
                </a>
             </li>

             <li class="nav-item {{ \App\Helpers\TemplateHelper::active_class(['costs']) }}">
                <a class="nav-link" href="{{ route('costs.index') }}" role="button"
                    aria-expanded="{{ \App\Helpers\TemplateHelper::is_active_route(['costs']) }}"
                    aria-controls="email">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">{{__('common.costs')}}</span>
                    {{--<i class="link-arrow" data-feather="chevron-down"></i>--}}
                </a>
             </li>

             <li class="nav-item {{ \App\Helpers\TemplateHelper::active_class(['category']) }}">
                <a class="nav-link" href="{{ route('categories.index') }}" role="button"
                    aria-expanded="{{ \App\Helpers\TemplateHelper::is_active_route(['category']) }}"
                    aria-controls="email">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">{{__('common.categories')}}</span>
                </a>
             </li>

             <li class="nav-item {{ \App\Helpers\TemplateHelper::active_class(['currencies']) }}">
                <a class="nav-link" href="{{ route('currencies.index') }}" role="button"
                    aria-expanded="{{ \App\Helpers\TemplateHelper::is_active_route(['currencies']) }}"
                    aria-controls="email">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">{{__('common.currencies')}}</span>
                </a>
             </li>

                  <li class="nav-item {{ \App\Helpers\TemplateHelper::active_class(['client-invoices']) }}">
                <a class="nav-link" href="{{ route('client-invoices.index') }}" role="button"
                    aria-expanded="{{ \App\Helpers\TemplateHelper::is_active_route(['client-invoices']) }}"
                    aria-controls="email">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">{{__('common.clientInvoices')}}</span>
                </a>
             </li>


            </li>
            {{-- use template helper active_class method  --}}
            <li class="nav-item {{ \App\Helpers\TemplateHelper::active_class(['countries']) }}">
                <a class="nav-link" href="{{ route('countries.index') }}" role="button"
                   aria-expanded="{{ \App\Helpers\TemplateHelper::is_active_route(['countries']) }}"
                   aria-controls="email">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">{{__('common.countries')}}</span>
                    {{--<i class="link-arrow" data-feather="chevron-down"></i>--}}
                </a>
            </li>
        </ul>
    </div>
</nav>

<script>
    // Prevent reload page when user clicked on an active link
    document.querySelector('.nav-item.active').addEventListener("click", function(event) {
        event.preventDefault();
    } );
</script>

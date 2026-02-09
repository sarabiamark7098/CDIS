{{-- This file is used for menu items by any Backpack v7 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('user')" />

<x-backpack::menu-item title="Beneficiaries" icon="la la-question" :link="backpack_url('beneficiary')" />
<x-backpack::menu-item title="Imports" icon="la la-question" :link="backpack_url('import')" />

<x-backpack::menu-item title="Profiles" icon="la la-question" :link="backpack_url('profile')" />
<x-backpack::menu-item title="Transactions" icon="la la-question" :link="backpack_url('transaction')" />
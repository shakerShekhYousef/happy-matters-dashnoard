<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-building"></i>
                        
                       <span>Proeprties Manag</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false"> 
                        <li><a href="{{ route('web_properties_list') }}"><i class="ion ion-md-menu"></i> List Properties</a></li>
                        <li><a href="{{ route('web_create_property') }}"><i class="ion ion-md-add-circle"> </i> Create Property</a></li>
                    </ul>
                </li>
                <!--  -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-bullhorn" aria-hidden="true"></i>
                        <span>Announcements Manag</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false"> 
                        <li><a href="{{ route('web_announcements_list') }}"><i class="ion ion-md-menu"></i> List Announcements</a></li>
                        <li><a href="{{ route('web_create_announcement') }}"><i class="ion ion-md-add-circle"> </i> Create Announcement</a></li>
                    </ul>
                </li>
                 <!--  -->
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-building"></i>
                        <span>Units Manag</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false"> 
                        <li><a href="{{ route('web_units_list') }}"><i class="ion ion-md-menu"></i> List Units</a></li>
                        <li><a href="{{ route('web_create_unit') }}"><i class="ion ion-md-add-circle"> </i> Create Units</a></li>
                    </ul>
                </li>
                <!--  -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-warehouse"></i>
                        <span>inventory items</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false"> 
                        <li><a href="{{ route('web_inventory_list') }}"><i class="ion ion-md-menu"></i> List inventory items</a></li>
                        <li><a href="{{ route('web_create_inventory') }}"><i class="ion ion-md-add-circle"> </i> Create inventory items</a></li>
                    </ul>
                </li>
                <!--  -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-user"></i>
                         <span>Tenant Manag</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false"> 
                    <li><a href="{{ route('web_tenants_list') }}"><i class="ion ion-md-menu"> </i> List tenants</a></li>

                        <li><a href="{{ route('web_create_tenant') }}"><i class="ion ion-md-add-circle"> </i> Create tenant</a></li>
                    </ul>
                </li>
                 <!--  -->
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-user"></i>
                        <span>Landlords Manag</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false"> 
                    <li><a href="{{ route('web_landlords_list') }}"><i class="ion ion-md-menu"> </i> List Landlords</a></li>

                        <li><a href="{{ route('web_create_landlord') }}"><i class="ion ion-md-add-circle"> </i> Create Landlords</a></li>
                    </ul>
                </li>
                <!--  -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-user"></i>
                        <span>Vendors Manag</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false"> 
                    <li><a href="{{ route('web_vendors_list') }}"><i class="ion ion-md-menu"> </i> List Vendors</a></li>

                        <li><a href="{{ route('web_create_vendor') }}"><i class="ion ion-md-add-circle"> </i> Create Vendors</a></li>
                    </ul>
                </li>
                <!--  -->
                 
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-file-contract"></i>
                        <span>Contract Manag</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false"> 
                    <li><a href="{{ route('web_contracts_list') }}"><i class="ion ion-md-menu"> </i> List contracts</a></li>

                        <li><a href="{{ route('web_create_contract') }}"><i class="ion ion-md-add-circle"> </i> Create contract</a></li>

                    </ul>
                </li>
                  <!--  -->
                 
                  <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-search" aria-hidden="true"></i> 
                         <span>Inspections Manag</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false"> 
                    <li><a href="{{ route('web_inspections_list') }}"><i class="ion ion-md-menu"> </i> List Inspections</a></li>

                        <li><a href="{{ route('web_create_inspection') }}"><i class="ion ion-md-add-circle"> </i> Create Inspections</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-tools"></i>
                         <span>Maintenances Manag</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false"> 
                    <li><a href="{{ route('web_maintenances_list') }}"><i class="ion ion-md-menu"> </i> List Maintenances</a></li>

                        <li><a href="{{ route('web_create_maintenance') }}"><i class="ion ion-md-add-circle"> </i> Create Maintenances</a></li>

                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>

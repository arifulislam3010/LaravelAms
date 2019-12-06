<!-- main sidebar -->
<aside id="sidebar_main">
    <div style="background-color: #fff; text-align: center;" class="sidebar_main_header">
        <div class="sidebar_logo">
            <a style="margin-left: 0px;" href="{{url('dashboard')}}" class="sSidebar_hide sidebar_logo_large">
                <img class="logo_regular" src="{{ url('uploads/op-logo/logo.png') }}" alt="" height="15" width="71"/>
            </a>
        </div>
    </div>
    <div class="menu_section">
        <ul>
            <li id="sidebar_dashboard" class="" title="Dashboard">
                <a href="{{ route('dashboard') }}">
                    <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                    <span class="menu_title">Dashboard</span>
                </a>

            </li>
            <li id="sidebar_contact" class="" title="contacts">
                <a href="{{ route('contact') }}">
                    <span class="menu_icon"><i class="material-icons">perm_contact_calendar</i></span>
                    <span class="menu_title">Contacts</span>
                </a>

            </li>

            <li id="sidebar_inventory" class="" title="Inventory">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">add_shopping_cart</i></span>
                    <span class="menu_title">Inventory</span>
                </a>
                <ul>
                    <li id="sidebar_inventory_inventory" class=""><a href="{{ route('inventory') }}">Inventory</a></li>
                    <li id="sidebar_inventory_product" class=""><a href="{{ route('track') }}">Product Track</a></li>
                </ul>

            </li>
            <li id="sidebar_bank" class="" title="Account">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">account_balance_wallet</i></span>
                    <span class="menu_title">Bank</span>
                </a>
                <ul>
                    <li id="sidebar_bank_bank" class=""><a href="{{ url('bank') }}">Bank</a></li>
                    <li id="sidebar_bank_report" class=""><a href="{{ url('bank/report') }}">Bank Report</a></li>
                </ul>

            </li>
            <li id="sidebar_money_in" class="" title="Money In">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">add_shopping_cart</i></span>
                    <span class="menu_title">Money In</span>
                </a>
                <ul>
                    <li id="sidebar_estimate" class=""><a href="{{ route('estimate') }}">Estimate</a></li>
                    <li id="sidebar_invoice" class=""><a href="{{ route('income') }}">Income</a></li>

                    <li id="sidebar_invoice" class=""><a href="{{ route('invoice') }}">Invoice</a></li>
                    <li id="sidebar_invoice" class=""><a href="{{ route('payment_received') }}">Payment Received</a></li>
                    <li id="sidebar_credit_note" class=""><a href="{{ route('credit_note') }}">Credit Notes</a></li>

                </ul>

            </li>
            <li id="sidebar_money_in" class="" title="Money Out">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">widgets</i></span>
                    <span class="menu_title">Money Out</span>
                </a>
                <ul>
                    <li id="sidebar_invoice" class=""><a href="{{ route('expense') }}">Expenses</a></li>
                    <li id="sidebar_invoice" class=""><a href="{{ route('bill') }}">Bills</a></li>
                    <li id="sidebar_invoice" class=""><a href="{{ route('payment_made') }}">Payments Made</a></li>
                    <li id="sidebar_invoice" class=""><a href="{{ route('sales_commission') }}">Sales Commission</a></li>


                </ul>

            </li>
            <li id="sidebar_account" class="" title="Account">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">account_balance_wallet</i></span>
                    <span class="menu_title">Accountant</span>
                </a>
                <ul>
                    <li id="sidebar_account_jurnal" class=""><a href="{{ route('journal') }}">Manual Journals</a></li>
                    <li id="sidebar_account_chart_of_accounts" class=""><a href="{{ route('account_chart') }}">Chart of Accounts</a></li>
                </ul>

            </li>
            
            <li id="sidebar_reports" class="" title="reports">
                <a href="{{ url('report') }}">
                    <span class="menu_icon"><i class="material-icons">pie_chart</i></span>
                    <span class="menu_title">Reports</span>
                </a>
            </li>




            <li id="sidebar_reports" class="" title="reports">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons" >chrome_reader_mode</i></span>
                    <span class="menu_title">Ticketing</span>
                </a>
                <ul>

                    <li id="sidebar_reports" class="" title="reports">
                        <a href="{{ route('ticket_dashboard_index') }}">
                            <span class="menu_icon"><i class="material-icons">Da</i></span>
                            <span class="menu_title">Dashboard</span>
                        </a>
                    </li>

                    <li id="sidebar_money_in" class="" title="Money Out">
                        <a href="#">
                            <span class="menu_icon"><i class="material-icons">settings</i></span>
                            <span class="menu_title">Settings</span>

                        </a>

                        <ul>

                            <li id="sidebar_reports" class="" title="reports">
                                <a href="{{ route('ticket_tax') }}">
                                    <span class="menu_icon"><i class="material-icons">attach_money</i></span>
                                    <span class="menu_title">Tax</span>
                                </a>
                            </li>
                            <li id="sidebar_reports" class="" title="reports">
                                <a href="{{ route('ticket_commission_edit',1) }}">
                                    <span class="menu_icon"><i class="material-icons">content_cut</i></span>
                                    <span class="menu_title">Commission</span>
                                </a>
                            </li>
                            <li id="sidebar_reports" class="" title="reports">
                                <a href="{{ route('ticket_airlines') }}">
                                    <span class="menu_icon"><i class="material-icons">airplanemode_active</i></span>
                                    <span class="menu_title">Airlines</span>
                                </a>
                            </li>

                            <li id="sidebar_reports" class="" title="reports">
                                <a href="{{ route('ticket_airlinestax') }}">
                                    <span class="menu_icon"><i class="material-icons" style="color: red">airplanemode_inactive</i></span>
                                    <span class="menu_title">Airline Tax </span>
                                </a>
                            </li>


                            <li id="sidebar_reports" class="" title="reports">
                                <a href="{{ route('ticket_hotel_index') }}">
                                    <span class="menu_icon"><i class="material-icons" style="color: red">Hotel</i></span>
                                    <span class="menu_title">Ticket Hotel</span>
                                </a>
                            </li>
                        </ul>

                    </li>

                    <li id="sidebar_money_in" class="" title="Money Out">
                        <a href="#">
                            <span class="menu_icon"><i class="material-icons">airline_seat_flat</i></span>
                            <span class="menu_title">Order</span>

                        </a>
                        <ul>
                            <li id="sidebar_reports" class="" title="reports">
                                <a href="{!! route('ticket_Order_create') !!}">
                                    <span class="menu_icon"><i class="material-icons">add_circle</i></span>
                                    <span class="menu_title">New</span>
                                </a>
                            </li>
                            <li id="sidebar_reports" class="" title="reports">
                                <a href="{{ route('ticket_Order_pending') }}">
                                    <span class="menu_icon"><i class="material-icons">remove_circle</i></span>
                                    <span class="menu_title">Pending Order</span>
                                </a>
                            </li>
                            <li id="sidebar_reports" class="" title="reports">
                                <a href="{{ route('ticket_Order_confirmed') }}">
                                    <span class="menu_icon"><i class="material-icons">remove_circle</i></span>
                                    <span class="menu_title">Confirm Order</span>
                                </a>
                            </li>
                            <li id="sidebar_reports" class="" title="reports">
                                <a href="{{ route('another_mail_send_show') }}">
                                    <span class="menu_icon"><i class="material-icons">E</i></span>
                                    <span class="menu_title">Show All Sending Email</span>
                                </a>
                            </li>
                        </ul>

                    </li>

                    <a href="{!! route('ticket_document_index') !!}">
                        <span class="menu_icon"><i class="material-icons">Ticket</i></span>
                        <span class="menu_title">Ticket Document</span>

                    </a>
                    <a href="{!! route('ticket_bill_index') !!}">
                        <span class="menu_icon"><i class="material-icons">Bill</i></span>
                        <span class="menu_title">IATA Bill</span>

                    </a>
                </ul>


            <li id="sidebar_money_in" class="" title="Money Out">

                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE89C;</i></span>
                    <span class="menu_title">Recruit</span>

                </a>

                <ul>
                    <a href="{!! route('recruitdashboard') !!}">
                        <span class="menu_icon"><i class="material-icons">&#xE89C;</i></span>
                        <span class="menu_title">Dashboard</span>

                    </a>
                    <li id="sidebar_reports" class="" title="reports">
                        <a href="{{ route('company_index') }}">
                            <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                            <span class="menu_title">Company</span>
                        </a>
                    </li>
                    <li id="sidebar_reports" class="" title="reports">

                        <a href="{{ route('visa') }}">
                            <span class="menu_icon"><i class="material-icons">flight_takeoff</i></span>
                            <span class="menu_title">Visa </span>
                        </a>
                    </li>

                    <li id="sidebar_reports" class="" title="reports">
                        <a href="{{ route('order') }}">
                            <span class="menu_icon"><i class="material-icons">shopping_cart</i></span>
                            <span class="menu_title">Order </span>
                        </a>
                    </li>
                    <li id="sidebar_reports" class="" title="reports">
                        <a href="{{ route('customer') }}">
                            <span class="menu_icon"><i class="material-icons">flight_takeoff</i></span>
                            <span class="menu_title"> Customers </span>
                        </a>
                    </li>
                    <li id="sidebar_reports" class="" title="reports">
                        <a href="{{ route('okala_index') }}">
                            <span class="menu_icon"><i class="material-icons">insert_chart</i></span>
                            <span class="menu_title">Okala</span>
                        </a>
                    </li>
                    <li id="sidebar_reports" class="" title="reports">
                        <a href="{{ route('medicalslip') }}">
                            <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                            <span class="menu_title">Medical Slip</span>
                        </a>
                    </li>


                    <li id="sidebar_reports" class="" title="reports">
                        <a href="{{ route('mofa') }}">
                            <span class="menu_icon"><i class="material-icons">flight_takeoff</i></span>
                            <span class="menu_title">Mofa </span>
                        </a>
                    </li>


                    <li id="sidebar_reports" class="" title="reports">
                        <a href="{{ route('musaned') }}">
                            <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                            <span class="menu_title">Musaned</span>
                        </a>
                    </li>

                    <li id="sidebar_reports" class="" title="reports">
                        <a href="{{ route('visastamp') }}">
                            <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                            <span class="menu_title">Visa Stamping</span>
                        </a>
                    </li>
                    <li id="sidebar_reports" class="" title="reports">
                        <a href="{{ route('fingerprint_index') }}">
                            <span class="menu_icon"><i class="material-icons">fingerprint</i></span>
                            <span class="menu_title">FP & Training</span>
                        </a>
                    </li>
                    <li id="sidebar_reports" class="" title="reports">

                        <a href="{{ route('manpower_index') }}">
                            <span class="menu_icon"><i class="material-icons">Man</i></span>
                            <span class="menu_title">Manpower</span>
                        </a>
                    </li>
                    <li id="sidebar_reports" class="" title="reports">

                        <a href="{{ route('flight_index') }}">
                            <span class="menu_icon"><i class="material-icons">Flight</i></span>
                            <span class="menu_title">Flight</span>
                        </a>
                    </li>
                    <li id="sidebar_reports" class="" title="Docuemnt">
                        <a href="{{ route('document') }}">
                            <span class="menu_icon"><i class="material-icons">library_books</i></span>
                            <span class="menu_title">Accounts </span>
                        </a>
                        <ul>
                            <li id="sidebar_reports" class="" title="Docuemnt">
                                <a href="{{ route('order_expense_accounts') }}">
                                    <span class="menu_icon"><i class="material-icons">explicit</i></span>
                                    <span class="menu_title">Expense </span>
                                </a>
                            </li>

                            <li id="sidebar_reports" class="" title="Docuemnt">
                                <a href="{{ route('order_expense_sector') }}">
                                    <span class="menu_icon"><i class="material-icons">payment</i></span>
                                    <span class="menu_title">Expense Sector </span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li id="sidebar_reports" class="" title="Docuemnt">
                        <a href="{{ route('document') }}">
                            <span class="menu_icon"><i class="material-icons">description</i></span>
                            <span class="menu_title">Documents </span>
                        </a>
                    </li>


                    <li id="sidebar_money_in" class="" title="Money Out">

                        <a href="#">
                            <span class="menu_icon"><i class="material-icons">&#xE89C;</i></span>
                            <span class="menu_title">Forms</span>

                        </a>

                        <ul>

                            <li id="sidebar_reports" class="" title="reports">
                                <a href="{{ route('form_basis_edit') }}">
                                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                                    <span class="menu_title">Basic Information</span>
                                </a>
                            </li>
                            <li id="sidebar_reports" class="" title="reports">
                                <a href="{{ route('medical_slip_form_index') }}">
                                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                                    <span class="menu_title">Medical Slip</span>
                                </a>
                            </li>

                            <li id="sidebar_reports" class="" title="visaacceptance">
                                <a href="{{ route('visaacceptance') }}">
                                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                                    <span class="menu_title">Visa Acceptance</span>
                                </a>
                            </li>
                            <li id="sidebar_reports" class="" title="reports">
                                <a href="{{ route('agreement_index') }}">
                                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                                    <span class="menu_title">Agreement</span>
                                </a>
                            </li>
                            <li id="sidebar_reports" class="" title="reports">
                                <a href="{{ route('objection_index') }}">
                                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                                    <span class="menu_title">No Objection</span>

                                </a>
                            </li>
                            <li id="sidebar_reports" class="" title="reports">
                                <a href="{{ route('visa_process_index') }}">
                                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                                    <span class="menu_title">VLS Process</span>

                                </a>
                            </li>
                            <li id="sidebar_reports" class="" title="reports">
                                <a href="{{ route('gamca_index') }}">
                                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                                    <span class="menu_title">Gamca</span>

                                </a>
                            </li>
                            <li id="sidebar_reports" class="" title="reports">
                                <a href="{{ route('immigration_index') }}">
                                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                                    <span class="menu_title">Immigration</span>

                                </a>
                            </li>
                            <li id="sidebar_reports" class="" title="reports">
                                <a href="{{ route('note_sheet_index') }}">
                                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                                    <span class="menu_title">Note Sheet</span>

                                </a>
                            </li>
                            <li id="sidebar_reports" class="" title="reports">
                                <a href="{{ route('visaform') }}">
                                    <span class="menu_icon"><i class="material-icons">&#xE88A;</i></span>
                                    <span class="menu_title">Form</span>

                                </a>
                            </li>
                        </ul>
                    </li>


                </ul>

            </li>




        </ul>
    </div>
</aside>
<!-- main sidebar end -->
<aside class="menu sidebar">
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        <li>
            <a href="{{ route('dashboard') }}" @if(request()->is('dashboard*')) class="active" @endif>
                <span class="icon is-small">
                    <i class="fa fa-dashboard"></i>
                </span>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('employeesIndex') }}" @if(request()->is('employees*')) class="active" @endif>
                <span class="icon is-small">
                    <i class="fa fa-users"></i>
                </span>
                Employees
            </a>
        </li>
    </ul>
    <p class="menu-label">
        Payroll
    </p>
    <ul class="menu-list">
        <li>
            <a href="#">
                <span class="icon is-small">
                    <i class="fa fa-list"></i>
                </span>
                Payslips
            </a>
        </li>
        <li>
            <a href="{{ route('payPeriodsIndex') }}" @if(request()->is('pay-periods*')) class="active" @endif>
                <span class="icon is-small">
                    <i class="fa fa-cut"></i>
                </span>
                Cut-Offs/Pay Periods
            </a>
        </li>
    </ul>
    <p class="menu-label">
        Time Keeping
    </p>
    <ul class="menu-list">
        <li>
            <a>
                <span class="icon is-small">
                    <i class="fa fa-clock-o"></i>
                </span>
                Attendance
            </a>
        </li>
        <li>
            <a>
                <span class="icon is-small">
                    <i class="fa fa-times"></i>
                </span>
                Leaves
            </a>
        </li>
        <li>
            <a>
                <span class="icon is-small">
                    <i class="fa fa-calendar"></i>
                </span>
                Daily Time Record
            </a>
        </li>
    </ul>
</aside>

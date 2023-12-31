<div class="sidebar">
<ul class="grid">
        @if(session('user_type') == 'admin')
        <li class="grid-item">
            <i class="fa-solid fa-user-doctor"></i>
            <a href="admin">admin</a>
        </li>
        <li class="grid-item">
            <i class="fas fa-user"></i>
            <a href="viewuser">User</a>
        </li>
        <li class="grid-item">
            <i class="fa-regular fa-credit-card"></i>
            <a href="downloadrepo">Download Report</a>
        </li>
        <li class="grid-item">
            <i class="fa-solid fa-file-invoice"></i>
            <a href="#">Accounts</a>
            <div class="dropdown-content">
                 <a href="accounts-open">Open</a>
                <a href="accounts-close">Closed</a>
                <a href="accounts-ongoing">Ongoging</a>
            </div>
        </li>
        <li class="grid-item">
            <i class="fa-solid fa-bug"></i>
            <a href="#">Complaints</a>
            <div class="dropdown-content">
                 <a href="complaints-open">Open</a>
                <a href="complaints-close">Closed</a>
                <a href="complaints-ongoing">Ongoging</a>
            </div>
        </li>
        

        <li class="grid-item">
        </i><i class="fas fa-question-circle"></i>
            <a href="general-query-repo">General Query</a>
        </li>

        <li class="grid-item">
            <i class="fa-solid fa-file-circle-question"></i>
                        <a href="others-repo">Others Query</a>
        </li>

        @elseif(session('user_type') == 'employee')

        <li class="grid-item">
            </i><i class="fas fa-plus"></i>
            <a href="addcall">Add Call</a>
        </li>

        <li class="grid-item">
            <i class="fa-solid fa-list"></i>
            <a href="calllist">Call List</a>
        </li>
        
        @elseif(session('user_type') == 'account')
        <li class="grid-item">
            <i class="fa-solid fa-o"></i>
            <a href="open-account">Open</a>
        </li>

        <li class="grid-item">
            <i class="fa-solid fa-clock-rotate-left"></i>   
            <a href="ongoing-account">Ongoing</a>
        </li>

        <li class="grid-item">
            <i class="fa-solid fa-xmark"></i>
            <a href="close-account">Closed</a>
        </li>

        <li class="grid-item">
            <i class="fa-solid fa-rectangle-list"></i>
            <a href="call-data-account">Call Data</a>
        </li>
        @else
        <li class="grid-item">
            <i class="fa-solid fa-o"></i>
            <a href="open-complaint">Open</a>
        </li>

        <li class="grid-item">
            <i class="fa-solid fa-clock-rotate-left"></i>   
            <a href="ongoing-complaint">Ongoing</a>
        </li>

        <li class="grid-item">
            <i class="fa-solid fa-xmark"></i>
            <a href="close-complaint">Closed</a>
        </li>

        <li class="grid-item">
            <i class="fa-solid fa-rectangle-list"></i>
            <a href="call-data-complaint">Call Data</a>
        </li>

        @endif 

    </ul>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
<br><br>

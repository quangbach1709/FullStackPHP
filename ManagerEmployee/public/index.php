<?php
$employees = [
    [
        'stt' => 1,
        'name' => 'bach',
        'email' => 'bachh1124@gmail.com',
        'address' => 'ha noi viet nam',
        'phone' => '0123456789'
    ],
    [
        'stt' => 2,
        'name' => 'john',
        'email' => 'john@example.com',
        'address' => 'new york, usa',
        'phone' => '9876543210'
    ],
    [
        'stt' => 3,
        'name' => 'jane',
        'email' => 'jane@example.com',
        'address' => 'london, uk',
        'phone' => '1234567890'
    ]
];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $newEmployee = [
        'stt' => count($employees) + 1,
        'name' => $name,
        'email' => $email,
        'address' => $address,
        'phone' => $phone
    ];
    array_push($employees, $newEmployee);
}
?>
<?php
include_once "../views/partials/header.php";
?>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TLU</a>
            <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                    class="navbar-toggler" data-bs-target="#navbarSupportedContent"
                    data-bs-toggle="collapse" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a aria-current="page" class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Employees</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input aria-label="Search" class="form-control me-2" placeholder="Search" type="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div style="height: 20px; background: linear-gradient(180deg,gray,white)"></div>
</header>
<main>
    <div class="d-flex justify-content-between p-3" id="menu">
        <h2 class="">Manage <strong>Employees</strong></h2>
        <div class="d-flex">
            <p class="border m-2 p-1" id="del"><i class="bi bi-dash-circle-fill"></i>Delete</p>
            <p class="border m-2 p-1" data-bs-target="#exampleModal" data-bs-toggle="modal" id="add"><i
                        class="bi bi-plus-circle-fill"></i>Add New Employee</p>
        </div>
    </div>
    <div class="container">
        <ul id="list-epy">
            <li>
                <div class="row">
                    <p class="col">STT</p>
                    <p class="col">Name</p>
                    <p class="col">Email</p>
                    <p class="col">Address</p>
                    <p class="col">Phone</p>
                    <p class="col">Actions</p>
                </div>
            </li>


            <?php
            foreach ($employees as $key => $employee) {
                ?>
                <li>
                    <div class="row">
                        <p class="col"><?php echo $employee['stt'] ?></p>
                        <p class="col"><?php echo $employee['name'] ?></p>
                        <p class="col"><?php echo $employee['email'] ?></p>
                        <p class="col"><?php echo $employee['address'] ?></p>
                        <p class="col"><?php echo $employee['phone'] ?></p>
                        <p class="col">
                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </p>
                    </div>
                </li>
            <?php } ?>

        </ul>
    </div>
</main>
<footer class="d-flex justify-content-between container">
    <p>Showing <strong>5</strong> out of <strong>25</strong> entries</p>
    <p id="page">Previous 1 2 3 4 5 Next</p>
</footer>
<!--Hien thi form nhap-->
<!-- Modal -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="post" action="index.php">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Employee</h1>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <div class="modal-body">
                <div>
                    <p>Name</p>
                    <input class="w-75" id="f-name" name="name" type="text">
                    <p>Email</p>
                    <input class="w-75" id="email" name="email" type="email">
                    <p>Address</p>
                    <input class="w-75" id="address" name="address" type="text">
                    <p>Phone</p>
                    <input class="w-75" id="phone" name="phone" type="number">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
                <button class="btn btn-primary" type="submit">Add</button>
            </div>
        </form>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--<script src="../../node_modules/jquery/dist/jquery.js"></script>-->
<script src="../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
<!--<script src="./assetes/js/script.js"></script>-->

</body>
</html>
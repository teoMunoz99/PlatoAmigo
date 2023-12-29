<article class="card rounded-5 p-2 my-3">
    <div class="card-body d-flex">
        <div class='w-100 me-4'>
            <h5 class="card-title"><?php echo $nombreP; ?></h5>
            <p class="card-text"><?php echo $descripcionP; ?></p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class='text-secondary'>Local:</span><?php echo $nombreL; ?></li>
                <li class="list-group-item"><span class='text-secondary'>Direccion:</span> <?php echo $direccionL.', '.$localidadL; ?>
                </li>
                <li class="list-group-item"><span class='text-secondary'>Hora:</span><?php echo $fecha; ?></li>
            </ul>
        </div>
        <?php if($_SESSION['tipo'] == 'A'){ ?>
        <div class='d-flex align-items-start'>
            <a href="error404.php" class=""><i class="bi bi-x-circle-fill fs-1 text-danger"></i></a>
        </div>
        <?php }?>
    </div>
</article>
<article class="card rounded-5 p-2 my-3">
    <div class="card-body d-flex">
        <div class='w-100 me-4'>
            <h5 class="card-title"><?php echo $nombreL; ?></h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class='text-secondary'>Direccion:</span> <?php echo $direccionL.', '.$localidadL; ?></li>
                <li class="list-group-item"><span class='text-secondary'>Tel/Cel:</span><?php echo $telL; ?></li>
            </ul>
        </div>
        <?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'A'){ ?>
        <div class='d-flex align-items-start'>
            <a href="eliminarP.php?id=<?php echo $id_plato;?>" class=""><i class="bi bi-x-circle-fill fs-1 text-danger"></i></a>
        </div>
        <?php }?>
    </div>
</article>
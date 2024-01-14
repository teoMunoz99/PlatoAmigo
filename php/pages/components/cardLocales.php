<article class="card rounded-5 p-2 my-3">
    <div class="card-body d-flex">
        <div class='w-100 me-4'>
            <h5 class="card-title text-center">
                <?php echo $nombreL; ?>
            </h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class='text-secondary'>Direccion:</span>
                    <?php echo $direccionL . ', ' . $localidadL; ?>
                </li>
                <li class="list-group-item"><span class='text-secondary'>Tel/Cel:</span>
                    <?php echo $celL; ?>
                </li>
            </ul>
            <div class="d-flex justify-content-end">
                <a href="#" class="btn btn-danger rounded-pill">Ver menú</a>
            </div>
        </div>
    </div>
</article>
<?php

    if(isset($_SESSION['no_control'])){

    

?>



<div class="container mt-3">
    <div class="row justify-content-around">
        <div class="col-md-10">
            <div id="carouselExampleControls" class="carousel slide border border-2" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/slider_alumno/01.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/slider_alumno/02.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/slider_alumno/03.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev btn_carousel" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <i class="fas fa-chevron-circle-left fa-2x" aria-hidden="true"></i>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next btn_carousel" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <i class="fas fa-chevron-circle-right fa-2x" aria-hidden="true"></i>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
    </div>
</div>
<?php
    }else{
        header("location:login");
    }
?>